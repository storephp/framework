<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Customers
                    </div>
                    <h2 class="page-title">
                        Customers List
                    </h2>
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
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(./static/avatars/006f.jpg)"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $customer->name }}</div>
                                                        <div class="text-muted"><a
                                                                class="text-reset">{{ $customer->email }}</a></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted" data-label="Role">
                                                User
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
</div>
