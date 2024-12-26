<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password</title>
  <style>
    /* GLOBAL RESET & BODY */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background: #000; /* or url('bg.jpg') no-repeat center center/cover */
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* MAIN CONTAINER */
    .container {
      background: rgba(0, 0, 0, 0.85);
      padding: 40px 30px;
      border-radius: 8px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.6);
      text-align: center;
    }

    /* TITLE */
    .container h1 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    /* DESCRIPTION */
    .container p {
      font-size: 15px;
      line-height: 1.5;
      margin-bottom: 25px;
      color: #ccc;
    }

    /* FORM */
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    /* INPUT FIELD */
    input[type="email"] {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 4px;
      font-size: 15px;
      background: #333;
      color: #fff;
      outline: none;
    }
    input[type="email"]::placeholder {
      color: #999;
    }

    /* BUTTON */
    .btn-reset {
      background-color: #399993; /* Netflix-like red */
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      padding: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .btn-reset:hover {
      background-color:rgb(44, 117, 112);
    }

    /* MEDIA QUERY */
    @media (max-width: 500px) {
      .container {
        margin: 0 15px;
        padding: 30px 20px;
      }
      .container h1 {
        font-size: 22px;
      }
      .container p {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Forgot Your Password?</h1>
    <p>Enter the email address associated with your account, and we’ll email you a link to reset your password.</p>
    <form action="{{ route('password.email') }}" method="POST">
      @csrf
      <input 
        type="email" 
        name="email" 
        placeholder="Email" 
        required 
      />
      <button type="submit" class="btn-reset">Send Password Reset Link</button>
    </form>
  </div>
</body>
</html>
