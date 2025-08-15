<x-mail::message>
    {{-- Greeting --}}
    @if (!empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level === 'error')
            # Whoops!
        @else
            # Hi {{ $user->name ?? 'there' }},
        @endif
    @endif

    
    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}
    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
        <?php
        $color = match ($level) {
            'success', 'error' => $level,
            default => 'primary',
        };
        ?>
        <x-mail::button :url="$actionUrl" :color="$color">
            {{ $actionText }}
        </x-mail::button>
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        {{ $line }}
    @endforeach

    {{-- Closing --}}
    Thanks,
    **{{ config('app.name') }}** Team

    {{-- Subcopy --}}
    @isset($actionText)
        <x-slot:subcopy>
            If you have trouble clicking **{{ $actionText }}**, copy and paste this link in your browser:
            <span class="break-all">{{ $displayableActionUrl }}</span>
        </x-slot:subcopy>
    @endisset
</x-mail::message>
