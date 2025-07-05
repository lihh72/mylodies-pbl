<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryResource\Pages;
use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Carbon;
use App\Services\FonnteService;

class DeliveryResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Pengiriman';
    protected static ?string $pluralModelLabel = 'Pengiriman';
    protected static ?string $modelLabel = 'Pengiriman';
    protected static ?string $navigationGroup = 'Manajemen Operasional';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                Order::query()
                    ->where('status', 'shipped') // ✅ tampilkan hanya yang sudah dikirim
                    ->with(['orderItems.product']) // preload data produk
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Pemesan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('shipping_address')
                    ->label('Alamat')
                    ->wrap(),

                Tables\Columns\TextColumn::make('phone_number')
                    ->label('No. HP'),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Tanggal Mulai')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('orderItems')
                    ->label('Barang')
                    ->getStateUsing(function (Order $record) {
                        return $record->orderItems
                            ->filter(fn ($item) => $item->product)
                            ->map(fn ($item) => "{$item->product->name} x{$item->quantity}")
                            ->implode(', ');
                    })
                    ->wrap(),

                Tables\Columns\TextColumn::make('h_plus')
                    ->label('H+')
                    ->getStateUsing(function (Order $record) {
                        return Carbon::parse($record->start_date)->diffInDays(today(), false);
                    })
                    ->color(function (Order $record) {
                        return Carbon::parse($record->start_date)->isToday() ? 'danger' : null;
                    }),

                Tables\Columns\TextColumn::make('today_label')
                    ->label('')
                    ->getStateUsing(fn (Order $record) =>
                        Carbon::parse($record->start_date)->isToday()
                            ? '🚚 Harus Diantar Hari Ini'
                            : ''
                    )
                    ->color('danger'),
            ])
            ->actions([
Action::make('Selesai')
    ->label('✔ Tandai Sudah Tiba')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->requiresConfirmation()
    ->visible(fn (Order $record) => $record->status === 'shipped')
    ->action(function (Order $record) {
        $record->update(['status' => 'arrive']);

        // Kirim notifikasi WhatsApp ke user
        if ($record->phone_number) {
            $items = $record->orderItems
                ->filter(fn ($item) => $item->product)
                ->map(fn ($item) => "{$item->product->name} x{$item->quantity}")
                ->implode(', ');

            $message = <<<EOM
📦 Hi {$record->name}, your rental items have arrived!

Items: {$items}

We hope you enjoy using them. Let us know if you need any assistance. ✨
EOM;

            (new FonnteService())->send($record->phone_number, $message);
        }
    }),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeliveries::route('/'),
        ];
    }
}
