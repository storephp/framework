<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ $pagePretitle ?? 'Pretitle' }}
                    </div>
                    <h2 class="page-title">
                        {{ $meta['pageTitle'] ?? 'title' }}
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
                        <div class="card-header">
                            <h3 class="card-title">Basic form</h3>
                            <div class="card-actions">
                                <button type="submit" class="btn btn-primary">{{ $submitLabel ?? 'Submit' }}</button>
                            </div>
                        </div>
                        <div class="card-body">


                            @foreach ($fileds as $filed)
                                @if ($filed['type'] == 'select')
                                    {{-- <div class="mb-3">
                                        <label class="form-label">{{ $filed['label'] }}</label>
                                        <div>
                                            <select class="form-select @error($filed['model']) is-invalid @enderror"
                                                wire:model="{{ $filed['model'] }}">
                                                <option value="null">Select category...</option>
                                                @foreach ($filed['options'] as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error($filed['model'])
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if (isset($filed['hint']))
                                                <small class="form-hint">{{ $filed['hint'] }}</small>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <x-basketin-select label="{{ $filed['label'] }}" model="{{ $filed['model'] }}" :options="$filed['options']" />
                                @endif

                                @if ($filed['type'] == 'text')
                                    <x-basketin-input-text label="{{ $filed['label'] }}" model="{{ $filed['model'] }}" />
                                    {{-- <div class="mb-3">
                                        <label class="form-label required">{{ $filed['label'] }}</label>
                                        <div>
                                            <input class="form-control @error($filed['model']) is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="Enter name"
                                                wire:model="{{ $filed['model'] }}" wire:change="buildSlug()">

                                            @error($filed['model'])
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @if (isset($filed['hint']))
                                                <small class="form-hint">{{ $filed['hint'] }}</small>
                                            @endif
                                        </div>
                                    </div> --}}
                                @endif
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
