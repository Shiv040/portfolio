<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from bootstrapget.com/demos/templatemonster/latte-bootstrap-admin-template/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:05:35 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Templates & Dashboards - Latte Admin Template</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery/">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="assets/images/favicon.svg" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="assets/css/main.min.css" />

  </head>

  <body class="login-bg">

    <!-- Auth wrapper starts -->
    <div class="auth-wrapper">

    <!-- Form starts -->
    <form method="post" onsubmit="return validateForm()">

      <!-- Authbox starts -->
      <div class="auth-box shadow-lg">

        <!-- Logo starts -->
        <a href="index.html" class="auth-logo mb-4">
        <img src="assets/images/logo-dark.svg" alt="Bootstrap Gallery" />
        </a>
        <!-- Logo ends -->

        <h4 class="mb-4">Reset Password</h4>

        <div class="mb-2">
        <label class="form-label" for="currentPwd">Current password <span class="text-danger">*</span></label>
        <div class="input-group ">
          <input type="password" id="currentPwd" name="currentPwd" class="form-control" placeholder="Enter current password" required>
          <button class="btn btn-outline-light" type="button">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        </div>

        <div class="mb-2">
        <label class="form-label" for="newPwd">New password <span class="text-danger">*</span></label>
        <div class="input-group ">
          <input type="password" name="newPwd" id="newPwd" class="form-control" placeholder="Enter new password" required>
          <button class="btn btn-outline-light" type="button">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        <div class="form-text">
          Your password must be 8-20 characters long.
        </div>
        </div>

        <div class="mb-4">
        <label class="form-label" for="confNewPwd">Confirm new password <span class="text-danger">*</span></label>
        <div class="input-group ">
          <input type="password" id="confNewPwd" class="form-control" placeholder="Confirm new password" required>
          <button class="btn btn-outline-light" type="button">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        </div>

        <div class="mb-2 d-grid">
        <button type="submit" class="btn btn-primary" name="btnR">RESET</button>
        </div>

      </div>
      <!-- Authbox ends -->

    </form>
    <!-- Form ends -->

    <script>
      function validateForm() {
        var newPwd = document.getElementById("newPwd").value;
        var confNewPwd = document.getElementById("confNewPwd").value;

        if (newPwd.length < 8 || newPwd.length > 20) {
        alert("Password must be 8-20 characters long.");
        return false;
        }

        if (newPwd !== confNewPwd) {
        alert("New password and confirm password do not match.");
        return false;
        }

        return true;
      }
    </script>

          <div class="mb-2 pt-2 text-center">
            <span>Back to</span>
            <a href="index.html" class="text-decoration-underline">
              Home</a>
          </div>

        </div>
        <!-- Authbox ends -->

      </form>
      <!-- Form ends -->

    </div>
    <!-- Auth wrapper ends -->

  </body>


<!-- Mirrored from bootstrapget.com/demos/templatemonster/latte-bootstrap-admin-template/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:05:35 GMT -->
</html>