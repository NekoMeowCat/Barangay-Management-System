<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Official;

class carousel extends Component
{
    /**
     * Create a new component instance.
     */
    public $officials;

    public function __construct()
    {
        $this->officials = Official::with(['user' => function ($query) {
            $query->select('id', 'name', 'last_name', 'image'); 
        }])
        ->orderBy('position', 'asc')
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel');
    }
}
