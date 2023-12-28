<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Official;
use App\Models\Purok;
use Carbon\Carbon;

class UserStatsWidget extends BaseWidget
{   
    protected function getStats(): array
    {
        $previousTotalUsers = User::whereDate('created_at', '>=', Carbon::now()->subDays(1))->count();

        $currentTotalUsers = User::count();
        $increase = $currentTotalUsers - $previousTotalUsers;

        return [  
            Stat::make('Total Users', $currentTotalUsers)
                ->chart([7, 2, 10, 3, 15, 16, 17])
                ->description("{$increase} New Users")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Officials', Official::count()),
            Stat::make('Total Puroks', Purok::count())
                ->chart([7, 2, 10, 3, 15, 16, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary'),
        ];
    }
}
