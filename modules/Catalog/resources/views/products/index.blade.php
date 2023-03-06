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
                        Products List
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                <span class="d-none d-sm-inline-block">Create new product</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route('outmart.dashboard.catalog.products.create', ['simple']) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-box-seam me-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 3l8 4.5v9l-8 4.5l-8 -4.5v-9l8 -4.5"></path>
                                        <path d="M12 12l8 -4.5"></path>
                                        <path d="M8.2 9.8l7.6 -4.6"></path>
                                        <path d="M12 12v9"></path>
                                        <path d="M12 12l-8 -4.5"></path>
                                    </svg>
                                    Create simple product
                                </a>
                                <a class="dropdown-item"
                                    href="{{ route('outmart.dashboard.catalog.products.create', ['configurable']) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-packages me-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path>
                                        <path d="M2 13.5v5.5l5 3"></path>
                                        <path d="M7 16.545l5 -3.03"></path>
                                        <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path>
                                        <path d="M12 19l5 3"></path>
                                        <path d="M17 16.5l5 -3"></path>
                                        <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5"></path>
                                        <path d="M7 5.03v5.455"></path>
                                        <path d="M12 8l5 -3"></path>
                                    </svg>
                                    Create configurable product
                                </a>
                            </div>
                        </div>
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
                        <div class="card-header">
                            <h3 class="card-title">Products list</h3>
                            <div class="card-actions">
                                <input type="text" class="form-control" placeholder="Search Name, SKU"
                                    wire:model="search" />
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>price</th>
                                        <th>SKU</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url({{ asset($product->thumbnail_path) }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $product->name }}</div>
                                                        <div class="text-muted"><a
                                                                class="text-reset">{{ $product->slug }}</a></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted">
                                                <div class="d-flex py-1 align-items-center">
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">
                                                            {{ $product->price }}</div>
                                                        <div class="text-muted"><a
                                                                class="text-reset">{{ $product->discount_price ?? '-' }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted" data-label="Role">
                                                {{ $product->sku }}
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('outmart.dashboard.catalog.products.edit', [$product]) }}"
                                                        class="btn">
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-danger"
                                                        wire:click="$emit('triggerDelete', {{ $product->id }})">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{ $products->links() }}
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
