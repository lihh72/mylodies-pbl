<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
        TextInput::make('name')
            ->label('Product Name')
            ->required(),

        Select::make('category')
            ->label('Category')
            ->options([
                'Guitar' => 'Guitar',
                'Drum' => 'Drum',
                'Keyboard' => 'Keyboard',
                'Bass' => 'Bass',
                'Other' => 'Other',
            ])
            ->required(),

        TextInput::make('rental_price_per_day')
            ->label('Rental Price per Day')
            ->numeric()
            ->prefix('IDR')
            ->required(),

        Textarea::make('description')
            ->label('Product Description'),

        FileUpload::make('image')
            ->label('Instrument Image')
            ->image()
            ->directory('instruments'),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('image')
                ->label('Image')
                ->circular(),

            TextColumn::make('name')->label('Product Name')->searchable(),
            TextColumn::make('category')->label('Category')->sortable(),
            TextColumn::make('rental_price_per_day')
                ->label('Price/Day')
                ->money('IDR', true),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
