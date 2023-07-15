<!DOCTYPE HTML>
<html>
<?php include './php/head.php'; ?>
<?php include './php/header-section.php'; ?>

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)"
  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center" data-aos="fade">
        <h1 class="heading mb-3">Formulir Booking</h1>
        <ul class="custom-breadcrumbs mb-4">
          <li><a href="index.php">Home</a></li>
          <li>&bullet;</li>
          <li>Booking</li>
        </ul>
      </div>
    </div>
  </div>

  <a class="mouse smoothscroll" href="#next">
    <div class="mouse-icon">
      <span class="mouse-wheel"></span>
    </div>
  </a>
</section>

<section class="section contact-section" id="next">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-white text-center">
            <h4 class="font-weight-bold text-black">Reservasi Kamar</h4>
          </div>
          <div class="card-body">
            <form action="#" method="post" id="formPaket">
              <div class="form-group">
                <i class="fas fa-user"></i>
                <label class="text-black font-weight-bold" for="name">Nama</label>
                <input type="text" id="name" class="form-control" placeholder="Masukkan nama" required>
              </div>
              <div class="form-group">
                <i class="fas fa-phone"></i>
                <label class="text-black font-weight-bold" for="phone">Telepon</label>
                <input type="text" id="phone" class="form-control" placeholder="Masukkan nomor telepon" required>
              </div>
              <div class="form-group">
                <i class="fas fa-envelope"></i>
                <label class="text-black font-weight-bold" for="email">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Masukkan alamat email" required
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              </div>
              <div class="form-group">
                <i class="fas fa-calendar-alt"></i>
                <label for="paket" class="font-weight-bold text-black">Pilih Paket</label>
                <select name="paket" id="paket" class="form-control" required>
                  <option value="" disabled selected>-- Pilih Paket --</option>
                  <option value="Sinom">Kamar Sinom</option>
                  <option value="Kinanthi">Kamar Kinanthi</option>
                  <option value="Kebak">Kamar Kebak</option>
                </select>
                <div id="paket-message"></div>
              </div>
              <div class="form-group">
                <i class="fas fa-calendar-alt"></i>
                <label class="text-black font-weight-bold" for="tanggal">Tanggal Pemesanan</label>
                <input type="date" id="tanggal" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
              </div>
              <div class="form-group">
                <i class="fas fa-pencil-alt"></i>
                <label class="text-black font-weight-bold" for="message">Catatan</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="8"
                  placeholder="Masukkan catatan" required></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Booking Sekarang</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

  $(document).ready(function () {
    var inputs = $('input, select, textarea');
    var submitBtn = $('button[type="submit"]').prop('disabled', true);

    inputs.on('keyup change', function () {
      var empty = inputs.filter(function () {
        return !this.value;
      });
      var paketAvailable = $('#paket-message').text().includes('Tersedia');
      submitBtn.prop('disabled', empty.length > 0 || !paketAvailable);
    });

    $('#paket').change(function () {
      var paket = $(this).val();
      $.ajax({
        url: './php/processcheck-room.php',
        type: 'post',
        data: { paket: paket },
        success: function (response) {
          if (response.includes('tersedia')) {
            $('#paket-message').html('<span class="text-success">Tersedia</span>');
          } else {
            $('#paket-message').html('<span class="text-danger">Tidak tersedia</span>');
          }
          var empty = inputs.filter(function () {
            return !this.value;
          });
          var paketAvailable = $('#paket-message').text().includes('Tersedia');
          submitBtn.prop('disabled', empty.length > 0 || !paketAvailable);
        }
      });
    });
  });

  $(document).ready(function () {
    $('#formPaket').submit(function (event) {
      event.preventDefault();
      var name = $('#name').val();
      var phone = $('#phone').val();
      var email = $('#email').val();
      var paket = $('#paket').val();
      var message = $('#message').val();
      var tanggal = $('#tanggal').val();
      $.ajax({
        url: './php/process-reservation.php',
        type: 'post',
        data: {
          name: name,
          phone: phone,
          email: email,
          paket: paket,
          message: message,
          tanggal: tanggal
        },
        success: function (response) {
          $('#formPaket').html(response);
        }
      });
    });
  });
</script>






<?php include './php/footer.php'; ?>
<script src="js/jquery-3.3.1.min.js"></script>
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