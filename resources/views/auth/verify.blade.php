<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Verify Your Email</title>
  <style>
    /* GLOBAL RESET & BODY */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background: #000; /* Dark background */
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
      max-width: 450px;
      width: 100%;
      box-shadow: 0 4px 10px rgba(0,0,0,0.6);
      text-align: center;
    }

    /* TITLE */
    .container h1 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    /* TEXT */
    .container p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 30px;
      color: #ccc;
    }

    /* FORM */
    .resend-form {
      display: flex;
      justify-content: center;
    }

    /* BUTTON */
    .resend-button {
      background-color: #399993; 
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      padding: 12px 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .resend-button:hover {
      background-color:rgb(46, 120, 115);
    }

    /* OPTIONAL MEDIA QUERY */
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
    <h1>Verify Your Email Address</h1>
    <p>
      We’ve sent a verification link to your email address. 
      If you didn’t receive it, click below to request another one.
    </p>
    <form class="resend-form" action="{{ route('verification.resend') }}" method="POST">
      @csrf
      <button type="submit" class="resend-button">Resend Email</button>
    </form>
  </div>
</body>
</html>
