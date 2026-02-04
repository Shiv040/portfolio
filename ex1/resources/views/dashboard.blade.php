<!DOCTYPE html>
<html>
<head>
    <title>Bank Dashboard</title>
 <h3>Welcome {{ session('user_name') }}</h3>
<style>
body{
    font-family: Arial;
    background: linear-gradient(120deg,#1e3c72,#2a5298);
}

.dashboard{
    width: 80%;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
}

.card{
    width: 200px;
    display: inline-block;
    margin: 15px;
    padding: 20px;
    background: #f5f5f5;
    border-radius: 8px;
    text-align: center;
}

.card button{
    padding:10px 20px;
    background:#1e3c72;
    color:white;
    border:none;
    border-radius:5px;
}
</style>

</head>

<body>

<div class="dashboard">

    <h2>🏦 Banking Dashboard</h2>
    <hr>
    <h3>Welcome {{ session('user_name') }}</h3>
    <div class="card">
        <h3>Check Balance</h3>
        <button>Open</button>
    </div>

    <div class="card">
        <h3>Transfer Money</h3>
        <button>Open</button>
    </div>

    <div class="card">
        <h3>Transactions</h3>
        <button>Open</button>
    </div>

    <div class="card">
        <h3>Logout</h3>
        <button onclick="location.href='/login'">Logout</button>
    </div>

</div>

</body>
</html>
