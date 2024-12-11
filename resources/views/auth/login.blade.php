<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <button id="registerButton">Don't have an account? Click here for Register!</button>
</body>
<script>
document.getElementById('registerButton').onclick = function() {
    window.location.href = "{{route('register')}}"
};
</script>
</html>