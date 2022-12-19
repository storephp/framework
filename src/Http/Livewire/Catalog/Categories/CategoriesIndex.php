<?php

namespace Bidaea\OutMart\Dashboard\Http\Livewire\Catalog\Categories;

use Bidaea\OutMart\Facades\Catalog\Category;
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

    public function deleteIt($category_id, $checkChildren = true)
    {
        if ($checkChildren) {
            return (Category::hasChildren($category_id)) ? 'hasChildren' : 'notHasChildren';
        }

        return (Category::removeIt($category_id)) ? 'done' : 'error';
    }
}
