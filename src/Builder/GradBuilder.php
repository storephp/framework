<?php

namespace OutMart\Dashboard\Builder;

use Livewire\Component;
use OutMart\Dashboard\Builder\Grad\Table;
use OutMart\Models\Product\Category;

class GradBuilder extends Component
{
    protected $table = null;
    public $columns = null;
    public $pagePretitle = 'Pre title';
    public $pageTitle = 'Title';

    public $submitLabel = 'Submit';

    protected $pathFields = null;
    protected $paginate = null;

    public function __construct($id = null)
    {
        $this->table = new Table;

        config(['outmart.dashboard.core.fields.' . $this->pathFields => []]);

        $columns = config('outmart.dashboard.core.fields.' . $this->pathFields);

        // if ($this instanceof hasCreateFields) {
        $this->headers();
        $columns = array_merge($columns, $this->table->getColumns());
        // }

        $collection = collect($columns);
        $sorted = $collection->sortBy('order');
        $this->columns = $sorted->values()->all();

        // $this->columns = array_map(function ($column) {
        //     // dd($column);
        //     $column['dfd'] = 'dfdf';
        //     return $column;
        // }, $this->columns);

        // dd($this->columns);

        parent::__construct($id);
    }

    public function render()
    {

        $headers = array_map(function ($column) {
            return $column['lable'];
        }, $this->columns);

        // dd($headers);

        $model = $this->model::query();

        if(!$this->paginate){
            $model = $model->get();
        }

        if($this->paginate){
            $model = $model->paginate($this->paginate);
        }

        $this->columns = $model->map(function ($r) {
            return array_map(function ($column) use ($r) {
                // dd();
                $column['primary'] = $r->{$r->getKeyName()};
                if ($column['body']['type'] == 'model') {
                    if(!str_contains($column['body']['value'], '->')){
                        $column['body']['value'] = $r->{$column['body']['value']};
                    } else {
                        $values = explode('->', $column['body']['value']);
                        $column['body']['value'] = $r->{$values[0]}->{$values[1]} ?? '';
                    }
                }
                return $column;
            }, $this->columns);
        });

        // dd($modelLink);

        // foreach ($columns as $column) {
        //     dd($column);
        // }

        return view('outmart::builder.grad', [
            'meta' => [
                'pageTitle' => $this->pageTitle(),
            ],
            'headers' => $headers,
            'columns' => $this->columns,
        ])->layout('outmart::layouts.dashboard');
    }

    protected function pageTitle()
    {
        return $this->pageTitle;
    }
}
