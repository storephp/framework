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
                        Create New Order
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-8">
                    <div class="card" style="height: 28rem">
                        <div class="card-header">
                            <h3 class="card-title">Products list</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                                @foreach ($products as $product)
                                    <div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <span class="avatar"
                                                    style="background-image: url({{ asset($product->thumbnail_path) }})"></span>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>{{ $product->name }}</strong> commented on your <strong>"I'm
                                                        not a
                                                        witch."</strong> post.
                                                </div>
                                                <div class="text-muted">{{ $product->sku }}</div>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <button href="#" class="btn btn-outline-primary w-100"
                                                    wire:click="addToBacket('{{ $product->sku }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-shopping-cart-plus"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M17 17h-11v-14h-2"></path>
                                                        <path d="M6 5l6 .429m7.138 6.573l-.143 1h-13"></path>
                                                        <path d="M15 6h6m-3 -3v6"></path>
                                                    </svg>
                                                    Add to basket
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="height: 28rem">
                        <div class="card-header">
                            <h3 class="card-title">Products list</h3>
                        </div>
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                                @if ($basketQuotes)
                                    @foreach ($basketQuotes as $quote)
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <span class="avatar"
                                                        style="background-image: url({{ asset($quote->product->thumbnail_path) }})"></span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>{{ $quote->product->name }}
                                                            ({{ $quote->quantity }})
                                                        </strong>
                                                        <div class="text-muted">SKU: {{ $quote->product->sku }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button href="#" class="btn btn-sm btn-outline-info"
                                                        wire:click="increase('{{ $quote->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M6 15l6 -6l6 6"></path>
                                                        </svg>
                                                    </button>
                                                    <button href="#" class="btn btn-sm btn-outline-danger"
                                                        wire:click="decrease('{{ $quote->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M6 9l6 6l6 -6"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer info</h3>
                        </div>
                        <div class="card-body">
                            <x-store-select label="Customer name" model="customer_id" :options="$customers"
                                :required="true" wire:change="selectCustomer()" />
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Customer Address</h3>
                        </div>
                        <div class="card-body">
                            <x-store-select label="Select Address" model="customerAddress" :options="$customerAddresses"
                                :required="true" wire:change="selectAddress()" />

                            <div class="hr-text">Shhping also</div>

                            <x-store-input-text label="label" model="customerIntreAddresses.label"
                                :required="true" />

                            <x-store-input-text label="country_code" model="customerIntreAddresses.country_code"
                                :required="true" />

                            <x-store-input-text label="city_id" model="customerIntreAddresses.city_id"
                                :required="true" />

                            <x-store-input-text label="postcode" model="customerIntreAddresses.postcode"
                                :required="true" />

                            <x-store-input-text label="street_line_1" model="customerIntreAddresses.street_line_1"
                                :required="true" />

                            <x-store-input-text label="street_line_2" model="customerIntreAddresses.street_line_2"
                                :required="true" />

                            <x-store-input-text label="telephone_number"
                                model="customerIntreAddresses.telephone_number" :required="true" />

                            {{-- <input type="text" wire:model="customerIntreAddresses.label"> --}}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer out</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group input-group-flat">
                                <input type="text" class="form-control @error('promoCode') is-invalid @enderror"
                                    autocomplete="off" wire:model="promoCode">
                                <span class="input-group-text">
                                    @if (!$AppledpromoCode)
                                        <button class="btn btn-sm btn-primary" wire:click="applyCoupon()">Apply
                                            coupon</button>
                                    @endif
                                    @if ($AppledpromoCode)
                                        <button class="btn btn-sm btn-danger" wire:click="restCoupon()">Rest
                                            coupon</button>
                                    @endif
                                </span>
                                @error('promoCode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            Sub Total: {{ $basketSubTotal }}<br>
                            Basket discount total: {{ $basketDiscountTotal }}<br>
                            Total: {{ $basketTotal }}
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button class="btn btn-primary ms-auto" wire:click="placeOrder">Create Order
                                    {{ $basketTotal }} EGP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
