<?php

namespace Store\Modules\Catalog\Http\Livewire\Categories;

use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateFields;
use StorePHP\Dashboard\Builder\Contracts\hasGenerateTabs;
use StorePHP\Dashboard\Builder\FormBuilder;
use Store\Models\Product\Category;
use Store\Modules\Catalog\Support\Facades\CategoryForm;
use Store\Modules\Catalog\Support\Facades\CategoryFormTabs;

class CategoryCreate extends FormBuilder implements hasGenerateTabs, hasGenerateFields
{
    use LivewireAlert;

    public $pagePretitle = 'Catalog';
    // public $pageTitle = 'Create new category';

    // protected $generatePath = 'catalog.categories.create';

    public $slug;

    // public $form;

    // public $defaultTab = 'basic.id';

    // public function buildSlug()
    // {
    //     $this->slug = Str::slug($this->name, '-');
    // }

    // protected function generateTabs($tabs)
    // {
    //     // $tabs->addTab([
    //     //     'id' => 'basic.id',
    //     //     'name' => 'basic info',
    //     // ]);
    // }

    public function generateTabs($tabs)
    {
        $tabs->addTab([
            'id' => 'basic',
            'name' => 'Basic info',
        ]);

        $tabs->mergeTabs(CategoryFormTabs::getTabs());
    }

    public function generateFields($form)
    {
        $form->addField('select', [
            // 'tab' => 'basic.id',
            'label' => 'Parent category',
            'model' => 'parent_id',
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

        $form->addField('text', [
            // 'tab' => 'basic.id',
            'label' => 'Name category',
            'model' => 'name',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'dsf dsf dsff',
        ]);

        $form->addField('text', [
            // 'tab' => 'basic.id',
            'label' => 'Slug category',
            'model' => 'slug',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->mergeFields(CategoryForm::getFields());

        // AddFieldsToCategoryCreate::dispatch($this->form);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

        $category = Category::create([
            'parent_id' => $validatedData['parent_id'],
            'slug' => $validatedData['slug'],
        ]);
        $category->name = $validatedData['name'];

        foreach (CategoryForm::getFields() as $field) {
            $category->{$field['model']} = $this->{$field['model']};
        }

        $category->save();

        // CategoryCreated::dispatch($category, $this->form);

        return $this->alert('success', 'Saved!');
    }

    protected function pageTitle()
    {
        return __('StoreCatalog::category.create');
    }
}
