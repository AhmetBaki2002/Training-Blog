<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryDropdown extends Component
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
