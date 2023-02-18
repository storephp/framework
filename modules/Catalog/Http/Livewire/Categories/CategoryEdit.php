<?php

namespace OutMart\Modules\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use OutMart\Dashboard\Builder\Contracts\hasGenerateFields;
use OutMart\Dashboard\Builder\FormBuilder;
use OutMart\Models\Product\Category;

class CategoryEdit extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    public $pagePretitle = 'Catalog';
    public $pageTitle = 'Update this category';

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

    public function generateFields($form)
    {
        $form->addField('select', [
            'tab' => 'basic.id',
            'label' => 'Parent category',
            'model' => 'parent_id',
            'options' => Category::pluck('name', 'id'),
            'rules' => 'nullable',
            'order' => 1,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'tab' => 'basic.id',
            'label' => 'Name category',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('text', [
            'tab' => 'basic.id',
            'label' => 'Slug category',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 20,
        ]);

        AddFieldsToCategoryCreate::dispatch($this->form);
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
