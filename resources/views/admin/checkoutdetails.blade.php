@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid profile__container">
        <div class="row">
            <div class="col-12 profile_data">
                <div class="top">
                    <h5>Checkout</h5>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Enter Full Name</label>
                        <input type="text" name="fname" class="form-control" id="firstName" aria-describedby="emailHelp" placeholder="Winner Effiong" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Enter Email</label>
                        <input type="email" name="lname" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="example@gmail.com" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Enter Address</label>
                        <input type="text" name="lname" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Effiong" />
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Country</label>
                        <input type="text" name="lname" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Effiong" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">State</label>
                        <input type="text" name="eamil" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Town/City</label>
                        <input type="text" name="oldpassword" class="form-control" id="exampleInputPassword1" placeholder="******" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Zip</label>
                        <input type="text" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="******" />
                    </div>
                    <div class="mb-3">
                        <label for="confirmInputPassword1" class="form-label">Password</label>
                        <input type="password" name="confirmpassword" class="form-control" id="confirmInputPassword1" placeholder="******" />
                    </div>
                
                    <button type="submit" class="btn btn-primary">Pay now with ATM card or Bank Transfer</button>
                </form>
            </div>
        </div>
    </section>



    <script src="https://js.paystack.co/v2/inline.js">
@endsection
