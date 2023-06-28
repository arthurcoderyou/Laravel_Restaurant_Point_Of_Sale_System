<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class AddToCartBtn extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        
        public int $menuId,
        public bool $menuAvailable,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.add-to-cart-btn');
    }

    

}
