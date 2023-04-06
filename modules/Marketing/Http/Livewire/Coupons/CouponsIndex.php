<?php

namespace Basketin\Modules\Marketing\Http\Livewire\Coupons;

use Livewire\Component;
use Livewire\WithPagination;
use Basketin\Dashboard\Views\Layouts\DashboardLayout;
use Basketin\Support\Facades\Coupon;

class CouponsIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $coupons = Coupon::getList();

        return view('basketinMarketing::coupons.index', [
            'coupons' => $coupons,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Product $product)
    {
        return ($product->delete()) ? 'done' : 'error';
    }
}
