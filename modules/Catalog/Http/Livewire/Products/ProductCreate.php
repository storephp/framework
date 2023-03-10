<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Products;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use OutMart\Dashboard\Builder\Contracts\hasGenerateFields;
use OutMart\Dashboard\Builder\Contracts\hasGenerateTabs;
use OutMart\Dashboard\Builder\FormBuilder;
use OutMart\Enums\Catalog\ProductType;
use OutMart\Models\Product\Category;
use OutMart\Modules\Catalog\Models\Product;

class ProductCreate extends FormBuilder implements hasGenerateFields, hasGenerateTabs
{
    use LivewireAlert;
    use WithFileUploads;

    public $productType;

    protected $pagePretitle = 'Catalog';
    protected $pageTitle = 'Create new product';

    public function mount($productType)
    {
        $this->productType = $productType;
    }

    public function generateTabs($tabs)
    {
        $tabs->addTab([
            'id' => 'basic',
            'name' => 'Basic info',
        ]);

        $tabs->addTab([
            'id' => 'priceing',
            'name' => 'Priceing',
        ]);

        $tabs->addTab([
            'id' => 'images',
            'name' => 'Images',
        ]);
    }

    public function generateFields($form)
    {
        $form->addField('select', [
            'label' => 'Categorys',
            'model' => 'categories',
            'options' => Category::get()->map(function ($category) {
                return [
                    'label' => $category->name,
                    'value' => $category->id,
                ];
            }),
            'rules' => 'nullable',
            'order' => 1,
            'hint' => 'You can not select.',
        ]);

        // dd($this->productType);

        if ($this->productType == 'simple') {
            $form->addField('select', [
                'label' => 'Configurable product',
                'model' => 'configurable_id',
                'options' => Product::configurableOnly()->get()->map(function ($product) {
                    return [
                        'label' => $product->name,
                        'value' => $product->id,
                    ];
                }),
                'rules' => 'required',
                'order' => 1,
                'hint' => 'You can not select.',
            ]);
        }

        $form->addField('text', [
            'label' => 'Product name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('text', [
            'label' => 'Product slug',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('text', [
            'label' => 'Product sku',
            'model' => 'sku',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('text', [
            'label' => 'Product description',
            'model' => 'description',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        // priceing
        $form->addField('price', [
            'tab' => 'priceing',
            'label' => 'Product price',
            'model' => 'price',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('price', [
            'tab' => 'priceing',
            'label' => 'Product discount price',
            'model' => 'discount_price',
            'rules' => 'nullable',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('file', [
            'tab' => 'images',
            'label' => 'Product thumbnail',
            'model' => 'images_thumbnail',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // dd($validatedData);

        $product = Product::create([
            'sku' => $validatedData['sku'],
        ]);

        $product->categories = $validatedData['categories'];
        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->discount_price = $validatedData['discount_price'];
        $product->thumbnail_path = $this->images_thumbnail->store('products', 'public');
        $product->save();

        dd($product);

        $product->setEntry('categories', $validatedData['categories']);
        $product->setEntry('name', $validatedData['name']);
        $product->setEntry('slug', $validatedData['slug']);
        $product->setEntry('description', $validatedData['description']);
        $product->setEntry('price', $validatedData['price']);
        $product->setEntry('discount_price', $validatedData['discount_price']);
        $product->setEntry(
            'thumbnail_path',
            $this->images_thumbnail->store('products', 'public')
        );

        dd($validatedData['sku']);

        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        if ($this->productType == 'simple') {
            $validatedData['simple'] = ProductType::SIMPLE();
        }

        if ($this->productType == 'configurable') {
            $validatedData['configurable'] = ProductType::CONFIGURABLE();
        }

        $product = Product::create($validatedData);

        $product->setProperty(
            'thumbnail_path',
            $this->images_thumbnail->store('products', 'public')
        );

        return $this->alert('success', 'Saved!');
    }
}
