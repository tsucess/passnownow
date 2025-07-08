@extends('layouts.dasboardtemp')

@section('admincontent')
    @php
        $now = date('Y-m-d');
    @endphp
    <section class="container-fluid sub_detail__container">
        <div class="row">
            {{-- <div class="col-12 mb-md-0 subscription_details">
                @php
                    $exp = date_create($exp_date[0]->expiry_date);
                    $exp_d = date_format($exp, 'Y-m-d');
                    $now = date('Y-m-d');
                @endphp
                <table>
                    <tbody>
                        @if (!empty($exp_date[0]))
                        @php
                            $exp = date_create($exp_date[0]->expiry_date);
                            $exp_d = date_format($exp, 'Y-m-d');
                            $now = date('Y-m-d');
                        @endphp

                        <tr>
                            <td>
                                <h6>YOUR CURRENT PLAN</h6>
                            </td>
                            <td>
                                <h6>{{ $exp_date[0]->plan_name }} plan, N{{ number_format($exp_date[0]->amount) }}</h6>
                            </td>
                            <td><a href="#">Change plan</a></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>BILLING CYCLE</h6>
                            </td>
                            <td>
                                <h6>You will be charge N{{ number_format($exp_date[0]->amount) }},
                                    {{ date_format($exp, 'd F Y') }} Enable automatic renewal</h6>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>PAYMENT METHOD</h6>
                            </td>
                            <td>
                                <h6>{{ ucfirst($exp_date[0]->payment_method) }}</h6>
                            </td>
                            <td><a href="#">Change method</a></td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <h6> No Subscription done yet</h6>
                            </td>
                            <td><a href="/checkoutdetails" class="btn upgrade-btn ">Subscribe Now</a></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div> --}}

            <div class="col-12 mb-md-0 subscription_details">
                <table>
                    <tbody>
                        @if (!empty($exp_date[0]))
                            @php
                                $exp = date_create($exp_date[0]->expiry_date);
                                $exp_d = date_format($exp, 'Y-m-d');
                                $now = date('Y-m-d');
                            @endphp

                            <tr>
                                <td>
                                    <h6>YOUR CURRENT PLAN</h6>
                                </td>
                                <td>
                                    <h6>{{ $exp_date[0]->plan_name }} plan, N{{ number_format($exp_date[0]->amount) }}</h6>
                                </td>
                                <td>
                                    <a href="#">Change plan</a> &nbsp;
                                    <select name="" id="" class="subscription-plan">
                                        <option value="">Select plan</option>
                                        <option value="">Daily</option>
                                        <option value="">Weekly</option>
                                        <option value="">Monthly</option>
                                        <option value="">Quaterly</option>
                                        <option value="">6 Months</option>
                                        <option value="">Yearly</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>BILLING CYCLE</h6>
                                </td>
                                <td>
                                    <h6>You will be charge N{{ number_format($exp_date[0]->amount) }},
                                        {{ date_format($exp, 'd F Y') }} Enable automatic renewal</h6>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>PAYMENT METHOD</h6>
                                </td>
                                <td>
                                    <h6>{{ ucfirst($exp_date[0]->payment_method) }}</h6>
                                </td>
                                <td>
                                    <a href="#">Change method</a> &nbsp;
                                    <select name="" id="" class="payment-method">
                                        <option value="">Select method</option>
                                        <option value="">Card</option>
                                        <option value="">Bank Transfer</option>
                                    </select>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    <h6> No Subscription done yet</h6>
                                </td>
                                <td><a href="/checkoutdetails" class="btn upgrade-btn ">Subscribe Now</a></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="container-fluid">
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
                        @if (!empty($subhistory[0]))
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
                                                <span>Current</span></span>
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
