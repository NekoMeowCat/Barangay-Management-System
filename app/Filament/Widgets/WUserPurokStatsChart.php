<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Blotter;
use Carbon\Carbon;


class WUserPurokStatsChart extends ChartWidget
{
    protected static ?string $heading = 'Blotter Per Month';

    protected function getData(): array
    {
        $year = Carbon::now()->year;
        $colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
            '#FF9F40', '#E7E9ED', '#8A8F8F', '#24CCDA', '#8A8F8F',
            '#24CCDA', '#8A8F8F'
            ];

        // Initialize arrays to hold the blotter counts and months
        $blotterCounts = [];
        $months = [];

        // Loop through each month of the current year
        for ($month = 1; $month <= 12; $month++) {
            // Convert the month number to a month name
            $dateObj  = \DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F'); // Full month name

            // Count the blotters created in the current month
            $count = Blotter::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->count();

            // Store the count and month
            $blotterCounts[] = $count;
            $months[] = $monthName;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Blotters per Month',
                    'data' => $blotterCounts,
                    'backgroundColor' => $colors,
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
