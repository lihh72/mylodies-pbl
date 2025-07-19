<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;


class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Verifikasi KTP')
                ->label('✅ Verifikasi KTP')
                ->color('success')
                ->visible(fn () => $this->record->identity_card && !$this->record->identity_card_verified_at)
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update([
                        'identity_card_verified_at' => now(),
                    ]);

                    Notification::make()
                        ->title('KTP berhasil diverifikasi.')
                        ->success()
                        ->send();
                }),

Actions\Action::make('Tolak KTP')
    ->label('❌ Tolak KTP')
    ->color('danger')
    ->visible(fn () => filled($this->record->identity_card)) // tampil jika ada file KTP
    ->requiresConfirmation()
    ->action(function () {
        if ($this->record->identity_card) {
            Storage::disk('public')->delete($this->record->identity_card);
        }

        $this->record->update([
            'identity_card' => null,
            'identity_card_verified_at' => null,
        ]);

        Notification::make()
            ->title('KTP ditolak dan file dihapus.')
            ->danger()
            ->send();
    }),

        ];
    }
}
