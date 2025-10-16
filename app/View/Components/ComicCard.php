<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComicCard extends Component
{


    public function __construct(
        public string $coversrc,
        public string $title,
        public string $href
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comic-card');
    }
}
