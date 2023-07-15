<section class="section bg-light pb-">
    <div class="container">
      <div class="row check-availabilty" id="next">
        <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
          <form id="formPaket">
            <div class="row">
              <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                <label for="paket" class="font-weight-bold text-black">Pilih Paket</label>
                <select name="paket" id="paket" class="form-control" required>
                  <option value="" disabled selected>-- Pilih Paket --</option>
                  <option value="Sinom">Kamar Sinom</option>
                  <option value="Kinanthi">Kamar Kinanthi</option>
                  <option value="Kebak">Kamar Kebak</option>
                </select>
              </div>
              <div class="col-md-6 col-lg-4 align-self-end">
                <button type="submit" class="btn btn-primary btn-block text-white">Cek Ketersediaan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>





  <script>
    $("#formPaket").submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: "./php/processcheck-room.php",
        method: "POST",
        data: {
          paket: $("#paket").val()
        },
        success: function (response) {
          var alertClass = response.includes("tersedia") ? "alert-success" : "alert-danger";
          var alertHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' + response;
          $("#formPaket .alert").remove();
          $("#formPaket").prepend(alertHTML);
        }
      });

    });
  </script>