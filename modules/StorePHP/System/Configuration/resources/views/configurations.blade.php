<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        System Configurations
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form class="card" wire:submit.prevent="submitSave">
                <div class="card-header">
                    <h3 class="card-title">Configurations</h3>
                </div>
                <div class="row g-0">
                    <div class="col-3 d-none d-md-block border-end">
                        <div class="card-body">
                            @foreach ($tabs as $tab)
                                <h4 class="subheader @if (!$loop->first) mt-3 @endif">{{ $tab['label'] }}
                                </h4>
                                <div class="list-group list-group-transparent">
                                    @foreach ($tab['sub_tabs'] as $subTab)
                                        <a href="{{ route('store.dashboard.system.configurations', [$tab['id'], $subTab['id']]) }}"
                                            class="list-group-item list-group-item-action {{ request()->is( 'storephp/system/configurations/' . $tab['id'] . '/' . $subTab['id']) ? 'active' : '' }}">{{ $subTab['label'] }}</a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">{{ $currentTabName ?? 'Default' }}</h2>
                            @foreach ($fields as $field)
                                @if ($field['type'] == 'text')
                                    <x-store-php-text-field label="{{ $field['label'] }}" model="{{ $field['model'] }}"
                                        :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                @endif

                                @if ($field['type'] == 'select')
                                    <x-store-php-select-field label="{{ $field['label'] }}"
                                        model="{{ $field['model'] }}" :options="$field['options']" :hint="$field['hint']"
                                        :required="str_contains($field['rules'], 'required')" :multiple="$field['multiple']" />
                                @endif

                                @if ($field['type'] == 'textarea')
                                    <x-store-php-textarea-field label="{{ $field['label'] }}"
                                        model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                @endif

                                @if ($field['type'] == 'date')
                                    <x-store-php-date-field label="{{ $field['label'] }}"
                                        model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                @endif

                                @if ($field['type'] == 'checkbox')
                                    <x-store-php-checkbox-field label="{{ $field['label'] }}"
                                        model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                @endif

                                @if ($field['type'] == 'file')
                                    <x-store-php-file-field label="{{ $field['label'] }}"
                                        model="{{ $field['model'] }}" :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" />
                                @endif
                            @endforeach
                        </div>
                        <div class="card-footer bg-transparent mt-auto">
                            <div class="btn-list justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
