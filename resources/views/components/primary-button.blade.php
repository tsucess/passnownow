<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary w-100 submit-btn']) }}>
    {{ $slot }}
</button>

{{-- <button type="submit" class="btn btn-primary w-100 submit-btn">Register</button> --}}
