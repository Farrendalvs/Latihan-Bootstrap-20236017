<?php 
include 'koneksi.php'; 

// Ambil data dari tabel grafik, diurutkan berdasarkan tahun
$query = mysqli_query($conn, "SELECT * FROM grafik ORDER BY tahun ASC");

$tahun = [];
$penjualan = [];

while ($row = mysqli_fetch_assoc($query)) {
    $tahun[] = $row['tahun'];      // Menyimpan tahun (2019, 2020, dst)
    $penjualan[] = $row['penjualan']; // Menyimpan angka (90, 80, dst)
}

?>

<!doctype html>
<html lang="en">
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Latihan Bootstrap</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css?v=1.1">

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light Headerbg fixed-top">
    <img class="logoku" src="assets/image/DB.jpg">

    <a class="navbar-brand" href="#home" style="font-weight: bold;">
        DAPOERBARRU
    </a>

    <!-- HAMBURGER MENU -->
    <button class="navbar-toggler" type="button" 
            data-toggle="collapse" 
            data-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="#menu">Menu Category</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
    </div>
</nav>
        
        <!-- CARAOUSEL -->
        <section id="home">
        <div class="section-background">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="assets/image/car111.png" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h5 style="font-size: 30px; font-weight: bold;">HELLO, WELCOME!</h5>
                    <p>-Sweet Foods For a Good Mood-</p>
                </div>
                </div>

                <div class="carousel-item">
                <img src="assets/image/car222.png" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h5 style="font-size: 30px; font-weight: bold;">PROFESSIONAL BAKER</h5>
                    <p>-Definitely Won't Disappoint-</p>
                </div>
                </div>

                <div class="carousel-item">
                <img src="assets/image/car3.png" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h5 style="font-size: 30px; font-weight: bold;">FULL OF CREATIVITY</h5>
                    <p>-Any Custom is Possible-</p>
                </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services">
        <h2 class="text-center" style="font-weight:bold;">
            Services
        </h2>

        <div class="services-container">
            <?php
            // 1. Ambil data dari tabel services
            $query = mysqli_query($conn, "SELECT * FROM services");

            // 2. Cek apakah ada data di dalam tabel
            if(mysqli_num_rows($query) > 0) {
                // 3. Lakukan perulangan (Looping) untuk setiap baris data
                while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="service-box">
                        <h4><?php echo $row['judul']; ?></h4>

                        <p>
                            <?php echo $row['deskripsi']; ?>
                        </p>
                    </div>
                    <?php
                }
            } else {
                // Pesan jika database masih kosong
                echo "<p class='text-center'>Belum ada layanan yang tersedia.</p>";
            }
            ?>
        </div>
    </section>

    <!-- ABOUT US -->
