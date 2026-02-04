<!DOCTYPE html>
<html>
<head>
<title>Secure Bank Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    height:100vh;
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:380px;
    background:white;
    padding:40px;
    border-radius:12px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
    text-align:center;
}

.login-box h2{
    margin-bottom:25px;
    color:#2c5364;
}

.login-box input{
    width:100%;
    padding:14px;
    margin:10px 0;
    border-radius:6px;
    border:1px solid #ddd;
    font-size:15px;
    transition:0.3s;
}

.login-box input:focus{
    border-color:#2c5364;
    outline:none;
    box-shadow:0 0 5px rgba(44,83,100,0.3);
}

.login-box button{
    width:100%;
    padding:14px;
    margin-top:15px;
    border:none;
    border-radius:6px;
    background:#2c5364;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

.login-box button:hover{
    background:#203a43;
}

.login-box p{
    margin-top:20px;
    font-size:14px;
}

.login-box a{
    color:#2c5364;
    font-weight:bold;
    text-decoration:none;
}

.login-box a:hover{
    text-decoration:underline;
}
</style>

</head>

<body>

<div class="login-box">
    <h2>🏦 Secure Bank Login</h2>

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Enter Email ID" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Login</button>
    </form>

    <p>
        New User ?
        <a href="/register">Create New Account</a>
    </p>
</div>

</body>
</html>
