<!DOCTYPE html>
<html lang="en">

<?php include './php/head.php'; ?>
<script>
    if (localStorage.getItem("loggedIn") === "false") {
        window.location.href = "./admin.php";
    }
</script>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <i class="fas fa-home fa-2x"></i>
  <a class="navbar-brand" href="#">Admin Kost Ayu</a>
  
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" onclick="logout()">Logout</a>
    </li>
  </ul>
</nav>
    <script>
        function logout() {
            localStorage.removeItem("username");
            localStorage.removeItem("password");
            localStorage.setItem("loggedIn", "false");
            window.location.href = "./admin.php";
        }
    </script>
    <div class="container">
        <h1 class="mt-4">Selamat datang di Dashboard Kost Ayu</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Kost</h5>
                        <ul class="list-group">
                            <?php
                            $reservationFilePath = './db/reservations.txt';
                            $reservationFileContent = file_get_contents($reservationFilePath);
                            $reservationLines = explode("\n", $reservationFileContent);

                            foreach ($reservationLines as $reservationLine) {
                                if (!empty($reservationLine)) {
                                    $reservationData = explode('|', $reservationLine);
                                    $namaPemesan = trim($reservationData[0]);
                                    $noHP = trim($reservationData[1]);
                                    $email = trim($reservationData[2]);
                                    $namaPaket = trim($reservationData[3]);
                                    $pesan = trim($reservationData[4]);
                                    $tanggalPemesanan = trim($reservationData[5]);

                                    echo '<li class="list-group-item">';
                                    echo '<strong>Nama:</strong> ' . $namaPemesan . '<br>';
                                    echo '<strong>No HP:</strong> ' . $noHP . '<br>';
                                    echo '<strong>Email:</strong> ' . $email . '<br>';
                                    echo '<strong>Nama Paket:</strong> ' . $namaPaket . '<br>';
                                    echo '<strong>Pesan:</strong> ' . $pesan . '<br>';
                                    echo '<strong>Tanggal Pemesanan:</strong> ' . $tanggalPemesanan;
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Sisa Paket</h5>
                        <ul class="list-group">
                            <?php
                            $packageFilePath = './db/data-kamar.txt';
                            $packageFileContent = file_get_contents($packageFilePath);
                            $packageLines = explode("\n", $packageFileContent);

                            foreach ($packageLines as $packageLine) {
                                if (!empty($packageLine)) {
                                    $parts = explode(':', $packageLine);
                                    $packageType = trim($parts[0]);
                                    $packageCount = trim($parts[1]);
                                    echo '<li class="list-group-item">' . $packageType . ': ' . $packageCount . ' kamar </li>';
                                }
                            }
                            ?>
                        </ul>
                        <script>
                            $(document).ready(function () {
                                $('form').submit(function (event) {
                                    event.preventDefault();

                                    var formData = {
                                        'packageType': $('select[name=packageType]').val(),
                                        'packageCount': $('input[name=packageCount]').val()
                                    };

                                    $.ajax({
                                        type: 'POST',
                                        url: './php/update-package.php',
                                        data: formData,
                                        dataType: 'json',
                                        encode: true
                                    })
                                        .done(function (data) {
                                            location.reload();
                                        });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atur Paket</h5>
                        <form action="update-package.php" method="POST">
                            <div class="mb-3">
                                <label for="packageType" class="form-label">Pilih Paket</label>
                                <select class="form-select" id="packageType" name="packageType">
                                    <option value="Sinom">Sinom</option>
                                    <option value="Kinanthi">Kinanthi</option>
                                    <option value="Kebak">Kebak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="packageCount" class="form-label">Banyak Paket</label>
                                <input type="number" class="form-control" id="packageCount" name="packageCount">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Paket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
</body>

</html>