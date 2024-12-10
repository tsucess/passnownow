<!DOCTYPE html>
<html>
<head>
    <title>New Subscription</title>
</head>
<body>
        <img src="{{ asset('images/logo.png') }}" class="mx-auto">

    <h1>Subscription Details</h1>
    <p><strong>Order ID:</strong> {{ $formData['orderID'] }}</p>
    <p><strong>First Name:</strong> {{ $formData['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $formData['last_name'] }}</p>
    <p><strong>Email:</strong> {{ $formData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
    <p><strong>Plan:</strong> {{ $formData['plan'] }}</p>
</body>
</html>
