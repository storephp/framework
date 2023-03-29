<div {{ $attributes->merge(['class' => 'mb-3 row']) }}>
    <label class="col-3 col-form-label @if($required) required @endif">{{ $label }}</label>
    <div class="col">
        <select class="form-select @error($model) is-invalid @enderror" wire:model.defer="{{ $model }}" {{ $attributes }} @if($multiple) multiple @endif>
            <option value="null">Select...</option>
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
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
