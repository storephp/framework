<div {{ $attributes->merge(['class' => 'mb-3 row']) }} {{ $attributes }}>
    <label class="col-3 col-form-label @if($required) required @endif">{{ $label }}</label>
    <div class="col">
        <input type="text" class="form-control @error($model) is-invalid @enderror" placeholder="{{ $placeholder }}"
            wire:model.defer="{{ $model }}">
        @error($model)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if (isset($hint))
            <small class="form-hint">{{ $hint }}</small>
        @endif
    </div>
</div>
