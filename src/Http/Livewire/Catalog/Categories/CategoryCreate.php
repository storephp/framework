<?php

namespace Bidaea\OutMart\Dashboard\Http\Livewire\Catalog\Categories;

use Bidaea\OutMart\Facades\Catalog\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $parent_id;
    public $name;
    public $slug;

    protected $rules = [
        'parent_id' => 'nullable',
        'name' => 'required',
        'slug' => 'required',
    ];

    public function render()
    {
        $categories = Category::get();

        return view('outmart::catalog.categories.create', [
            'categories' => $categories,
        ])->layout('outmart::layouts.dashboard');
    }

    public function buildSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        $category = Category::create($validatedData);

        dd($category);
    }
}
