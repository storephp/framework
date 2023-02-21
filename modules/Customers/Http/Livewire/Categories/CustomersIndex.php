<?php

namespace OutMart\Modules\Customers\Http\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\Models\Product\Category;
use OutMart\Modules\Customers\Models\Customer;

class CustomersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $customers = Customer::query()->paginate(15);

        return view('outmartCustomers::customers.index', [
            'customers' => $customers,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Category $category, $checkChildren = true)
    {
        if ($checkChildren) {
            return ($category->hasChildren()) ? 'hasChildren' : 'notHasChildren';
        }

        return ($category->delete()) ? 'done' : 'error';
    }
}
