@extends('layouts.dasboardtemp')

@section('admincontent')
    @php
        $now = date('Y-m-d');
    $exp = date_create($exp_date[0]->expiry_date);
    $exp_d = date_format($exp, 'Y-m-d');
    $now = date('Y-m-d');
@endphp

    <section class="container-fluid mt-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Subscription History</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-3 mb-md-0 shadow subscription_history update">
                <table>
                    <thead>
                        <tr>
                            <th class="col-4">Package</th>
                            <th class="col-1">Price</th>
                            <th class="col-1">Expiry date</th>
                            <th class="col-1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($subhistory[0] == true)
                            @foreach ($subhistory as $history)
                                <tr>
                                    <td class="pt-1">
                                        <h6>{{ $history->plan_name }} Plan</h6>
                                        <p>#{{ $history->orderID }} | {{ $history->updated_at }}</p>
                                    </td>
                                    <td>
                                        <h6>N{{ number_format($history->amount) }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $history->expiry_date }}</h6>
                                    </td>
                                    <td>
                                        @php
                                            $exp_day = date_create($history->expiry_date);
                                            $exp_day = date_format($exp_day, 'Y-m-d');
                                        @endphp

                                        @if ($now > $exp_day)
                                            <span class="status exp"><i class="fa-solid fa-circle"></i>
                                                <span>Expired</span></span>
                                        @else
                                            <span class="status"><i class="fa-solid fa-circle"></i>
                                                <span>Active</span></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center p-3">
                                    <p>You have no subscription history</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
