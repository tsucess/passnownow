@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid profile__container">
        <div class="row">
            <div class="col-12 profile_data">
                <div class="top">
                    <h5>Checkout</h5>
                </div>
                {{-- <form method="POST" action="{{ route('pay') }}" id="checkoutForm">
                    @csrf

                    <div class="mb-3">
                        <label for="firstName" class="form-label">Enter Full Name</label>
                        <input type="text" name="fname" class="form-control" id="firstName"
                             placeholder="Winner Effiong" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Enter Email</label>
                        <input type="email" name="lname" class="form-control" id="lastName"
                             placeholder="example@gmail.com" />
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Enter Address</label>
                        <input type="text" name="address" class="form-control" id="Address"
                             placeholder="Effiong" />
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" id="country"
                             placeholder="Effiong" />
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" class="form-control" id="state"
                             placeholder="Enter your state" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Town/City</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Zip</label>
                        <input type="text" name="newpassword" class="form-control" id="exampleInputPassword1"
                            placeholder="" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="" />
                    </div>

                    <button type="submit" id="paymentForm" class="btn btn-primary">Pay now with ATM card or Bank
                        Transfer</button>
                </form> --}}

                {{-- <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal d-none"
                    role="form">


                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['invoiceId' => $fee->id]) }}">


                    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> 

                    <input type="hidden" name="orderID" value="345">


                    <input type="hidden" name="amount" value="{{ $fee->total }}"> 

                    <input type="hidden" name="currency" value="NGN">

                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                    {{ csrf_field() }}


                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">

                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!</button>
                </form> --}}



                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <div class="mb-3">
                                <input type="hidden" name="orderID" class="form-control mb-3" value="{{ rand(time(), 10000000);}}" placeholder="Txn id: {{ rand(time(), 10000000);}}" readonly />
                                <label for="firstName" class="form-label">Enter Full Name</label>
                                <input type="hidden" name="user_unique_id" class="form-control" id="user_unique_id" value="{{Auth::user()->unique_id}}" placeholder="Winner Effiong" readonly/>
                                <input type="hidden" name="first_name" class="form-control" id="firstName" value="{{Auth::user()->first_name}}" placeholder="Winner Effiong" readonly/>
                                <input type="hidden" name="last_name" class="form-control" id="lastName" value="{{Auth::user()->last_name}}" placeholder="Winner Effiong" readonly/>
                                <input type="text" name="full_name" class="form-control" id="fullName" value="{{Auth::user()->first_name .' '. Auth::user()->last_name}}" placeholder="Winner Effiong" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Enter Email</label>
                                <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="example@gmail.com" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Subscription Plan</label>
                                <select name="plan" id="" class="form-control p-2">
                                    <option value="">Select plan</option>
                                    <option value="daily">Daily - 300 Naira only</option>
                                    <option value="weekly">Weekly - 500 Naira only</option>
                                    <option value="monthly">Monthly - 1,100 Naira only</option>
                                    <option value="quarterly">3 Months - 2,600 Naira only</option>
                                    <option value="halfly">6 Months - 5,100 Naira only</option>
                                    <option value="yearly">Yearly - 10,100 Naira only</option>
                                </select>

                                <x-input-error :messages="$errors->get('plan', 'Select a Subscribtion plan' )" style="list-style: none" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3">
                                {{-- <label for="state" class="form-label">Currency</label> --}}
                                <input type="hidden" class="form-control" name="currency" value="NGN" placeholder="Naira" readonly />
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['first_name' => Auth::user()->first_name, 'last_name' => Auth::user()->last_name,]) }}" > 
                            </div>
                            {{-- <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="" />
                            </div> --}}


                            
                            
                            {{-- <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">  --}}
                            
                             {{-- <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful"> to support transaction split. more details https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments  --}}
                             {{-- <input type="hidden" name="split" value="{{ json_encode($split) }}"> to support dynamic transaction split. More details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits -- --}}
                            {{ csrf_field() }}
                
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">   --}}
                
                            <p>
                                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                    <i class="fa fa-plus-circle fa-md px-2"></i> Pay Now!
                                </button>
                            </p>
                        {{-- </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </section>



    {{-- <script src="https://js.paystack.co/v2/inline.js"></script> --}}
    @php
        // $access_code = $output->data->access_code;
        // var_dump($access_code);
    @endphp
@endsection
