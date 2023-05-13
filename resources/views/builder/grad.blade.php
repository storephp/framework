<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Catalog
                    </div>
                    <h2 class="page-title">
                        GradTitle
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('store.dashboard.catalog.categories.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create new category
                        </a>
                        <a href="{{ route('store.dashboard.catalog.categories.create') }}"
                            class="btn btn-primary d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        @foreach ($headers as $header)
                                            <th>{{ $header }}</th>
                                        @endforeach
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($columns as $column)
                                        <tr>
                                            @foreach ($column as $row)
                                                <td>
                                                    {{ $row['body']['value'] }}
                                                </td>

                                                @if ($loop->last)
                                                    <td width="15%">
                                                        <a href="" class="btn">
                                                            Edit {{ $row['primary'] }}
                                                        </a>
                                                        <button class="btn btn-danger"
                                                            wire:click="$emit('triggerDelete', {{ $row['primary'] }})">Delete</button>
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {{ $columns->links() }} --}}
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('triggerDelete', categoryId => {
                if (confirm('Are you sure?')) {
                    let valeu = @this.call('deleteIt', categoryId).then((value) => {
                        if (
                            value == 'hasChildren' &&
                            confirm('Are you sure remove all children?')
                        ) {
                            @this.call('deleteIt', categoryId, false);
                        }

                        if (value == 'notHasChildren') {
                            @this.call('deleteIt', categoryId, false);
                        }
                    });
                }
            });
        });
    </script>
@endpush
