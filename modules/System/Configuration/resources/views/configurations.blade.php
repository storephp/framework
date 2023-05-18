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
                            @foreach ($tabs as $tabKey => $tab)
                                <h4 class="subheader @if (!$loop->first) mt-3 @endif">{{ $tab['name'] }}
                                </h4>
                                <div class="list-group list-group-transparent">
                                    @foreach ($tab['sub_tabs'] as $_tabKey => $_tab)
                                        <a href="{{ route('store.dashboard.system.configurations', [$tabKey, $_tabKey]) }}"
                                            class="list-group-item list-group-item-action {{ request()->is('store/system/configurations/' . $tabKey . '/' . $_tabKey) ? 'active' : '' }}">{{ $_tab['name'] }}</a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">{{ $currentTabName ?? 'Default' }}</h2>

                            @foreach ($fields as $field)
                                @if ($field['type'] == 'string')
                                    <x-store-input-text label="{{ $field['label'] }}" model="{{ $field['path'] }}" />
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
