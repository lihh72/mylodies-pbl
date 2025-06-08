<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TotalRevenueWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $totalRevenue = Payment::where('payment_status', 'paid')->sum('gross_amount');

        return [
            Card::make('Total Revenue', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Total pembayaran yang sudah berhasil')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),
        ];
    }
}
