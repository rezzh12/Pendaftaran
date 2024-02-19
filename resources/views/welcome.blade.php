<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: lavender;
        }
        .navbar-nav {
            padding-right: 50px;
        }
        .nav-item {
            padding-right: 5px;
        }
        .carousel-item img {
            height: 100vh;
        }
        section#about{
            color: black;
        }
        section#contact .row{
            color: white;
        }
        a{
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: blue;
        }
        #profile {
            height: 50vh;
        }
    </style>
  </head>
  <body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('images/download (1).png')}}" alt="PMB TEKNIK"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="pendaftaran">Pengumuman</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="pendaftaran">Pengajar</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="pendaftaran">Tentang</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="/biaya">Biaya</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="pendaftaran">Berita</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="pendaftaran">Kontak</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link active" aria-current="page" href="{{ route('admin.angkatan') }}">Login</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

    <!--carousel-->
    <div class="col-12">
    <section id="home">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/c1.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/c2.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/c3.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    </div>

    <!--info-->
    <div class="col-12">
    <section id="info">
        <div class="container" data-aos="fade-up">
            <h1 class="text-center" style="padding: 50px;">Information</h1>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card" data-aos="zoom-in-down">
                        <img src="{{asset('images/pmb.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Penerimaan Mahasiswa Baru Gelombang 1</h5>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card" data-aos="zoom-in-down">
                        <img src="{{asset('images/pmb.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Penerimaan Mahasiswa Baru Gelombang 2</h5>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card" data-aos="zoom-in-down">
                        <img src="{{asset('images/pmb.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Penerimaan Mahasiswa Baru Gelombang 3</h5>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <!--about-->
    <section id="about" class="bg-light">
        <div class="container">
            <h1 class="text-center" style="padding-bottom: 50px;" data-aos="fade-up">About</h1>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-2 col-sm-12">
                    <img src="{{asset('images/akreditas.png')}}" class="img-rounded" width="90%" alt="" data-aos="fade-right">
                </div>
                <div class="col-md-10 col-sm-12">
                    <h3>Terakreditasi (B) BAN-PT</h3>
                    <p style="padding: 0px 0px;" data-aos="fade-left">
                        Akreditasi Institusi Perguruan Tinggi untuk Universitas Suryakancana dengan Nomor SK: 204/SK/BAN-PT/Akred/PT/X/2018
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, ea amet laborum cumque ad delectus dolore maxime quia sit autem maiores harum fuga eius at libero quibusdam eos deleniti nisi!
                    </p>
                </div>
            </div>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-2 col-sm-12">
                    <img src="{{asset('images/bangunan.png')}}" class="img-rounded" width="90%" alt="" data-aos="fade-right">
                </div>
                <div class="col-md-10 col-sm-12">
                    <h3>Kampus Luas, Suasa Asri & Fasilitas Lengkap</h3>
                    <p style="padding: 20px 0px;" data-aos="fade-left">
                        Universitas Suryakancana berdiri diatas lahan seluas hampir 5 Ha, mempunyai lingkungan yang asri, dengan fasilitas yang jarang dimiliki kampus lain adalah berupa lapangan sepak bola.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid impedit fugit aut maxime exercitationem ratione iste odit possimus, id tempore velit quisquam architecto eum ex at dolor, delectus nisi deleniti?
                    </p>
                </div>
            </div>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-2 col-sm-12">
                    <img src="{{asset('images/medal.png')}}" class="img-rounded" width="90%" alt="" data-aos="fade-right">
                </div>
                <div class="col-md-10 col-sm-12">
                    <h3>Beasiswa Mahasiswa</h3>
                    <p style="padding: 20px 0px;" data-aos="fade-left">
                        Saat ini terdapat berbagai macam beasiswa yang dapat dimanfaatkan mahasiswa baik dari Pemerintah Daerah, Pemerintah Propinsi maupun Pusat.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere ratione sint reprehenderit laborum corporis corrupti maxime ea laudantium iusto vero, suscipit perferendis cumque! Commodi, pariatur. Ullam labore magni molestias excepturi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--location-->
    <section id="location">
        <div class="container-fluid">
            <h1 class="text-center" style="padding:50px;" data-aos="fade-up">Location</h1>
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10674.763549968011!2d107.13669360128542!3d-6.802148287832404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6852e697990cef%3A0x2ddbb36bc8af404e!2sUniversitas%20Suryakancana!5e0!3m2!1sid!2sid!4v1664872760717!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%"></iframe>
            </div>
        </div>
    </section>

    <!--contact-->
    <section id="contact">
        <div class="container-fluid bg-dark" style="padding: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>FAKULTAS & PASCASARJANA</p>
                        <ul>
                            <li><a href="">Fakultas Hukum</a></li>
                            <li><a href="">Fakultas Keguruan & Ilmu Pendidikan</a></li>
                            <li><a href="">Fakultas Teknik</a></li>
                            <li><a href="">Fakultas Sains Terapan</a></li>
                            <li><a href="">Fakultas Ekonomi & Bisnis Islam</a></li>
                            <li><a href="">Fakultas Ilmu Hukum</a></li>
                            <li><a href="">Fakultas Bahasa & Sastra Indonesia</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p>PORTAL KAMPUS</p>
                        <ul>
                            <li><a href="">SPMI UNSUR</a></li>
                            <li><a href="">Jurnal Kampus</a></li>
                            <li><a href="">Repository Kampus</a></li>
                            <li><a href="">Dosen</a></li>
                            <li><a href="">Kemahasiswaan</a></li>
                            <li><a href="">LPPM</a></li>
                            <li><a href="">Inkubator Bisnis</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p>KONTAK KAMI</p>
                        <P>Telepone : (0263) 270 106</P>
                        <p>FAX : 0263 261383</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--footer-->
    <div class="container-fluid bg-dark border-top border-secondary" style="height:50px">
        <div class="row" style="padding-top:15px">
            <p class="text-center" style="color: dimgrey;">Copyright@2022</p>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        let navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function(){
            let scroll = window.scrollY;

            if(scroll > 80){
                navbar.classList.remove('navbar-white bg-light');
                navbar.classList.add('navbar-dark bg-dark');
            
            } else {
                navbar.classList.add('navbar-white bg-light');
                navbar.classList.remove('navbar-dark bg-dark');
            }
        });
        
    </script>
  </body>
</html>