<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Verify KTP')
                ->label('✅ Verify KTP')
                ->color('success')
                ->visible(fn () => $this->record->identity_card && !$this->record->identity_card_verified_at)
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update([
                        'identity_card_verified_at' => now(),
                    ]);

                    // Send WhatsApp notification
                    $this->sendKtpNotification(
                        title: '📄 Your ID has been verified.',
                        body: 'Congratulations! Your ID has been verified and your account now has full access.'
                    );

                    Notification::make()
                        ->title('ID successfully verified.')
                        ->success()
                        ->send();
                }),

            Actions\Action::make('Reject KTP')
                ->label('❌ Reject KTP')
                ->color('danger')
                ->visible(fn () => filled($this->record->identity_card))
                ->requiresConfirmation()
                ->action(function () {
                    if ($this->record->identity_card) {
                        Storage::disk('public')->delete($this->record->identity_card);
                    }

                    $this->record->update([
                        'identity_card' => null,
                        'identity_card_verified_at' => null,
                    ]);

                    // Send WhatsApp notification
                    $this->sendKtpNotification(
                        title: '⚠️ Your ID was rejected.',
                        body: 'Sorry, the uploaded ID file is invalid or blurry. Please re-upload a clearer image.'
                    );

                    Notification::make()
                        ->title('ID rejected and file deleted.')
                        ->danger()
                        ->send();
                }),
        ];
    }

    protected function sendKtpNotification(string $title, string $body): void
    {
        $user = $this->record;

        if (!$user->phone_number) return;

        $number = preg_replace('/\D/', '', $user->phone_number);
        if (!str_starts_with($number, '62')) {
            $number = '62' . ltrim($number, '0');
        }

        $message = <<<EOM
{$title}

{$body}
EOM;

        try {
            Http::timeout(10)->post(config('services.wa_bot.endpoint'), [
                'number' => $number,
                'message' => $message,
            ]);
        } catch (\Throwable $e) {
            \Log::error('❌ Failed to send WhatsApp ID verification message', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}
