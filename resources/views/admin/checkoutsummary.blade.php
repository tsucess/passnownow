@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid checkoutsummary__container">
        <div class="row">
            <div class="col-12 checkout__summary">
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
                    <div class="input-group">
                        <input type="text" name="" class="form-control" placeholder="Coupon code">
                        <input type="submit" class="btn-submit form-control" value="Apply now">
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
                <p class="text-center mt-5">Secured by Paystack</p>
                <div class="row text-center g-0 mb-5 mx-auto payment-logos">
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
