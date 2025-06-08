<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Orders Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required()
                    ->disabledOn('edit'),

                Repeater::make('orderItems')
                    ->relationship()
                    ->label('Order Items')
                    ->schema([
                        Select::make('product_id')
                            ->label('Product')
                            ->options(Product::all()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $product = Product::find($state);
                                $set('price', $product?->rental_price_per_day ?? 0);
                            })
                            ->disabledOn('edit'),

                        DatePicker::make('start_date')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateItemTotalPrice($set, $get))
                            ->disabledOn('edit'),

                        DatePicker::make('end_date')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateItemTotalPrice($set, $get))
                            ->disabledOn('edit'),

                        TextInput::make('quantity')
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateItemTotalPrice($set, $get))
                            ->disabledOn('edit'),

                        TextInput::make('price')
                            ->label('Price per Day')
                            ->numeric()
                            ->required()
                            ->disabled(),

                        TextInput::make('total_price')
                            ->label('Total Price')
                            ->numeric()
                            ->required()
                            ->disabled(),
                    ])
                    ->columnSpan('full')
                    ->required()
                    ->minItems(1)
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $total = 0;
                        if ($state instanceof Collection || is_array($state)) {
                            foreach ($state as $item) {
                                $total += $item['total_price'] ?? 0;
                            }
                        }
                        $set('total_price', $total);
                    })
                    ->disabledOn('edit'),

                TextInput::make('total_price')
                    ->label('Total Order Price')
                    ->numeric()
                    ->required()
                    ->disabled(),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'arrive' => 'Arrive',
                        'cancelled' => 'Cancelled',
                        'returned' => 'Returned',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    protected static function updateItemTotalPrice(callable $set, callable $get): void
    {
        $pricePerDay = $get('price') ?? 0;
        $quantity = $get('quantity') ?? 1;
        $startDate = $get('start_date');
        $endDate = $get('end_date');

        if (!$startDate || !$endDate) {
            $set('total_price', 0);
            return;
        }

        $days = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
        if ($days < 1) {
            $set('total_price', 0);
            return;
        }

        $totalPrice = $pricePerDay * $quantity * $days;
        $set('total_price', $totalPrice);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('orderItems')
                    ->label('Products')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->orderItems->map(function ($item) {
                            return $item->product->name . " x{$item->quantity}";
                        })->implode(', ');
                    })
                    ->wrap()
                    ->sortable(false),


                TextColumn::make('total_price')
                    ->money('idr', true)
                    ->sortable(),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'primary' => 'processing',
                        'info' => 'shipped',
                        'success' => 'arrive',
                        'danger' => 'cancelled',
                        'secondary' => 'returned',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'arrive' => 'Arrive',
                        'cancelled' => 'Cancelled',
                        'returned' => 'Returned',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
