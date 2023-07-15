<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo" data-aos="fade">
                <a href="index.php">Kost Ayu</a>
            </div>
            <div class="col-6 col-lg-8">
                <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="site-navbar js-site-navbar">
                    <nav role="navigation">
                        <div class="container">
                            <div class="row full-height align-items-center">
                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled menu">
                                        <li><a href="index.php">Beranda</a></li>
                                        <li><a href="rooms.php">Paket</a></li>
                                        <li><a href="about.php">Tentang</a></li>
                                        <li><a href="reservation.php">Booking</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    let path = window.location.pathname;
    path = path.replace('/PWEB-responsi/', '');
    path = path.replace('/', '');
    let menuItems = document.querySelectorAll('.menu li');

    menuItems.forEach(item => {

        let href = item.querySelector('a').getAttribute('href');
        if (href === path) {
            item.classList.add('active');
            console.log("berhasil");
        }

    });
    console.log(path);
</script>