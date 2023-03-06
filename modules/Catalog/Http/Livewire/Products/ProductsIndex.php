<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use OutMart\Dashboard\Views\Layouts\DashboardLayout;
use OutMart\Modules\Catalog\Models\Product;

class ProductsIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::where(function ($q) {
            if ($this->search) {
                $q->where('sku', 'like', '%' . $this->search . '%')
                    ->orByEntry('name', 'like', '%' . $this->search . '%');
            }
        })->paginate(15);

        return view('outmartCatalog::products.index', [
            'products' => $products,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Product $product)
    {
        return ($product->delete()) ? 'done' : 'error';
    }
}
