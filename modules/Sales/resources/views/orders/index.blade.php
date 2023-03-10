<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Orders
                    </div>
                    <h2 class="page-title">
                        Orders List
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('outmart.dashboard.sales.orders.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create new order
                        </a>
                        <a href="{{ route('outmart.dashboard.sales.orders.create') }}"
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
                        <div class="card-header">
                            <h3 class="card-title">Orders list</h3>
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
                                        <th>Customer</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    {{-- <span class="avatar me-2"
                                                        style="background-image: url({{ asset($product->thumbnail_path) }})"></span> --}}
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">#{{ $order->id }}</div>
                                                        <div class="text-muted"><a class="text-reset">dsd</a></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</div>
                                                        <div class="text-muted"><a class="text-reset">View profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">
                                                            Grand total: {{ $order->grand_total }}</div>
                                                        <div class="text-muted">
                                                            Sub total: {{ $order->sub_total }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted">
                                                {{ $order->status->status_label }}
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('outmart.dashboard.sales.orders.show', [$order]) }}"
                                                        class="btn">
                                                        Open
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
