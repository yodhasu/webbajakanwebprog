<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>A verification link has been sent to your email address. If you didn't receive it,</p>
    <form action="{{ route('verification.resend') }}" method="POST">
        @csrf
        <button type="submit">Click here to request another</button>
    </form>
</body>
</html>