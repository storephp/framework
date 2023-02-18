<?php

namespace OutMart\Dashboard\Builder;

use Livewire\Component;
use OutMart\Dashboard\Builder\Contracts\hasCreateFields;
use OutMart\Dashboard\Builder\Form\Fields;
use OutMart\Dashboard\Builder\Form\Tabs;

class FormBuilder extends Component
{
    protected $form = null;
    protected $tabs = null;
    public $formTabs = [];
    public $fields = [];
    public $pagePretitle = 'Pre title';
    public $pageTitle = 'Title';

    public $submitLabel = 'Submit';

    public $tab = 'basic';
    protected $pathFields = null;

    public function __construct($id = null)
    {
        $this->tabs = new Tabs;
        $this->form = new Fields;

        config(['outmart.dashboard.core.fields.' . $this->pathFields => []]);

        $fields = config('outmart.dashboard.core.fields.' . $this->pathFields);

        if ($this instanceof hasCreateFields) {
            $this->createFields();
            $fields = array_merge($fields, $this->form->getFields());
        }

        $collection = collect($fields);
        $sorted = $collection->sortBy('order');
        $this->fields = $sorted->values()->all();

        foreach ($this->fields as $field) {
            $this->{$field['model']} = $field['value'] ?? null;
        }

        $this->formTabs = $this->tabs->getTabs();

        $ssf = [];
        foreach ($this->formTabs as $formTab) {
            //
            $ssf[] = [
                'id' => $formTab['id'],
                'name' => $formTab['name'],
                'fields' => collect($this->fields)->where('tab', $formTab['id'])->all(),
            ];
        }

        $this->formTabs = $ssf;

        // dd($this->formTabs);

        parent::__construct($id);
    }

    protected function rules()
    {
        $data = [];

        foreach ($this->fields as $field) {
            $data[$field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        return view('outmart::builder.form', [
            'meta' => [
                'pageTitle' => $this->pageTitle(),
            ],
            'from_tabs' => $this->formTabs,
            'fileds' => $this->fields,
        ])->layout('outmart::layouts.dashboard');
    }

    protected function pageTitle()
    {
        return $this->pageTitle;
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
    }
}
