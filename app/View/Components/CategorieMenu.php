<?php

namespace App\View\Components;

use App\Models\Categorie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorieMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Categorie::all( ) ;
             
        return view('components.categorie-menu' , compact('categories'));
    }
}
