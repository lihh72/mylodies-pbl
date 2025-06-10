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
use Illuminate\Support\Str;
use Filament\Forms\Components\Repeater;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        protected static ?string $navigationGroup = 'Product Management';

public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('name')
            ->label('Product Name')
            ->maxLength(18)
            ->required()
            ->afterStateUpdated(function (\Filament\Forms\Set $set, ?string $state) {
                // Generate a slug from the name
                $slug = Str::slug($state);

                // Check if the slug is unique
                $originalSlug = $slug;
                $counter = 1;
                while (\App\Models\Product::where('slug', $slug)->exists()) {
                    // Append a counter to the slug if it's already taken
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                // Set the unique slug value
                $set('slug', $slug);
            }),

        TextInput::make('slug')
            ->label('Slug')
            ->disabled()
            ->dehydrated()
            ->required()
            ->unique(ignoreRecord: true),


Textarea::make('full_description')
    ->label('Full Description')
    ->required()
    ->rows(6)
    ->columnSpan('full'),


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
            ->required()
            ->rule('digits_between:1,8'),

        Textarea::make('description')
        ->required()
            ->label('Product Description'),

FileUpload::make('images')
    ->label('Instrument Images')
    ->image()
    ->multiple()
    ->reorderable()
    ->directory('instruments')
    ->maxFiles(5)
    ->disk('public'), // Pastikan ini ditambahkan!

    Repeater::make('highlights')
    ->label('Highlights')
    ->schema([
        TextInput::make('value')->label('Highlight'),
    ])
    ->default([])
    ->columnSpanFull(),

Repeater::make('included_items')
    ->label("What's Included")
    ->schema([
        TextInput::make('value')->label('Included Item'),
    ])
    ->default([])
    ->columnSpanFull(),


    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('images')
    ->label('Image')
    ->getStateUsing(fn ($record) => $record->images[0] ?? null)
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
        ])
        ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
