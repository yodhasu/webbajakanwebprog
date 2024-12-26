<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register | Streamifu</title>
  <style>
    /* GLOBAL RESET & BODY */
    * {
      box-sizing: border-box;
      margin: 0; 
      padding: 0;
    }

    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background: #000; /* or use an image: url('bg.jpg') no-repeat center center/cover */
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* MAIN CONTAINER */
    .container {
      background: rgba(0, 0, 0, 0.85);
      padding: 50px 40px;
      border-radius: 10px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.6);
      text-align: center;
    }

    /* BRAND AREA */
    .brand {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 30px;
    }
    .brand img {
      max-width: 150px; /* Adjust to fit your design */
      height: auto;
      margin-bottom: 10px;
    }
    .brand h1 {
      font-size: 26px;
      font-weight: 700;
      letter-spacing: 1px;
    }

    /* FORM */
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    /* INPUT FIELDS */
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

    /* REGISTER BUTTON */
    .btn-register {
      width: 100%;
      padding: 14px;
      background-color: #399993; /* Netflix-like red */
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .btn-register:hover {
      background-color:rgb(40, 108, 104);
    }

    /* OPTIONAL BOTTOM LINK (e.g. "Already have an account?") */
    .bottom-link {
      margin-top: 20px;
      font-size: 14px;
      color: #bbb;
    }
    .bottom-link a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s;
    }
    .bottom-link a:hover {
      color:rgb(44, 117, 112);
      text-decoration: underline;
    }

    /* RESPONSIVE */
    @media (max-width: 500px) {
      .container {
        margin: 0 15px;
        padding: 40px 20px;
        max-width: 100%;
      }
      .brand img {
        max-width: 60px;
      }
      .brand h1 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- BRAND AREA -->
    <div class="brand">
        <a href="/">
            <img
            src="img/dartlogo.png"
            alt="Dart Logo"
            class="logo-title"
            />
        </a>
    </div>

    <!-- REGISTER FORM -->
    <form action="{{ route('register') }}" method="POST">
      @csrf
      <input type="text" name="name" placeholder="Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

      <button type="submit" class="btn-register">Register</button>
    </form>

    <!-- If you want a link to "Already have an account? Login" -->
    <div class="bottom-link">
      Already have an account? 
      <a href="{{ route('login') }}">Login here</a>
    </div>
  </div>

</body>
</html>