<section id="about" style="padding: 20px 0; background-color: #F9F8F6;">
    <div class="container">
        <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px !important; padding-top: 30px;">
            About Us
        </h2>
        
        <div class="row align-items-center justify-content-center">

            <div class="col-lg-3 col-md-4 mb-4 text-center"> 
                <img src="assets/image/dapoerbarrugatsu.png" alt="About Image" 
                    style="width: 100%; max-width: 350px; height: auto; aspect-ratio: 1/1; 
                           border-radius: 50%; object-fit: cover; display: block; margin: 0 auto;
                           border: 8px solid #758A93; padding: 5px; background: #fff;"> </div>

            <div class="col-12 col-md-8 col-lg-4 mb-4"> <div style="padding: 0 15px;">
                    <h3 style="font-weight: bold; color: #333; margin-bottom: 15px; font-family: Georgia, 'Times New Roman', Times, serif;">
                        Hi, this is <br>DAPOERBARRU!
                    </h3>
                    <p style="text-align: justify; color: #666; line-height: 1.8; font-family: Georgia, 'Times New Roman', Times, serif;">
                        This business has been established since 2019. 
                        Focusing on making cookies, cakes, croissants, and various types of pastries. 
                        Its main focus is on flavor, authentic texture, and aesthetic appearance.
                    </p>
                </div>
            </div>

            <div class="col-lg-5 col-12 mb-4"> 
                <div style="background: #fff; padding: 15px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                    <div style="position: relative; height: 250px; width: 100%;">
                        <canvas id="aboutChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    
        <!-- MENU -->
        <section id="menu">
            <div class="about-section">
                <h2 class="text-category" style="font-weight: bold;">Menu Category</h2>

            <div class="card-wrapper">

                <div class="card" style="width: 18rem;">
                    <img src="assets/image/cake.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Cakes</h5>
                        <p class="card-text">A special cake creation with a soft taste and charming decoration perfect for every special moment.</p>
                        <a href="#" class="btn btn-primary">Check >></a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="assets/image/croisant.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Pastry</h5>
                        <p class="card-text">Soft, buttery pastry with a crispy crust that makes every bite feel special.</p>
                        <a href="#" class="btn btn-primary">Check >></a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="assets/image/brownies.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Brownies</h5>
                        <p class="card-text">fudgy, rich, and full of little chocolate chunks that put you in a good mood</p>
                        <a href="#" class="btn btn-primary">Check >></a>
                    </div>
                </div>
                
                <div class="card" style="width: 18rem;">
                    <img src="assets/image/cookies.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Cookies</h5>
                        <p class="card-text">Crispy and savory with an aroma that will make you fall in love from the first bite.</p>
                        <a href="#" class="btn btn-primary">Check >></a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="assets/image/sdg.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Bread</h5>
                        <p class="card-text">Artisan breads and savory pastries that are warm, fragrant, and full of character and simple pleasures.</p>
                        <a href="#" class="btn btn-primary">Check >></a>
                    </div>
                </div>  
            </div>
        </div>
        </section>
        </section> 

        <!-- CONTACT -->
        <section id="contact">
        <div class="contact-section">
                <h2 class="text-contact" style="font-weight: bold;">Contact</h2>
            <div class="maps-container" style="width: 100%; max-width: 800px; margin: auto;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0313815919776!2d110.8214204!3d-7.5715576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a170069f3755f%3A0x74e48a80265f9ea!2sDAPOERBARRU%20Gatsu!5e0!3m2!1sen!2sid!4v1772517675100!5m2!1sen!2sid"
                    width="100%" 
                    height="400" 
                    padding-top="50px"
                    style="border:0; border-radius: 15px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <h4 style="padding: 10px; font-weight: bold;">Our Shop Address:</h4>
                <p>Jl. Gatot Subroto, Kemlayan, Kec. Serengan, Kota Surakarta, Jawa Tengah</p>
                <h4 style="padding: 20px; font-weight: bold;">Operational Schedule:</h4>

                    <div class="schedule">
                        <div class="row" style="font-weight: bold;"><span>Sunday</span><span>10:00 - 21:00</span></div>
                        <div class="row" style="font-weight: bold;"><span>Monday</span><span>10:00 - 21:00</span></div>
                        <div class="row" style="font-weight: bold;"><span>Tuesday</span><span>Close</span></div>
                        <div class="row" style="font-weight: bold;"><span>Wednesday</span><span>10:00 - 21:00</span></div>
                        <div class="row" style="font-weight: bold;"><span>Thursday</span><span>10:00 - 21:00</span></div>
                        <div class="row" style="font-weight: bold;"><span>Friday</span><span>10:00 - 21:00</span></div>
                        <div class="row" style="font-weight: bold;"><span>Saturday</span><span>10.00 - 17:00</span></div>
                    </div>
            </div>
        </div>
        </section>

        <div class="kirimpesan">
        <h2 class="textkirim" style="font-weight: bold;">Let's Send Anything</h2>
        <div class="form-wrapper">
            <form action="kirim_pesan.php" method="POST">    
                <div class="form-group mb-3">
                    <label for="inputName">Name</label>
                    <input type="text" name="nama" class="form-control" id="inputName" required>
                    <small id="nameHelp" class="form-text text-muted">Your Full Name.</small>
                </div>

                <div class="form-group mb-3">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group mb-3">
                    <label for="inputMessage">Message</label>
                    <textarea name="pesan" class="form-control" id="inputMessage" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-secondary w-100" style="background-color: #758A93;">Submit</button>
            </form>
        </div>
    </div>

        <!-- FOOTER -->
        <footer class="footer">
            <h3 class="brand">- DAPOERBARRU -</h3>

            <div class="contact">
                <p><i class="bi bi-telephone-fill"></i> +62 882-0058-24217 <br>
                <i class="bi bi-envelope-fill"></i> dapoerbarru@gmail.com <br>
                <i class="bi bi-instagram"></i> @dapoerbarru</p>

                    <div style="margin-top: 20px; margin-bottom: 20px; font-size: 0.9em;">
                        &copy; Copyright 2020 DAPOERBARRU
                    </div>
            </div>
        </footer>

        <script>
            // aktifkan menu saat diklik
            const navLinks = document.querySelectorAll(".nav-link");

            navLinks.forEach(link => {
                link.addEventListener("click", function() {
                    navLinks.forEach(l => l.classList.remove("active"));
                    this.classList.add("active");
                });
            });
        </script>

        <script>
            $(document).ready(function () {

                // Detect scroll
                $(window).on("scroll", function () {
                    let scrollPos = $(window).scrollTop();

                    // Loop semua section
                    $("section").each(function () {
                        let sectionTop = $(this).offset().top - 80; // jarak navbar
                        let sectionBottom = sectionTop + $(this).outerHeight();

                        // Cek apakah posisi scroll ada pada section
                        if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                            let id = $(this).attr("id");

                            // Hapus active dari semua menu
                            $(".nav-link").removeClass("active");

                            // Kasih active pada menu yang sesuai
                            $('.nav-link[href="#' + id + '"]').addClass("active");
                        }
                    });
                });

            });
        </script>

        <!-- Script ChartJS (link CDN) -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('aboutChart').getContext('2d');
    
    // 1. Inisialisasi Grafik Kosong Dulu
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [], 
            datasets: [{
                label: 'Data Penjualan (%)',
                data: [],
                borderColor: '#758A93', // Warna yang senada dengan header/footer kamu
                backgroundColor: 'rgba(117, 138, 147, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true, max: 100 } }
        }
    });

    // 2. Fungsi untuk mengambil data terbaru dari database
    function updateChart() {
        fetch('ambil_data.php')
            .then(response => response.json())
            .then(newData => {
                // Update label dan data pada grafik
                myChart.data.labels = newData.labels;
                myChart.data.datasets[0].data = newData.data;
                
                // Render ulang grafik tanpa refresh halaman
                myChart.update();
            })
            .catch(error => console.error('Error mengambil data:', error));
    }

    // 3. Jalankan fungsi update pertama kali
    updateChart();

    // 4. SET INTERVAL: Cek database setiap 3000ms (3 detik)
    setInterval(updateChart, 500);
});
</script>
    </body>
</html>                                                                                                                                                                                                          