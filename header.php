<?php
require_once 'includes/config.php';

// Ambil link brosur
$sql = "SELECT brosur_link FROM informasi WHERE id = 1";
$result = $conn->query($sql);
$informasi = $result->fetch_assoc() ?: ['brosur_link' => '#'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/sdn-pasirputih01/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .header {
            background-color: #fff;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1001;
        }

        .logo-info {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-right: 40px;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1);
        }

        .school-name {
            font-weight: 700;
            color: #2c3e50;
            font-size: 2rem;
            line-height: 1.2;
        }

        .location {
            color: #2c3e50;
            font-size: 1.2rem;
            font-weight: 500;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .contact-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            font-size: 1rem;
            color: #2c3e50;
        }

        .contact-icon {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-right: 8px;
            transition: color 0.3s ease;
        }

        .contact-item:hover .contact-icon {
            color: #a3bffa;
        }

        .contact-text {
            display: flex;
            flex-direction: column;
            line-height: 1.4;
        }

        .contact-text span:first-child {
            font-size: 1rem;
            color: #6b7280;
        }

        .contact-text span:last-child {
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.1rem;
        }

        /* Login Button */
        .login-button {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            background-color: #2c3e50;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-button i {
            margin-right: 8px;
            font-size: 1rem;
        }

        .login-button:hover {
            background-color: #74c0fc;
            transform: scale(1.05);
        }

        /* Navigation Bar */
        .navigation {
            background-color: #2c3e50;
            width: 100%;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: box-shadow 0.3s ease;
        }

        .navigation.scrolled {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 0;
            justify-content: flex-start;
        }

        .navbar li {
            position: relative;
        }

        .navbar > li > a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .navbar > li > a:hover,
        .navbar > li > a:focus,
        .navbar > li > a:active {
            color: #74c0fc;
        }

        .navbar > li.dropdown > a::after {
            content: '\f078'; /* Font Awesome chevron-down */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 0.8rem;
            margin-left: 5px;
            display: inline-block;
            vertical-align: middle;
            color: #fff;
            transition: transform 0.3s ease;
        }

        .navbar > li.dropdown:hover > a::after,
        .navbar > li.dropdown.active > a::after {
            transform: rotate(180deg);
            color: #74c0fc;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            min-width: 220px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 999;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            border-radius: 4px;
            margin-top: 5px;
        }

        .dropdown-content::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 0;
            width: 100%;
            height: 10px;
            background: transparent;
        }

        .dropdown-content li {
            list-style: none;
        }

        .dropdown-content li a {
            padding: 12px 16px;
            display: block;
            color: #2c3e50;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .dropdown-content li a:hover {
            color: #74c0fc;
            background-color: #f5f5f5;
            padding-left: 20px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            font-size: 1.8rem;
            color: #2c3e50;
            cursor: pointer;
            padding: 10px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .hamburger:hover {
            color: #74c0fc;
            transform: scale(1.1);
        }

        .hamburger.active {
            transform: rotate(180deg);
            color: #333;
        }

        @media (max-width: 900px) {
            .hamburger {
                display: block;
            }

            .navigation {
                padding: 0;
            }

            .navbar {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #2c3e50;
                max-height: 0;
                overflow: hidden;
                opacity: 0;
                transform: translateY(-20px);
                transition: all 0.4s ease-in-out;
            }

            .navbar.show {
                display: flex;
                max-height: 500px;
                opacity: 1;
                transform: translateY(0);
            }

            .navbar li {
                width: 100%;
                opacity: 0;
                transform: translateX(-50px);
                animation: slideInLeft 0.25s ease-out forwards;
            }

            .navbar.show li:nth-child(1) { animation-delay: 0.1s; }
            .navbar.show li:nth-child(2) { animation-delay: 0.2s; }
            .navbar.show li:nth-child(3) { animation-delay: 0.3s; }
            .navbar.show li:nth-child(4) { animation-delay: 0.4s; }
            .navbar.show li:nth-child(5) { animation-delay: 0.5s; }
            .navbar.show li:nth-child(6) { animation-delay: 0.6s; }
            .navbar.show li:nth-child(7) { animation-delay: 0.7s; }

            @keyframes slideInLeft {
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .navbar > li > a {
                padding: 15px 20px;
                border-bottom: 1px solid #3b4a5e;
                color: #fff;
                font-size: 1rem;
            }

            .navbar > li > a:hover {
                background-color: #1a252f;
                padding-left: 30px;
            }

            .dropdown-content {
                position: relative;
                box-shadow: none;
                background-color: #1a252f;
                margin-left: 20px;
                border-radius: 8px;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-in-out;
                opacity: 1;
                transform: none;
                display: block;
                pointer-events: none;
            }

            .dropdown-content::before {
                display: none;
            }

            .dropdown.active .dropdown-content {
                max-height: 300px;
                pointer-events: auto;
            }

            .dropdown-content li a {
                padding: 10px 20px;
                color: #a3bffa;
                border-bottom: 1px solid #3b4a5e;
                font-size: 0.95rem;
            }

            .dropdown-content li a:hover {
                color: #fff;
                background-color: #2c3e50;
            }

            .contact-info {
                display: none;
            }

            .login-button {
                display: none;
            }

            .header-right {
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
                padding: 15px 20px;
            }

            .logo {
                width: 80px;
            }

            .school-name {
                font-size: 1.7rem;
            }

            .location {
                font-size: 1rem;
            }

            .header-right {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animations */
        .header {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .header.animated {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .dropdown-content {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>
<body>
    <!-- HEADER SEKOLAH -->
    <div class="header">
        <div class="logo-info">
            <img src="/sdn-pasirputih01/assets/img/viber.png" alt="Logo SDN Pasir Putih 1" class="logo" loading="lazy" onerror="this.src='/sdn-pasirputih01/assets/img/placeholder.jpg';">
            <div>
                <div class="school-name">SD NEGERI PASIR PUTIH 1</div>
                <div class="location">SAWANGAN - DEPOK JAWA BARAT</div>
            </div>
        </div>
        <div class="header-right">
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone-alt contact-icon"></i>
                    <div class="contact-text">
                        <span>Telepon</span>
                        <span><b>023456789</b></span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope contact-icon"></i>
                    <div class="contact-text">
                        <span>Email</span>
                        <span><b>sdnpasirputih01depok@gmail.com</b></span>
                    </div>
                </div>
            </div>
            <a href="/sdn-pasirputih01/admin/login.php" class="login-button">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </div>
    </div>

    <!-- NAVIGATION MENU -->
    <div class="navigation">
        <div class="hamburger" onclick="toggleNavbar()">☰</div>
        <ul class="navbar" id="navbar">
            <li><a href="/sdn-pasirputih01/index.php">Beranda</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle">Profil Sekolah</a>
                <ul class="dropdown-content">
                    <li><a href="/sdn-pasirputih01/pages/profil-sekolah.php">Profil Sekolah</a></li>
                    <li><a href="/sdn-pasirputih01/pages/sejarah-sekolah.php">Sejarah</a></li>
                    <li><a href="/sdn-pasirputih01/pages/visi-misi.php">Visi & Misi</a></li>
                    <li><a href="/sdn-pasirputih01/pages/fasilitas-sekolah.php">Fasilitas</a></li>
                    <li><a href="/sdn-pasirputih01/pages/struktur-organisasi.php">Struktur Organisasi</a></li>
                    <li><a href="/sdn-pasirputih01/pages/data-guru-staf.php">Data Guru & Staf</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle">Akademik</a>
                <ul class="dropdown-content">
                    <li><a href="/sdn-pasirputih01/pages/program-pembelajaran.php">Program Pembelajaran</a></li>
                    <li><a href="/sdn-pasirputih01/pages/prestasi-siswa.php">Prestasi Siswa</a></li>
                    <li><a href="/sdn-pasirputih01/pages/ekstrakurikuler.php">Ekstrakurikuler</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle">Informasi</a>
                <ul class="dropdown-content">
                    <li><a href="<?= htmlspecialchars($informasi['brosur_link']) ?>" target="_blank">Brosur PPDB 2025-2026</a></li>
                </ul>
            </li>
            <li><a href="/sdn-pasirputih01/pages/kemitraan-sekolah.php">Kemitraan</a></li>
            <li><a href="/sdn-pasirputih01/pages/galeri-sekolah.php">Galeri</a></li>
            <li><a href="/sdn-pasirputih01/pages/kritik-saran.php">Kritik & Saran</a></li>
            <li><a href="/sdn-pasirputih01/pages/kontak.php">Kontak</a></li>
        </ul>
    </div>

    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.header');
            setTimeout(() => header.classList.add('animated'), 100);

            // Sticky navigation with scroll effect
            const navigation = document.querySelector('.navigation');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navigation.classList.add('scrolled');
                } else {
                    navigation.classList.remove('scrolled');
                }
            });
        });

        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            const hamburger = document.querySelector('.hamburger');
            navbar.classList.toggle('show');
            hamburger.classList.toggle('active');

            if (!navbar.classList.contains('show')) {
                document.querySelectorAll('.dropdown').forEach(drop => drop.classList.remove('active'));
            }
        }

        // Dropdown toggle for mobile
        document.querySelectorAll('.dropdown-toggle').forEach(item => {
            item.addEventListener('click', function(event) {
                if (window.innerWidth <= 900) {
                    event.preventDefault();
                    const parent = this.parentElement;
                    document.querySelectorAll('.dropdown').forEach(drop => {
                        if (drop !== parent) drop.classList.remove('active');
                    });
                    parent.classList.toggle('active');
                }
            });
        });

        // Close menu when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 900) {
                const isDropdown = e.target.closest('.dropdown');
                const isHamburger = e.target.closest('.hamburger');
                const isNavbar = e.target.closest('.navbar');
                const navbar = document.getElementById('navbar');
                const hamburger = document.querySelector('.hamburger');

                if (isDropdown || isNavbar) return;

                if (!isHamburger && navbar.classList.contains('show')) {
                    navbar.classList.remove('show');
                    hamburger.classList.remove('active');
                    document.querySelectorAll('.dropdown').forEach(drop => drop.classList.remove('active'));
                }
            }
        });

        // Close mobile menu on resize to desktop
        window.addEventListener('resize', function() {
            const navbar = document.getElementById('navbar');
            const hamburger = document.querySelector('.hamburger');
            if (window.innerWidth > 900) {
                navbar.classList.remove('show');
                hamburger.classList.remove('active');
                document.querySelectorAll('.dropdown').forEach(drop => drop.classList.remove('active'));
            }
        });

        // Dropdown hover for desktop
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.addEventListener('mouseenter', function() {
                if (window.innerWidth > 900) {
                    const dropdownContent = this.querySelector('.dropdown-content');
                    dropdownContent.style.display = 'block';
                    setTimeout(() => {
                        dropdownContent.style.opacity = '1';
                        dropdownContent.style.transform = 'translateY(0)';
                    }, 10);
                }
            });

            dropdown.addEventListener('mouseleave', function() {
                if (window.innerWidth > 900) {
                    const dropdownContent = this.querySelector('.dropdown-content');
                    dropdownContent.style.opacity = '0';
                    dropdownContent.style.transform = 'translateY(10px)';
                    setTimeout(() => {
                        dropdownContent.style.display = 'none';
                    }, 300);
                }
            });
        });
    </script>
</body>
</html>