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
                        Categories List
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
                        @if ($categories->isEmpty())
                            <div class="empty">
                                <div class="empty-icon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/mood-sad -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M9 10l.01 0" />
                                        <path d="M15 10l.01 0" />
                                        <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                                    </svg>
                                </div>
                                <p class="empty-title">No results found</p>
                                <p class="empty-subtitle text-muted">
                                    Try adjusting your search or filter to find what you're looking for.
                                </p>
                                <div class="empty-action">
                                    <a href="#" class="btn btn-primary">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                        Search again
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if ($categories->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Parent</th>
                                            <th>Products count</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                        <span class="avatar me-2"
                                                            style="background-image: url(./static/avatars/006f.jpg)"></span>
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium">{{ $category->name }}</div>
                                                            <div class="text-muted"><a
                                                                    class="text-reset">{{ $category->slug }}</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted">
                                                    <div class="d-flex py-1 align-items-center">
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium">
                                                                {{ $category->parent->name ?? '-' }}</div>
                                                            <div class="text-muted"><a
                                                                    class="text-reset">{{ $category->parent->slug ?? '-' }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted" data-label="Role">
                                                    0
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="{{ route('store.dashboard.catalog.categories.edit', [$category]) }}"
                                                            class="btn">
                                                            Edit
                                                        </a>
                                                        <button class="btn btn-danger"
                                                            wire:click="$emit('triggerDelete', {{ $category->id }})">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                {{ $categories->links() }}
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
