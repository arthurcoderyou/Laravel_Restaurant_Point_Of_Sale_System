<?php

namespace App\View\Components;

use Closure;
use App\Models\Cart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class cart_link extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $cartLink
    )
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart_link');
    }
}
