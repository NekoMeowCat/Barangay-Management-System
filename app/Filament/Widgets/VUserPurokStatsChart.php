<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Purok;
use App\Models\User;

class VUserPurokStatsChart extends ChartWidget
{
    protected static ?string $heading = 'Resident Per Purok';

    protected function getData(): array
    {
        $puroks = Purok::all();
        $colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
            '#FF9F40', '#E7E9ED', '#8A8F8F', '#24CCDA', '#8A8F8F',
            '#24CCDA', '#8A8F8F'
            ];

// Initialize an empty array to hold the user counts
        $userCounts = [];

        foreach ($puroks as $purok) {
        // For each Purok, count the associated users
        $userCount = User::where('purok_id', $purok->id)->count();

        // Store the user count in the userCounts array
        $userCounts[] = $userCount;
        }

        return [
        'datasets' => [
            [
                'label' => 'Users per Purok',
                'data' => $userCounts,
                'backgroundColor' => $colors,
                'borderColor' => '#9BD0F5',
            ],
        ],
        'labels' => $puroks->pluck('name'), // Assuming the Purok model has a 'name' attribute
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
