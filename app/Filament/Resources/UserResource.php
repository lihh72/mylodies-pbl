<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Account Management';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('name')->required(),
            TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true),

            TextInput::make('password')
                ->password()
                ->maxLength(255)
                ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                ->required(fn (string $context): bool => $context === 'create')
                ->visible(fn (string $context): bool => $context === 'create'),

            Select::make('roles')
                ->relationship('roles', 'name')
                ->preload()
                ->searchable()
                ->label('Role')
                ->required()
                ->native(false),

            FileUpload::make('identity_card')
                ->label('Foto KTP')
                ->disk('public')
                ->directory('identity_cards')
                ->image()
                ->imagePreviewHeight('150')
                ->downloadable()
                ->openable(),

            Placeholder::make('identity_card_verified_at')
                ->label('Status Verifikasi KTP')
                ->content(fn ($record) =>
                    $record?->identity_card_verified_at
                        ? '✅ Diverifikasi pada ' . $record->identity_card_verified_at->format('d M Y H:i')
                        : '⏳ Belum diverifikasi'
                ),
        ]);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('email')->searchable(),
            BadgeColumn::make('roles.name')->label('Roles'),

            ImageColumn::make('identity_card')
                ->label('KTP')
                ->disk('public')
                ->height(60),

            IconColumn::make('identity_card_verified_at')
                ->label('Verifikasi')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('gray'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
