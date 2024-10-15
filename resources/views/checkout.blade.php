@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>CHECK <span class="red_header">OUT</span></h1>
                {{-- <p class="text-center header_content"></p> --}}
            </div>
        </div>
    </Section>

    <section class="container-fluid mt-5 ">
        <div class="container row  my-5 mx-auto checkout">
            <div class="col-12 col-md-7 mb-5 mb-md-3 ">
                <h5 class="">Checkout</h5>
                <hr>
                <form class="row g-3 text-dark">
                    <div class="col-md-12">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        {{-- <label for="inputText4" class="form-label">Enter Full Name</label> --}}
                        <input type="text" class="form-control" id="inputText4" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        {{-- <label for="inputText4" class="form-label">Enter Full Name</label> --}}
                        <input type="text" class="form-control" id="inputText5" placeholder="Last Name">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="inputText6" placeholder="Address 1">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="inputText7" placeholder="Town/City">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="inputText8" placeholder="Zip">
                    </div>
                    <div class="col-md-4">
                        <select id="inputCountry" class="form-select">
                            <option selected>Country</option>
                            <option>Nigeria</option>
                            <option>Ghana</option>
                            <option>Gambia</option>
                            <option>South Africa</option>
                            <option>Kenya</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="inputState" class="form-select">
                            <option selected>State</option>
                            <option>Abuja</option>
                            <option>Lagos</option>
                            <option>Kaduna</option>
                            <option>Ogun</option>
                            <option>Oyo</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control" id="inputAddress" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-submit w-60" value="Pay now with ATM card or Bank Transfer">
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-5 mb-3 text-dark mt-md-5 px-md-2 px-lg-5">
                <h5 class="text-dark">Order Summary</h5>
                <table>
                    <tr>
                        <td>Total Products</td>
                        <td>N1,000</td>
                    </tr>
                    <tr>
                        <td>Products</td>
                        <td>N3,500</td>
                    </tr>
                </table>
                <form action="" class="row mt-2">
                    <div class="sub-form">
                        <input type="text" name="" placeholder="Coupon code" class="m-0">
                        <input type="submit" class="btn-submit" value="Apply now">
                    </div>
                </form>
                <hr>
                <table>
                    <tr>
                        <td>Shipment</td>
                        <td>N1,000</td>
                    </tr>
                    <tr>
                        <td>Applied Promo Code</td>
                        <td>N3,500</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>N2,000</b></td>
                    </tr>
                </table>
                <p class="text-center">Secured by Paystack</p>
                <div class="row text-center g-0 mx-auto payment-logos">
                    <div class="col-3">
                        <img src="{{ asset('assets/images/logo-paypal.png') }}" alt="" />
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('assets/images/logo-visa.png') }}" alt="" />
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('assets/images/logo-mastercard.png') }}" alt="" />
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('assets/images/logo-verve.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
