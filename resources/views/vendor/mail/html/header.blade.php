@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                <img src = "{{ asset('https://passnownow.kokokah.com/images/logo.png') }}" style="width: 15rem;"
                    class = "mt-5 mb-2 pt-5  mx-auto d-block" alt = "passnownow logo" />
                {{-- {{ $slot }} --}}
            @endif
        </a>
    </td>
</tr>
