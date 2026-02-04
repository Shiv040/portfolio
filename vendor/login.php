<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vendor Login</title>
  <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="assets/css/main.min.css" />
  <script>
    function validateForm() {
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('pwd').value.trim();

      if (email === '') {
        alert('Email is required.');
        return false;
      }
      if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert('Please enter a valid email address.');
        return false;
      }
      if (password === '') {
        alert('Password is required.');
        return false;
      }
      return true;
    }
  </script>
</head>
<body class="login-bg">
  <div class="auth-wrapper">
    <form action="check_vendor_login.php" method="post" onsubmit="return validateForm()">
      <div class="auth-box shadow-lg">
        <h4 class="mb-4">Vendor Login</h4>
        <div class="mb-2">
          <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="mb-2">
          <label class="form-label" for="pwd">Password <span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter password">
            <button class="btn btn-outline-light" type="button">
              <i class="bi bi-eye"></i>
            </button>
          </div>
        </div>
        <hr/>
        <div class="d-flex justify-content-between mb-4">
          <a href="Reset_password.php" class="text-decoration-underline small">Forget password?</a>
        </div>
        <div class="mb-2 d-grid">
          <button type="submit" class="btn btn-primary" name="btnLogin">LOGIN</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
