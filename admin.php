<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
  echo "<script>window.location.href = 'admin_dashboard.php';</script>";
  exit();
}
?>
<?php include './php/head.php'; ?>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center">Login Admin Kost Ayu</h2>
            <form id="loginForm">
              <div class="form-group">
                <label for="username">Nama:</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan nama">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan password">
              </div>
              <div id="errorContainer"></div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    if (localStorage.getItem("loggedIn") === "true") {
      window.location.href = "admin_dashboard.php";
    }


    document.getElementById("loginForm").addEventListener("submit", function(event) {
      event.preventDefault();
      var usernameInput = document.getElementById("username");
      var passwordInput = document.getElementById("password");
      var errorContainer = document.getElementById("errorContainer");
      var username = usernameInput.value;
      var password = passwordInput.value;
      while (errorContainer.firstChild) {
        errorContainer.removeChild(errorContainer.firstChild);
      }

      if (username === "ayu" && password === "12345") {
        localStorage.setItem("loggedIn", "true");
        localStorage.setItem("username", username);

        window.location.href = "admin_dashboard.php";
      } else {
        var errorElement = document.createElement("p");
        errorElement.className = "text-danger";
        errorElement.textContent = "Nama atau password salah";
        errorContainer.appendChild(errorElement);
      }
    });
  </script>
</body>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/main.js"></script>
</html>