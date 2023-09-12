<?php

namespace StorePHP\Catalog\Http\Livewire\Products;

use Livewire\WithFileUploads;
use Store\Models\Product;
use StorePHP\Bundler\Abstracts\FromAbstract;
use StorePHP\Dashboard\Views\Layouts\DashboardLayout;

class ProductUpdate extends FromAbstract
{
    use WithFileUploads;

    protected $pretitle = 'Catalog';
    protected $title = 'Update this product';

    public $formId = 'storephp_catalog_product_update_form';

    public $product = null;

    public function mount(Product $product)
    {
        $this->product = $product;

        foreach ($this->models(['thumbnail_path']) as $model) {
            $this->{$model} = $product[$model];
        }
    }

    public function layout()
    {
        return DashboardLayout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        foreach ($this->models(['thumbnail_path']) as $model) {
            $this->product->{$model} = $validateData[$model];
        }

        if ($this->thumbnail_path) {
            $this->product->thumbnail_path = $this->thumbnail_path->store('photos');
        }

        $this->product->save();

        return $this->pushAlert('success', 'The product has been updated');
    }
}
