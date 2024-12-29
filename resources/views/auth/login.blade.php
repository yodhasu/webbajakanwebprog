<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <style>
    /* GLOBAL RESET & BODY */
    * {
      box-sizing: border-box;
      margin: 0; 
      padding: 0;
    }

    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      /* COMMENT FOR KENNARD
        PUT LOGIN BG IMAGE HERE
      */
      background: url('your-bg.jpg') no-repeat center center/cover; /* or remove if no bg image */
      background-color: #000;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* MAIN CONTAINER */
    .container {
      background: rgba(0, 0, 0, 0.75);
      padding: 50px 40px;
      border-radius: 10px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.6);
      text-align: center; /* So the logo is centered */
    }

    /* BRAND IMAGE (Replacing the H1 title) */
    .logo-title {
      display: block;
      margin: 0 auto 30px; /* space below image */
      max-width: 220px;    /* adjust width to your liking */
      height: auto;
    }

    /* FORM */
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      text-align: left; /* label aligns to the left */
    }
    label {
      margin-bottom: 6px;
      font-size: 15px;
      font-weight: 500;
    }

    /* INPUTS */
    input {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 4px;
      font-size: 15px;
      background: #333;
      color: #fff;
      outline: none;
    }
    input::placeholder {
      color: #999;
    }

    /* BUTTONS */
    button {
      width: 100%;
      padding: 14px;
      margin-top: 5px;
      background-color: #399993; 
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color:rgb(47, 125, 119); 
    }

    /* OPTIONAL REGISTER BUTTON STYLE */
    #registerButton {
      background-color: #555;
      margin-top: 10px;
    }
    #registerButton:hover {
      background-color: #777;
    }

    /* FORGOT PASSWORD LINK */
    .forgot-link {
      display: block;
      margin-top: 20px;
      color: #bbb;
      font-size: 14px;
      text-decoration: none;
      transition: color 0.2s;
    }
    .forgot-link:hover {
      color: #fff;
      text-decoration: underline;
    }

    /* RESPONSIVE */
    @media (max-width: 500px) {
      .container {
        margin: 0 15px;
        padding: 40px 20px;
        max-width: 100%;
      }
      .logo-title {
        max-width: 180px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Replace the text “Streamifu” with an image -->
    <a href="/">
    <img
      src="img/dartlogo.png"
      alt="Dart Logo"
      class="logo-title"
    />
    </a>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter your email"
          required 
        />
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Enter your password" 
          required 
        />
      </div>
      <button type="submit">Login</button>
      <button type="button" id="registerButton">Register</button>
    </form>

    <a class="forgot-link" href="{{ route('password.request') }}">
      Forgot Password?
    </a>
  </div>

  <script>
    document.getElementById('registerButton').onclick = function() {
      window.location.href = "{{ route('register') }}";
    };
  </script>
</body>
</html>
