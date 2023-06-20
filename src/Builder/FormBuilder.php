<?php

namespace Store\Dashboard\Builder;

use Livewire\Component;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\Contracts\hasGenerateTabs;
use Store\Dashboard\Builder\Form\Fields;
use Store\Dashboard\Builder\Form\Tabs;
use Store\Dashboard\Views\Layouts\AdminLayout;
use Store\Dashboard\Views\Layouts\DashboardLayout;
use Store\Models\Store;
use Store\Modules\Catalog\Events\AddFieldsToCategoryCreate;

class FormBuilder extends Component
{
    public $storeViewId = null;
    public $selectedTab = 'basic';

    protected $pageTitle = 'Title';
    protected $pagePretitle = 'Pre title';
    protected $submitLabel = 'Submit';
    protected $generatePath = null;
    protected $selectStoreView = false;
    protected $layout = 'dashboard';

    private $form = null;
    private $tabs = null;
    private $formTabs = [];

    public function boot()
    {
        $this->tabs = new Tabs;
        $this->form = new Fields;

        if ($this instanceof hasGenerateTabs) {
            $this->generateTabs($this->tabs);
        }

        if ($this instanceof hasGenerateFields) {
            $this->generateFields($this->form);

            if ($this->generatePath) {
                AddFieldsToCategoryCreate::dispatch($this->generatePath, $this->form);
            }
        }

        // $collection = collect($fields);
        // $sorted = $collection->sortBy('order');
        // $this->formFields = $sorted->values()->all();

        foreach ($this->form->getFields() as $field) {
            $this->{$field['model']} = $field['value'] ?? null;
        }

        // $this->formTabs = $this->tabs->getTabs();

        // $formTabs = [];
        // foreach ($this->formTabs as $formTab) {
        //     $fields = collect($this->formFields)->where('tab', $formTab['id']);

        //     $formTabs[] = [
        //         'id' => $formTab['id'],
        //         'name' => $formTab['name'],
        //         'fields' => $fields->all(),
        //         'tabs_validate' => $fields->pluck('model')->all(),
        //     ];
        // }

        // $this->formTabs = $formTabs;
    }

    protected function rules()
    {
        $data = [];

        foreach ($this->form->getFields() as $field) {
            $data[$field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        $stores = Store::with('views')->get();

        $layout = ($this->layout == 'dashboard') ? DashboardLayout::class : AdminLayout::class;

        $this->formTabs = $this->tabs->getTabs();

        $collection = collect($this->form->getFields());
        $sorted = $collection->sortBy('order');
        $formFields = $sorted->values()->all();

        $formTabs = [];
        foreach ($this->formTabs as $formTab) {
            $fields = collect($formFields)->where('tab', $formTab['id']);

            $formTabs[] = [
                'id' => $formTab['id'],
                'name' => $formTab['name'],
                'fields' => $fields->all(),
                'tabs_validate' => $fields->pluck('model')->all(),
            ];
        }

        return view('store::builder.form', [
            'setup' => [
                'selectStoreView' => $this->selectStoreView,
            ],
            'meta' => [
                'pageTitle' => $this->pageTitle(),
                'submitLabel' => $this->submitLabel,
            ],
            'stores' => $stores,
            'from_tabs' => $formTabs,
        ])->layout($layout);
    }

    protected function pageTitle()
    {
        return $this->pageTitle;
    }

    public function setTab($tab)
    {
        $this->selectedTab = $tab;
    }
}
