<div {{ $attributes->merge(['class' => 'mb-3 row']) }} {{ $attributes }}>
    <label class="col-3 col-form-label required">{{ $label }}</label>
    <div class="col">
        <input type="text" class="form-control @error($model) is-invalid @enderror" placeholder="{{ $placeholder }}"
            wire:model="{{ $model }}">
        @error($model)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if (isset($hint))
            <small class="form-hint">{{ $hint }}</small>
        @endif
    </div>
</div>
