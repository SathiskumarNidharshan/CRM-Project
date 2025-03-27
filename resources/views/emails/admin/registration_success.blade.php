<!DOCTYPE html>
<html>

<head>
    <title>Admin Registration Success</title>
</head>

<body>
    <h2>Hello {{ $admin->name }},</h2>
    <p>Welcome to the Admin panel! Your registration was successful.</p>
    <p>We are excited to have you on board. You can now log in to the admin panel using your credentials.</p>

    <p><strong>Username:</strong> {{ $admin->email }}</p>
    <p><strong>Password:</strong> {{ $admin ->password }}</p>

    <p>Thank you for registering!</p>
</body>

</html>