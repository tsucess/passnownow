<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <h1>New Subscription Form Submission</h1>
    <p><strong>First Name:</strong> {{ $formData['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $formData['last_name'] }}</p>
    <p><strong>Email:</strong> {{ $formData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
    <p><strong>Plan:</strong> {{ $formData['plan'] }}</p>
</body>
</html>
