<?php

namespace OutMart\Dashboard\Http\Livewire\Catalog\Categories;

use OutMart\Models\Product\Category;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CategoryCreate extends Component
{
    use LivewireAlert;

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

        Category::create($validatedData);

        return $this->alert('success', 'Saved!');
    }
}
