@extends('layouts.dasboardtemp')

@section('admincontent')

    <section class="container-fluid sub_detail__container">
        <div class="row">
            <div class="col-12 mb-3 mb-md-0 subscription_details">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <h6>YOUR CURRENT PLAN</h6>
                            </td>
                            <td><h6>Yearly plan, N10,000</h6></td>
                            <td><a href="#">Change plan</a></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>BILLING CYCLE</h6>
                            </td>
                            <td><h6>You will be charge N10,000 Aug 30, 2024 Enable automatic renewal</h6></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>PAYMENT INFORMATION</h6>
                            </td>
                            <td><h6>Bank Transfer</h6></td>
                            <td ><a href="#">Change method</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </section>
@endsection
