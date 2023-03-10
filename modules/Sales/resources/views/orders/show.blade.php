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
                        Order details #{{ $order->id }}
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order info</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Customer</div>
                                <div class="datagrid-content">{{ $order->customer->first_name }}
                                    {{ $order->customer->last_name }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Products count</div>
                                <div class="datagrid-content">{{ $order->basket->quotes()->count() }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Status</div>
                                <div class="datagrid-content">
                                    <span class="status status-green">
                                        {{ $order->status->status_label }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Sub total</div>
                                <div class="datagrid-content">{{ $order->sub_total }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Discount total</div>
                                <div class="datagrid-content">{{ $order->discount_total ?? 0.0 }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Grand total</div>
                                <div class="datagrid-content">{{ $order->grand_total }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-3">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-mobile-md card-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>Total</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->basket->quotes as $quote)
                                    <tr>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url({{ asset($quote->product->thumbnail_path) }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $quote->product->name }}</div>
                                                    <div class="text-muted"><a href="#" class="text-reset">SKU:
                                                            {{ $quote->product->sku }}</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $quote->quantity }}</div>
                                        </td>
                                        <td class="text-muted" data-label="Role">
                                            {{ $quote->quantity * $quote->product->final_price }}
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#" class="btn">
                                                    Edit
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
