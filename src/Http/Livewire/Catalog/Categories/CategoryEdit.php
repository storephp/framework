<?php

namespace OutMart\Dashboard\Http\Livewire\Catalog\Categories;

use OutMart\Models\Category;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CategoryEdit extends Component
{
    use LivewireAlert;

    public $category;

    public $parent_id;
    public $name;
    public $slug;

    protected $rules = [
        'parent_id' => 'nullable',
        'name' => 'required',
        'slug' => 'required',
    ];

    public function mount(Category $category)
    {
        $this->category = $category;

        $this->parent_id = $this->category->parent_id;
        $this->name = $this->category->name;
        $this->slug = $this->category->slug;
    }

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

        $this->category->update($validatedData);

        return $this->alert('success', 'Updated!');
    }
}
