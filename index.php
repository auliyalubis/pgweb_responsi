<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pusat Informasi Fasilitas Kesehatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="plugin/leaflet-search-master/dist/leaflet-search.min.css">
    <link rel="stylesheet" href="plugin/Leaflet.defaultextent-master/dist/leaflet.defaultextent.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(117, 151, 186, 0.26);
            margin: 0;
            padding: 0;
        }

        /* Banner Section */
        .banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('faskes/hospital.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 250px 100px;
            margin-bottom: 50px;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .banner p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Styling untuk section feature-icons */
        .feature-icons {
            padding: 50px 0;
            background-color: #d1d7e2;
        }

        /* Menyusun konten highlight-section di tengah */
        .description-section {
            padding: 20px;
            background-color: rgba(150, 163, 189, 0.69);
            border-radius: 10px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.14);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect untuk highlight-section */
        .description-section:hover {
            transform: scale(1.05);
        }

        /* Menyesuaikan gambar */
        .description-section img {
            width: 100px;
            height: 100px;
            margin-bottom: 50px;
        }

        /* Styling untuk tombol */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px;
            margin: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Menyusun elemen di tengah secara vertikal */
        .row.justify-content-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .info-dropdown {
            min-width: 200px;
            background-color: #d1d7e2;
        }

        .info-dropdown .dropdown-item {
            padding: 5px 14px;
            font-size: 14px;
        }

        .info-dropdown .dropdown-item:hover {
            background-color: #f0f0f0;
        }

        .text-justify {
            text-align: justify;
            text-justify: inter-word;
            margin-bottom: 35px;
        }

        /* Hospital Card Styling */
        .card {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            background-color: rgba(8, 60, 97, 0.75);
            /* Warna background */
            padding: 15px;
            /* Kurangi padding agar lebih rapi */
            margin: 5px;
            /* Jarak antar card lebih kecil */
            margin-top: 50px;
            margin-bottom: 90px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Distribusi elemen secara rapi */
            transition: all 0.3s ease-in-out;
            text-align: center;
            /* Pusatkan teks */
            color: #fff;
            flex-basis: 100%;
            /* Pastikan card mengambil ruang penuh */
            max-width: 350px;
            /* Lebar card diperbesar */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Container untuk Card (Flexbox Layout) */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            /* Jarak antar card lebih kecil */
            justify-content: center;
            /* Card ditata ke tengah */
            align-items: flex-start;
            margin: 0 auto;
            /* Pusatkan container */
        }

        /* Card Header Styling */
        .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            /* Kurangi jarak ke konten */
        }

        /* Card Content Styling */
        .card p {
            font-size: 14px;
            color: #555;
            /* Warna teks konten */
            margin-bottom: 10px;
            /* Jarak ke button */
        }

        /* Card Button Styling */
        .card button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            /* Sedikit kurangi padding button */
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        /* Swiper Customization */
        .swiper-container {
            width: 100%;
            height: auto;
            padding: 20px 0;
            /* Tambahkan padding atas dan bawah agar tidak mepet */
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10px;
            /* Tambahkan padding kiri dan kanan agar card tidak terlalu mepet */
            margin-left: 0;
            margin-right: 0;
        }

        .swiper-pagination-bullet-active {
            background: #007bff;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #007bff;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 200px;
        }

        /* Map */
        #map {
            height: 650px;
            margin: 20px auto;
            max-width: 2200px;
            margin-bottom: 60px;
        }

        .table-container {
            margin-top: 250px;
            padding: 0 20px;
            margin-left: 30%;
            margin-right: 30%;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 auto;
            /* Menjajarkan tabel ke tengah */
            margin-bottom: 50px;
        }

        th {
            background-color: rgba(8, 60, 97, 0.75);
            color: white;
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #d1ecf1;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .address-column {
            width: 10%;
        }

        .action-column {
            width: 20%;
        }

        .action-links a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Navbar Brand with Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="faskes/yohealth.jpg" alt="YoHealth Logo" style="height: 40px; margin-right: 10px;">
                YoHealth: Yogyakarta Health Explorer
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="margin-right: 120px;">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hospital">Hospital Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="#map">Map</a></li>
                    <!-- Information Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Info
                        </a>
                        <ul class="dropdown-menu info-dropdown" aria-labelledby="navbarDropdown">
                            <!-- Profile Picture -->
                            <li style="text-align: center; padding: 10px;">
                                <img src="faskes/profile.jpg" alt="Profile Picture" class="profile-img" style="width: 80px; height: 80px; border-radius: 50%;">
                            </li>
                            <!-- Information -->
                            <li><a class="dropdown-item" href="#">Nama: Mardhiyah Auliya Rahman Lubis</a></li>
                            <li><a class="dropdown-item" href="#">NIM: 23/513607/SV/22236</a></li>
                            <li><a class="dropdown-item" href="#">Kelas: A</a></li>
                            <li><a class="dropdown-item" href="http://github.com/auliyalubis" target="_blank">GitHub:
                                    http://github.com/auliyalubis</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS & Popper.js  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Banner Section -->
    <div class="banner">
        <div class="container">
            <h1>Pusat Informasi Rumah Sakit Kota Yogyakarta</h1>
            <p>Jelajahi lokasi dan informasi terkini mengenai rumah sakit di Kota Yogyakarta
                untuk memastikan akses layanan kesehatan terbaik bagi masyarakat</p>
            <a href="#hospital" class="btn btn-custom">Cari Fasilitas Kesehatan</a>
        </div>
    </div>

    <!-- Hospital Hub Section -->
    <div class="container description-section" id="hospital">
        <h2 class="text-center my-4">Rumah Sakit di Kota Yogyakarta</h2>
        <img src="https://img.icons8.com/ios/100/000000/hospital-room.png" alt="Hospital Icon" class="d-block mx-auto mb-4" />
        <p class="text-justify">
            Kota Yogyakarta, yang terkenal dengan kekayaan budaya dan keindahannya, juga memiliki berbagai fasilitas kesehatan
            yang mendukung kualitas hidup warganya. Rumah sakit di Yogyakarta tersebar dengan berbagai jenis pelayanan,
            mulai dari rumah sakit umum yang melayani berbagai kebutuhan medis dasar, hingga rumah sakit khusus yang menawarkan
            perawatan spesialistik di bidang tertentu, seperti jantung, ortopedi, atau kanker. Rumah sakit-rumah sakit ini tidak
            hanya dilengkapi dengan fasilitas medis modern, tetapi juga didukung oleh tenaga medis yang terampil dan berpengalaman,
            memastikan pelayanan yang optimal bagi masyarakat. Dengan komitmen kuat untuk memberikan layanan kesehatan yang terbaik,
            rumah sakit di Yogyakarta siap membantu siapa saja yang membutuhkan perawatan, baik itu untuk layanan rawat jalan,
            rawat inap, ataupun penanganan darurat. Anda dapat dengan mudah menemukan lokasi rumah sakit ini di peta,
            memudahkan Anda untuk mengakses layanan kesehatan yang dibutuhkan dengan cepat dan efisien.
        </p>

        <!-- Navigation Buttons -->
        <div class="text-center my-3">
            <a href="#hospital-slider" class="btn btn-primary" onclick="showHospitalSlider()">Lihat Daftar Rumah Sakit</a>
            <a href="#map" class="btn btn-primary">Kunjungi Peta</a>
        </div>

        <!-- Hospital Cards Section with Swiper -->
        <div id="hospital-slider" class="swiper-container" style="display: none; margin-top: 30px;">
            <div class="swiper-wrapper">
                <!-- Hospital 1 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/panti_rapih.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit Panti Rapih" style="max-width: 100%; height: 160px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit Panti Rapih</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Cik Di Tiro No.30,
                                Samirono, Terban, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Panti Rapih
                                adalah salah satu rumah sakit terkemuka di Yogyakarta, Indonesia, yang didirikan oleh
                                Kongregasi Suster St. Carolus Borromeus. Berdiri sejak tahun 1929, rumah sakit ini
                                berkomitmen memberikan pelayanan kesehatan berkualitas tinggi dengan mengutamakan
                                nilai-nilai kasih, profesionalitas, dan keramahan. Dikenal dengan fasilitas modern dan
                                berbagai spesialisasi medis, RS Panti Rapih juga menjadi pusat rujukan kesehatan bagi
                                masyarakat lokal maupun luar daerah. Visi rumah sakit ini adalah mendukung kesehatan
                                holistik pasien dengan pendekatan yang berpusat pada manusia dan nilai spiritual.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 2 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/bethesda.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit Bethesda" style="max-width: 100%; height: 160px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit Bethesda Yogyakarta</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Jend. Sudirman No.70,
                                Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Bethesda
                                Yogyakarta adalah sebuah rumah sakit umum yang terletak di Yogyakarta, Indonesia. Dikenal
                                sebagai salah satu rumah sakit tertua dan terkemuka di kota ini, Bethesda menyediakan
                                layanan medis yang komprehensif dengan berbagai spesialisasi, mulai dari layanan darurat,
                                bedah, hingga perawatan intensif. Rumah sakit ini juga memiliki fasilitas medis modern dan
                                didukung oleh tenaga medis profesional. Bethesda Yogyakarta dikenal dengan pelayanan yang
                                berkualitas dan pendekatan yang humanis dalam merawat pasien.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 3 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/soetarto.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit DR. Sutarto" style="max-width: 100%; height: 160px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit DR. Sutarto</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Juadi No.19,
                                Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Dr. Sutarto
                                adalah salah satu fasilitas kesehatan yang menyediakan berbagai layanan medis mulai dari
                                perawatan darurat, rawat inap, hingga layanan spesialisasi di berbagai bidang kesehatan.
                                Dikenal dengan pelayanan yang profesional, Rumah Sakit Dr. Sutarto memiliki fasilitas yang
                                memadai dan didukung oleh tenaga medis yang berkompeten. Rumah sakit ini bertujuan untuk
                                memberikan perawatan kesehatan yang terbaik bagi masyarakat Yogyakarta dan sekitarnya.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 4 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/pku_kotagede.jpg" class="card-img-top mx-auto d-block" alt="Rumah Sakit PKU Muhammadiyah Kotagede" style="max-width: 100%; height: 150px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit PKU Muhammadiyah Kotagede</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Kemasan No.43,
                                Purbayan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55173</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit PKU Muhammadiyah
                                Kotagede adalah salah satu rumah sakit yang terletak di Yogyakarta, Indonesia, dan merupakan
                                bagian dari jaringan rumah sakit Muhammadiyah. Rumah sakit ini menawarkan layanan kesehatan
                                yang komprehensif, mulai dari pelayanan medis umum, spesialis, hingga layanan gawat darurat.
                                Rumah sakit ini mengutamakan nilai-nilai Islam dan berfokus pada penyediaan layanan yang
                                menyeluruh, dengan mengedepankan profesionalisme dan kasih sayang. RS PKU Muhammadiyah
                                Kotagede memiliki fasilitas medis yang modern dan didukung oleh tenaga medis yang
                                berkompeten, serta berkomitmen memberikan pelayanan yang terbaik bagi masyarakat.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 5 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/rsud.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit Umum Daerah (RSUD) Kota Yogyakarta" style="max-width: 100%; height: 130px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit Umum Daerah (RSUD) Kota Yogyakarta</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Ki Ageng Pemanahan
                                No.1-6, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55162</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Umum Daerah
                                (RSUD) Kota Yogyakarta adalah rumah sakit milik pemerintah yang menyediakan berbagai layanan
                                kesehatan untuk masyarakat Yogyakarta dan sekitarnya. RSUD ini menawarkan perawatan medis
                                mulai dari layanan darurat, rawat inap, hingga berbagai spesialisasi seperti bedah,
                                kandungan, dan anak. Dikenal dengan fasilitas medis yang memadai, rumah sakit ini juga
                                berkomitmen untuk memberikan pelayanan yang berkualitas, cepat, dan ramah. RSUD Kota
                                Yogyakarta bertujuan untuk mendukung peningkatan kesehatan masyarakat melalui pelayanan yang
                                profesional dan berstandar tinggi.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 6 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/husada.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit Ludira Husada Tama" style="max-width: 100%; height: 160px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit Ludira Husada Tama</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Wiratama No.4,
                                Tegalrejo, Kec. Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55244</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Ludira Husada
                                Tama adalah sebuah rumah sakit yang terletak di Yogyakarta dimana dikenal dengan pelayanan
                                medis yang profesional dan berkualitas. Rumah sakit ini menyediakan berbagai layanan
                                kesehatan, termasuk perawatan darurat, rawat inap, serta layanan spesialisasi di bidang
                                kesehatan tertentu. Dikenal dengan fasilitas yang modern dan tenaga medis yang berkompeten,
                                Rumah Sakit Ludira Husada Tama berkomitmen untuk memberikan pelayanan terbaik kepada pasien
                                dengan pendekatan yang berfokus pada keselamatan dan kenyamanan.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 7 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/lempuyangwangi.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit Bethesda Lempuyangwangi" style="max-width: 100%; height: 160px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit Bethesda Lempuyangwangi</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Hayam Wuruk No.6,
                                Bausasran, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55211</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Bethesda
                                Lempuyangwangi adalah rumah sakit yang terletak di Yogyakarta dimana merupakan bagian dari
                                jaringan Rumah Sakit Bethesda. Rumah sakit ini menawarkan layanan kesehatan yang
                                komprehensif, mulai dari layanan gawat darurat, rawat inap, hingga layanan spesialisasi.
                                Rumah sakit ini memiliki fasilitas medis yang modern dan didukung oleh tenaga medis profesional
                                serta berkomitmen untuk memberikan pelayanan kesehatan yang
                                berkualitas dan berfokus pada pendekatan yang ramah serta humanis dalam merawat pasien.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 8 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/pku_jogja.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit PKU Muhammadiyah Yogyakarta" style="max-width: 100%; height: 130px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit PKU Muhammadiyah Yogyakarta</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. KH. Ahmad Dahlan
                                No.20, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit PKU Muhammadiyah
                                Yogyakarta adalah salah satu rumah sakit terkemuka yang terletak di Yogyakarta, Indonesia.
                                Rumah sakit ini dikelola oleh Muhammadiyah, sebuah organisasi Islam yang berfokus pada
                                pelayanan kesehatan dengan prinsip-prinsip kemanusiaan dan profesionalisme. RS PKU
                                Muhammadiyah Yogyakarta menyediakan berbagai layanan medis, mulai dari layanan darurat,
                                rawat inap, spesialisasi medis, hingga layanan medis modern lainnya. Dengan fasilitas yang
                                lengkap dan tenaga medis terlatih, rumah sakit ini berkomitmen untuk memberi
                                pelayanan kesehatan yang berkualitas dan menjunjung tinggi nilai keislaman.</p>
                        </div>
                    </div>
                </div>
                <!-- Hospital 9 -->
                <div class="swiper-slide" style="width: 600px; height: 600px">
                    <div class="card h-100">
                        <img src="faskes/rspratama.jpeg" class="card-img-top mx-auto d-block" alt="Rumah Sakit Pratama Kota Yogyakarta" style="max-width: 100%; height: 160px; width: 220px; margin-top: 25px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">Rumah Sakit Pratama Kota Yogyakarta</h5>
                            <p class="card-text" style="font-size: 12px; color: #fff"><strong>Alamat:</strong> Jl. Kolonel Sugiyono
                                No.98, Brontokusuman, Kec. Mergangsan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55153</p>
                            <p class="card-text" style="font-size: 12px; text-align: justify; color: #fff">Rumah Sakit Pratama Kota
                                Yogyakarta adalah sebuah fasilitas kesehatan yang menyediakan layanan medis dasar hingga
                                spesialis. Terletak di pusat Kota Yogyakarta, rumah sakit ini berkomitmen untuk memberikan
                                pelayanan kesehatan yang berkualitas dengan didukung oleh tenaga medis profesional dan
                                fasilitas yang memadai. Rumah Sakit Pratama berfokus pada pelayanan yang cepat, efektif, dan
                                ramah, serta melayani pasien dengan pendekatan yang holistik untuk memenuhi kebutuhan
                                kesehatan masyarakat Yogyakarta dan sekitarnya.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Pagination & Navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Swiper.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Initialize Swiper
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });

        // Show Swiper Section on Button Click
        function showHospitalSlider() {
            document.getElementById("hospital-slider").style.display = "block";
        }
    </script>

    <!-- Map Section -->
    <div class="container">
        <h2 class="text-center my-4">Peta Sebaran Rumah Sakit Kota Yogyakarta</h2>
        <div id="map"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <div id=" map"></div>

    <!-- Table Section -->
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yohealth";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database
    $sql = "SELECT * FROM faskes";
    $result = $conn->query($sql);

    //Prepare an array to hold coordinates for Leaflet markers
    $coordinates = [];

    if ($result->num_rows > 0) {
        echo "<table><tr>
                <th>No</th>
                <th>Rumah Sakit</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Alamat</th>
                <th>Aksi</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["no"] . "</td>
                <td>" . $row["rumah_sakit"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td>" . $row["alamat"] . "</td>
                <td>
                    <a href='edit.php?id=" . intval($row["id"]) . "'>Edit</a> |
                    <a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Delete</a>
                </td>
            </tr>";

            // Add coordinates to the array
            $coordinates[] = [
                'latitude' => $row["latitude"],
                'longitude' => $row["longitude"],
                'rumah_sakit' => htmlspecialchars($row["rumah_sakit"], ENT_QUOTES, 'UTF-8'),
                'alamat' => htmlspecialchars($row["alamat"], ENT_QUOTES, 'UTF-8')
            ];
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="plugin/leaflet-search-master/dist/leaflet-search.min.js"></script>
    <script src="plugin/Leaflet.defaultextent-master/dist/leaflet.defaultextent.js"></script>
    <script>
        // Initialize the map
        var map = L.map("map").setView([-7.8013685509467, 110.3647416988555], 13);

        // Base Map
        var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        });
        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        var rupabumiindonesia = L.tileLayer('https://geoservices.big.go.id/rbi/rest/services/BASEMAP/Rupabumi_Indonesia/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Badan Informasi Geospasial'
        });

        osm.addTo(map);

        // GeoJSON Point Rumah Sakit
        var rumah_sakit = L.geoJSON(null, {
            // Style
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: "faskes/icon.jpg", // icon marker
                        iconSize: [24, 24], // ukuran icon
                        iconAnchor: [24, 48], // posisi icon terhadap titik (point)
                        popupAnchor: [0, -48], // posisi popup terhadap icon
                        tooltipAnchor: [-16, -30], // posisi tooltip terhadap icon
                    }),
                });
            },
            // onEachFeature
            onEachFeature: function(feature, layer) {
                // variable popup content
                var popup_content = "Nama: " + feature.properties.FASKES + "<br>" +
                    "Alamat: " + feature.properties.ALAMAT + "<br>" +
                    "Koordinat: " + feature.geometry.coordinates[1] + ", " + feature.geometry.coordinates[0];

                layer.on({
                    click: function(e) {
                        // Menampilkan popup langsung
                        layer.bindPopup(popup_content).openPopup();
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.FASKES, {
                            direction: "left",
                            sticky: true,
                        });
                    },
                });
            },
        });

        $.getJSON("data/rumah_sakit.geojson", function(data) {
            rumah_sakit.addData(data); // Menambahkan data ke dalam GeoJSON Point Rumah Sakit
            map.addLayer(rumah_sakit); // Menambahkan GeoJSON Point Rumah Sakit ke dalam peta
        });

        // GeoJSON Polyline Jalan
        map.createPane('panejalan');
        map.getPane("panejalan").style.zIndex = 401;

        var jalan = L.geoJSON(null, {
            pane: 'panejalan',
            // Style
            style: function(feature) {
                return {
                    color: "red",
                    opacity: 1,
                    weight: 2,
                };
            },
            // onEachFeature
            onEachFeature: function(feature, layer) {
                // variable popup content
                var popup_content = "Fungsi: " + feature.properties.REMARK;

                layer.on({
                    click: function(e) {
                        // Menampilkan popup langsung
                        layer.bindPopup(popup_content).openPopup();
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.REMARK, {
                            direction: "auto",
                            sticky: true,
                        });
                    },
                });
            },
        });

        $.getJSON("data/jalan.geojson", function(data) {
            jalan.addData(data); // Menambahkan data ke dalam GeoJSON Polyline Jalan
            map.addLayer(jalan); // Menambahkan GeoJSON Polyline Jalan ke dalam peta
        });

        // GeoJSON Polygon Admin
        map.createPane('paneAdmin');
        map.getPane("paneAdmin").style.zIndex = 301;
        var symbologyCategorized = {
            "Tinggi": "#efedf5",
            "Sedang": "#bcbddc",
            "Rendah": "#756bb1"
        };

        var admin = L.geoJSON(null, {
            pane: 'paneAdmin',

            // onEachFeature
            onEachFeature: function(feature, layer) {
                // variable popup content
                var popup_content = "Desa: " + feature.properties.NAMOBJ + "<br>" +
                    "Kecamatan: " + feature.properties.WADMKC + "<br>" +
                    "Kabupaten: " + feature.properties.WADMKK + "<br>" +
                    "Provinsi: " + feature.properties.WADMPR;

                layer.on({
                    click: function(e) {
                        // Menampilkan popup langsung
                        layer.bindPopup(popup_content).openPopup();
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.DESA_KELUR, {
                            direction: "auto",
                            sticky: true,
                        });
                    },
                });
            },
        });

        $.getJSON("data/admin.geojson", function(data) {
            admin.addData(data); // Menambahkan data ke dalam GeoJSON Polygon Jumlah Penduduk
            map.addLayer(admin); // Menambahkan GeoJSON Polygon Jumlah Penduduk ke dalam peta
        });

        // Control Layer
        var baseMaps = {
            "OpenStreetMap": osm,
            "Esri World Imagery": Esri_WorldImagery,
            "Rupa Bumi Indonesia": rupabumiindonesia,
        };

        var overlayMaps = {
            "Rumah Sakit": rumah_sakit,
            "Jalan": jalan,
            "Kecamatan": admin
        };

        var controllayer = L.control.layers(baseMaps, overlayMaps);
        controllayer.addTo(map);

        // Menambahkan CSS untuk meratakan teks di kontrol layer
        var css = `
    .leaflet-control-layers label {
        text-align: left !important;
    }
`;

        // Menyisipkan CSS ke dalam dokumen
        var style = document.createElement('style');
        style.innerHTML = css;
        document.head.appendChild(style);

        // JavaScript array holding PHP data
        var locations = <?php echo json_encode($coordinates); ?>;

        // Add markers from the database data
        locations.forEach(function(location) {
            var marker = L.marker([location.latitude, location.longitude]).addTo(map);
            marker.bindPopup("<b>" + location.rumah_sakit + "</b><br>Longitude: " + location.longitude + "<br>Latitude: " + location.latitude);
        });
    </script>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p style="margin-top: 10px; margin-bottom: 10px">&copy; 2024 YoHealth: Yogyakarta Health Explorer</p>
    </footer>
</body>

</html>