<div class="item">
    <div class="label">
        {!! $icon !!}
        <label for="{{ $attributes['id'] ?? '' }}">{{ $label }}</label>
    </div>
    <input class="inp-contact-us" {{ $attributes }}>
    @error("formControls.{$attributes['id']}")
    <p class="m-0 text-danger small">{{ $message }}</p>
    @enderror
</div>

