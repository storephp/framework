<div {{ $attributes->merge(['class' => 'mb-3 row']) }} {{ $attributes }}>
    <label class="col-3 col-form-label required">{{ $label }}</label>
    <div class="col">
        <select class="form-select @error($model) is-invalid @enderror" wire:model="{{ $model }}">
            <option value="null">Select...</option>
            @foreach ($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        @error($model)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if (isset($hint))
            <small class="form-hint">{{ $hint }}</small>
        @endif
    </div>
</div>
