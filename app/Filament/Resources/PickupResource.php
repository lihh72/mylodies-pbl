<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PickupResource\Pages;
use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class PickupResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-uturn-left';
    protected static ?string $navigationLabel = 'Penjemputan';
    protected static ?string $pluralModelLabel = 'Penjemputan';
    protected static ?string $modelLabel = 'Penjemputan';
    protected static ?string $navigationGroup = 'Manajemen Operasional';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                Order::query()
                    ->where('status', 'arrive')
                    ->with(['orderItems.product'])
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

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai Sewa')
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
                        return Carbon::parse($record->end_date)->diffInDays(today()->subDay(), false);
                    })
                    ->color(function (Order $record) {
                        return Carbon::parse($record->end_date)->addDay()->isToday() ? 'danger' : null;
                    }),

                Tables\Columns\TextColumn::make('pickup_note')
                    ->label('')
                    ->getStateUsing(fn (Order $record) =>
                        Carbon::parse($record->end_date)->addDay()->isToday()
                            ? '📦 Harus Dijemput Hari Ini'
                            : ''
                    )
                    ->color('danger'),
            ])
            ->actions([
                Action::make('Jemput')
    ->label('✔ Tandai Sudah Dijemput')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->requiresConfirmation()
    ->visible(fn (Order $record) => $record->status === 'arrive')
    ->action(function (Order $record) {
        $record->update(['status' => 'returned']);

        // Kirim notifikasi WhatsApp ke customer
        if ($record->phone_number) {
            $items = $record->orderItems
                ->filter(fn ($item) => $item->product)
                ->map(fn ($item) => "{$item->product->name} x{$item->quantity}")
                ->implode(', ');

            $message = <<<EOM
📦 Hi {$record->name}, we’ve successfully picked up your rented items.

Items: {$items}

Thank you for renting with *Mylodies*! ✨
If you enjoyed our service, feel free to leave us a review!
EOM;

            $number = preg_replace('/\D/', '', $record->phone_number);
if (!str_starts_with($number, '62')) {
    $number = '62' . ltrim($number, '0');
}

try {
    Http::timeout(10)->post(config('services.wa_bot.endpoint'), [
        'number'  => $number,
        'message' => $message,
    ]);
} catch (\Throwable $e) {
    \Log::error('❌ Failed to send WhatsApp message via web.js', [
        'error' => $e->getMessage(),
    ]);
}

        }
    }),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPickups::route('/'),
        ];
    }
}
