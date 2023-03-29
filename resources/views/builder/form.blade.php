<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ $pagePretitle ?? 'Pretitle' }}
                    </div>
                    <h2 class="page-title">
                        {{ $meta['pageTitle'] ?? 'title' }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">

            <form class="card" wire:submit.prevent="submit">
                <div class="card-header">
                    <h3 class="card-title">Enter the data</h3>
                    @if ($setup['selectStoreView'])
                        <div class="card-actions">
                            <select class="form-select" wire:model="storeViewId" wire:change="changeStoreViewId()">
                                <option value="null">Select store view...</option>
                                @foreach ($stores as $store)
                                    <optgroup label="{{ $store->name }}">
                                        @foreach ($store->views as $view)
                                            <option value="{{ $view->id }}">{{ $view->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
                <div class="row g-0">
                    <div class="col-3 d-none d-md-block border-end">
                        <div class="card-body">
                            <h4 class="subheader">Tabs</h4>
                            <div class="list-group list-group-transparent">
                                @foreach ($from_tabs as $from_tab)
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex align-items-center @if ($from_tab['id'] == $selectedTab) active @endif"
                                        wire:click="setTab('{{ $from_tab['id'] }}')">
                                        {{ $from_tab['name'] }}

                                        @foreach ($from_tab['tabs_validate'] as $item)
                                            @if ($errors->has($item))
                                                <span class="badge bg-red ms-auto"></span>
                                            @break
                                        @endif
                                    @endforeach
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col d-flex flex-column">

                    @foreach ($from_tabs as $from_tab)
                        @if ($selectedTab == $from_tab['id'])
                            <div class="card-body">
                                <h2 class="mb-4">{{ $from_tab['name'] }}</h2>
                                @foreach ($from_tab['fields'] as $field)
                                    @if ($field['type'] == 'select')
                                        <x-outmart-select label="{{ $field['label'] }}"
                                            model="{{ $field['model'] }}" :options="$field['options']" :hint="$field['hint']"
                                            :required="str_contains($field['rules'], 'required')" :multiple="$field['multiple']" />
                                    @endif

                                    @if ($field['type'] == 'text')
                                        <x-outmart-input-text label="{{ $field['label'] }}"
                                            model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                    @endif

                                    @if ($field['type'] == 'textarea')
                                        <x-outmart-input-textarea label="{{ $field['label'] }}"
                                            model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                    @endif

                                    @if ($field['type'] == 'price')
                                        <x-outmart-input-price label="{{ $field['label'] }}"
                                            model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                    @endif

                                    @if ($field['type'] == 'file')
                                        <x-outmart-input-file label="{{ $field['label'] }}"
                                            model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                    @endif
                                @endforeach

                            </div>
                        @endif
                    @endforeach


                    {{-- @if ($tab == 'dd')
                            <div class="card-body">
                                <h2 class="mb-4">Basic info dd</h2>
                                @foreach ($fileds as $filed)
                                    @if ($filed['type'] == 'text')
                                        <x-outmart-input-text label="{{ $filed['label'] }}" model="{{ $filed['model'] }}" />
                                    @endif
                                @endforeach
                            </div>
                        @endif --}}

                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <span class="spinner-border spinner-border-sm me-2" wire:loading></span>
                                {{ $meta['submitLabel'] ?? 'Submit' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="progress progress-sm" wire:loading>
                <div class="progress-bar progress-bar-indeterminate" wire:loading></div>
            </div>
        </form>

    </div>
</div>
</div>
