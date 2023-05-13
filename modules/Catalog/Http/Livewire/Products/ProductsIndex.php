<?php

namespace Store\Modules\Catalog\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use Store\Dashboard\Views\Layouts\DashboardLayout;
// use Store\Modules\Catalog\Models\Product;
use Store\Support\Facades\Product;

class ProductsIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::query()->where(function ($q) {
            if ($this->search) {
                $q->where('sku', 'like', '%' . $this->search . '%')
                    ->orByEntry('name', 'like', '%' . $this->search . '%');
            }
        })->paginate(15);

        return view('storeCatalog::products.index', [
            'products' => $products,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Product $product)
    {
        return ($product->delete()) ? 'done' : 'error';
    }
}
