
@section('title')
<title>Login</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{secure_asset('css/login.css')}}">
@endsection

@section('content')
<div class="container">
    <a href="/">
        <img src="img/dartlogo.png" alt="Dart Logo" class="logo-title" />
    </a>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required />
        </div>
        <button type="submit">Login</button>
        <button type="button" id="registerButton">Register</button>
    </form>
    <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
</div>
<script>
    document.getElementById('registerButton').onclick = function() {
        window.location.href = "{{ route('register') }}";
    };
</script>
@endsection
