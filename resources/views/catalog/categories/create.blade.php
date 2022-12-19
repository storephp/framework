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
                        Create new category
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
                    <form class="card" wire:submit.prevent="submit">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Basic form</h3>
                        </div> --}}
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Parent category</label>
                                <div>
                                    <select class="form-select" wire:model="parent_id">
                                        <option value="null">Select category...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Name category</label>
                                <div>
                                    <input class="form-control" aria-describedby="emailHelp" placeholder="Enter name"
                                        wire:model="name" wire:change="buildSlug()">
                                    <small class="form-hint">We'll never share your email with anyone else.</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Slug category</label>
                                <div>
                                    <input class="form-control" aria-describedby="emailHelp" placeholder="Enter slug"
                                        wire:model="slug">
                                    <small class="form-hint">We'll never share your email with anyone else.</small>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
