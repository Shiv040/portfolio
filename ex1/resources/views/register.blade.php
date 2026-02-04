<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Bank - Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle, #2c4e5e 0%, #16262e 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input-field {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 16px;
}
        .card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            color: #2c4e5e;
        }

        .header h2 { margin: 0; font-size: 24px; }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding doesn't break width */
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #345a6b;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2c4e5e;
        }

        .footer-link {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .footer-link a {
            color: #345a6b;
            text-decoration: none;
            font-weight: bold;
            
        }
        .form-input {
    width: 100%;
    padding: 14px;
    margin-top: 15px;
    border-radius: 6px;
    border: 1px solid #ddd;
    font-size: 16px;
}

    </style>
</head>
<body>

<div class="card">
    <div class="header">
        <img src="https://img.icons8.com/ios-filled/30/2c4e5e/bank.png" alt="bank-icon">
        <h2>Secure Bank Register</h2>
    </div>
<form method="POST" action="/register">
@csrf

<input type="text" name="name" placeholder="Full Name">

<input type="email" name="email" placeholder="Email">

<input type="text" name="phone" placeholder="Phone">

<select name="account_type" class="form-input" required>
    <option value="">Select Account Type</option>
    <option value="Saving">Saving</option>
    <option value="Current">Current</option>
</select>
<input type="number" name="deposit_amount" placeholder="Deposit Amount">

<input type="password" name="password" placeholder="Password">

<input type="password" name="password_confirmation" placeholder="Confirm Password">

<button type="submit">Register</button>

</form>
