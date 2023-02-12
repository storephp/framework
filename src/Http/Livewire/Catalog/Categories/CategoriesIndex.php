<?php

namespace OutMart\Dashboard\Http\Livewire\Catalog\Categories;

use OutMart\Models\Product\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::paginate(15);

        return view('outmart::catalog.categories.index', [
            'categories' => $categories,
        ])->layout('outmart::layouts.dashboard');
    }

    public function deleteIt(Category $category, $checkChildren = true)
    {
        if ($checkChildren) {
            return ($category->hasChildren()) ? 'hasChildren' : 'notHasChildren';
        }

        return ($category->delete()) ? 'done' : 'error';
    }
}
