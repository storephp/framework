<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Marketing
                    </div>
                    <h2 class="page-title">
                        Coupons
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('outmart.dashboard.marketing.coupons.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create new coupon
                        </a>
                        <a href="{{ route('outmart.dashboard.marketing.coupons.create') }}"
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
                    @if ($coupons->isEmpty())
                        <x-outmart-widget-empty-data icon="ticket-off" title="There are no coupons"
                            subtitle="You can create new coupons"
                            actionRoute="{{ route('outmart.dashboard.marketing.coupons.create') }}" />
                    @endif

                    @if (!$coupons->isEmpty())
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                            <th>Coupon</th>
                                            <th>Type</th>
                                            <th>Activity status</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium">{{ $coupon->coupon_name }}
                                                            </div>
                                                            <div class="text-muted"><a
                                                                    class="text-reset">{{ $coupon->coupon_code }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted" data-label="Role">
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $coupon->discount_type }}
                                                        </div>
                                                        <div class="text-muted"><a
                                                                class="text-reset">{{ $coupon->discount_value }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted" data-label="Role">
                                                    @if ($coupon->is_active)
                                                        <span class="badge bg-green-lt">Active</span>
                                                    @else
                                                        <span class="badge bg-red-lt">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="{{ route('outmart.dashboard.marketing.coupons.update', [$coupon]) }}"
                                                            class="btn btn-info">
                                                            Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                {{ $coupons->links() }}
            </div>
        </div>
    </div>
</div>
