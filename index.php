<?php
$title = "Beranda | UPTD SDN Pasir Putih 01";
require 'includes/config.php';

// Ambil data sambutan
$sql_sambutan = "SELECT kepala_sekolah, text_content, image FROM sambutan_kepsek WHERE id = 1";
$result_sambutan = $conn->query($sql_sambutan);
$sambutan = $result_sambutan->fetch_assoc() ?: [
    'kepala_sekolah' => 'RR. Afiati Fatimah, M.Pd',
    'footer_content' => 'Kepala Sekolah',
    'text_content' => 'Selamat datang di SD Negeri Pasir Putih 01, tempat di mana kami berkomitmen untuk membentuk generasi muda yang unggul, religius, dan berkarakter. Dengan dukungan tenaga pendidik profesional dan fasilitas yang memadai, kami berusaha menciptakan lingkungan belajar yang inspiratif dan menyenangkan. Mari bersama-sama wujudkan pendidikan yang berkualitas untuk masa depan anak-anak Indonesia.',
    'image' => 'assets/img/foto-kepala-sekolah.jpg'
];

// Ambil data visi dan misi
$sql_visi_misi = "SELECT vision_item1, vision_paragraph, vision_item2, vision_item3, mission_item1, mission_item2, mission_item3, mission_item4, mission_item5 FROM visi_misi WHERE id = 1";
$result_visi_misi = $conn->query($sql_visi_misi);
$visi_misi = $result_visi_misi->fetch_assoc() ?: [
    'vision_item1' => 'Terwujudnya Peserta Didik yang Religius',
    'vision_paragraph' => 'Terwujudnya Peserta Didik yang Religius, Berkarakter, Unggul, dan Berwawasan Global',
    'vision_item2' => 'Berkarakter dan Unggul',
    'vision_item3' => 'Berwawasan Global',
    'mission_item1' => 'Menanamkan nilai-nilai keberagaman dan kebangsaan sejak dini kepada seluruh peserta didik.',
    'mission_item2' => 'Meningkatkan mutu pendidikan dan fasilitas sekolah untuk mendukung pembelajaran optimal.',
    'mission_item3' => 'Mendorong siswa untuk berprestasi secara akademik dan non-akademik di berbagai bidang.',
    'mission_item4' => 'Menciptakan lingkungan belajar yang kondusif dan menyenangkan bagi semua warga sekolah.',
    'mission_item5' => 'Mengembangkan kurikulum yang relevan dengan kebutuhan global.'
];
$visi = $visi_misi['vision_paragraph'];
$misi_list = [
    $visi_misi['mission_item1'],
    $visi_misi['mission_item2'],
    $visi_misi['mission_item3'],
    $visi_misi['mission_item4'],
    $visi_misi['mission_item5']
];

// Ambil data statistik
$sql_statistik = "SELECT guru_staf, siswa, rombel FROM statistik WHERE id = 1";
$result_statistik = $conn->query($sql_statistik);
$statistik = $result_statistik->fetch_assoc() ?: [
    'guru_staf' => 19,
    'siswa' => 499,
    'rombel' => 18
];

// Ambil data artikel (batasi 9)
$sql_artikel = "SELECT judul, ringkasan, link FROM artikel WHERE status = 'publish' ORDER BY tanggal DESC LIMIT 9";
$result_artikel = $conn->query($sql_artikel);
$artikel_list = [];
while ($row = $result_artikel->fetch_assoc()) {
    $artikel_list[] = $row;
}
$artikel_list = !empty($artikel_list) ? $artikel_list : [
    ['judul' => 'Prestasi Siswa Terkini', 'ringkasan' => 'Lihat capaian terbaru siswa SDN Pasir Putih 01...', 'link' => '#'],
    ['judul' => 'Program Sekolah Unggulan', 'ringkasan' => 'Ketahui program yang mendukung perkembangan siswa...', 'link' => '#'],
    ['judul' => 'Kegiatan Komunitas Sekolah', 'ringkasan' => 'Ikuti kegiatan yang melibatkan warga sekolah...', 'link' => '#'],
    ['judul' => 'Pembukaan Tahun Ajaran Baru', 'ringkasan' => 'Rangkuman acara pembukaan tahun ajaran...', 'link' => '#'],
    ['judul' => 'Workshop Guru', 'ringkasan' => 'Kegiatan pelatihan untuk meningkatkan kualitas pengajaran...', 'link' => '#'],
    ['judul' => 'Hari Lingkungan Sekolah', 'ringkasan' => 'Aksi peduli lingkungan oleh siswa dan guru...', 'link' => '#'],
    ['judul' => 'Profil Guru Unggulan', 'ringkasan' => 'Ketahui lebih lanjut tentang guru terbaik kami...', 'link' => '#'],
    ['judul' => 'Pelatihan Guru', 'ringkasan' => 'Program pengembangan profesional untuk guru...', 'link' => '#'],
    ['judul' => 'Apresiasi Staf', 'ringkasan' => 'Penghargaan untuk tenaga kependidikan...', 'link' => '#']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Beranda resmi UPTD SD Negeri Pasir Putih 01, Sawangan, Depok. Informasi sambutan, visi misi, dan berita sekolah.">
    <meta name="keywords" content="SD Negeri Pasir Putih 01, Sekolah Dasar Depok, Pendidikan Sawangan, Beranda Sekolah">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title><?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/sdn-pasirputih01/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/png" href="/sdn-pasirputih01/assets/img/viber-Photoroom1.png">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrapper {
            flex: 1 0 auto;
        }
        .container {
            padding: 20px;
        }
        .section-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: linear-gradient(45deg, #ffffff, #e0f7fa);
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }
        .section-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #0077cc, #00c4b4);
        }
        .section-title {
            font-size: 2.5rem;
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .section-subtitle {
            font-size: 1.2rem;
            color: #555;
            text-align: center;
            margin-bottom: 30px;
        }
        .intro-section {
            margin-bottom: 40px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .intro-section h3 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .intro-section p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }
        .carousel {
            position: relative;
            height: 500px;
            margin-bottom: 40px;
            overflow: hidden;
        }
        .carousel-inner {
            height: 100%;
        }
        .carousel-item {
            height: 100%;
            background: no-repeat center center/cover;
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .carousel-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7));
            z-index: 1;
        }
        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(1%, -40%);
            z-index: 2;
            text-align: center;
            color: #fff;
            max-width: 90%;
        }
        .carousel-caption h1 {
            font-size: 3rem;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .carousel-caption h2 {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .carousel-control-prev, .carousel-control-next {
            z-index: 3;
            width: 5%;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        .carousel-control-prev:hover, .carousel-control-next:hover {
            opacity: 1;
        }
        .carousel-indicators {
            z-index: 3;
        }
        .carousel-indicators button {
            background-color: #fff;
            opacity: 0.5;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            transition: opacity 0.3s ease;
        }
        .carousel-indicators .active {
            opacity: 1;
            background-color: #0077cc;
        }
        .sambutan-card {
            border-radius: 12px;
            background-color: #fff;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #0077cc;
            position: relative;
            overflow: hidden;
        }
        .sambutan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .sambutan-card .icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: #0077cc;
            opacity: 0.2;
        }
        .sambutan-image img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            object-fit: cover;
            border: 4px solid #fff;
            transition: transform 0.3s ease;
        }
        .sambutan-image img:hover {
            transform: scale(1.05);
        }
        .sambutan-nama {
            font-size: 1.4rem;
            font-weight: 600;
            color: #0077cc;
            margin-bottom: 8px;
        }
        .sambutan-jabatan {
            font-size: 1.1rem;
            color: #888;
            margin-bottom: 20px;
            font-style: italic;
        }
        .sambutan-isi {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
            text-align: justify;
            margin-bottom: 20px;
        }
        .sambutan-cta {
            background-color: #0077cc;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .sambutan-cta:hover {
            background-color: #005fa3;
            color: white;
        }
        .statistik-card {
            border-radius: 12px;
            background-color: #fff;
            padding: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #0077cc;
            margin-bottom: 15px;
        }
        .statistik-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .statistik-label {
            font-size: 1.2rem;
            color: #2c3e50;
            font-weight: 600;
        }
        .statistik-angka {
            font-size: 2rem;
            color: #0077cc;
            font-weight: 800;
            text-align: right;
        }
        .statistik-unit {
            font-size: 0.9rem;
            color: #888;
            display: block;
        }
        .visi-misi-card {
            border-radius: 12px;
            background-color: #fff;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #0077cc;
            position: relative;
            overflow: hidden;
        }
        .visi-misi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .visi-misi-card .icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: #0077cc;
            opacity: 0.2;
        }
        .visi-misi-visi, .visi-misi-misi-title {
            font-size: 1.3rem;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .visi-misi-list {
            list-style: none;
            padding: 0;
        }
        .visi-misi-list li {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        .visi-misi-list li:before {
            content: "·";
            color: #0077cc;
            font-weight: bold;
            position: absolute;
            left: 0;
            font-size: 1.5rem;
        }
        .artikel-section {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: linear-gradient(45deg, #ffffff, #e0f7fa);
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }
        .artikel-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #0077cc, #00c4b4);
        }
        .artikel-card {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #0077cc;
        }
        .artikel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .artikel-card h4 {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .artikel-card a {
            color: #0077cc;
            text-decoration: none;
        }
        .artikel-card a:hover {
            text-decoration: underline;
        }
        .artikel-card p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }
        @media (max-width: 768px) {
            .section-container, .artikel-section {
                margin: 20px;
                padding: 20px;
            }
            .section-title {
                font-size: 2rem;
            }
            .section-subtitle {
                font-size: 1rem;
            }
            .intro-section {
                padding: 15px;
            }
            .carousel {
                height: 350px;
            }
            .carousel-caption h1 {
                font-size: 2rem;
            }
            .carousel-caption h2 {
                font-size: 1rem;
            }
            .sambutan-image img {
                width: 150px;
                height: 150px;
            }
            .sambutan-nama {
                font-size: 1.2rem;
            }
            .sambutan-jabatan {
                font-size: 1rem;
            }
            .sambutan-isi {
                font-size: 0.9rem;
            }
            .statistik-angka {
                font-size: 1.8rem;
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <div class="content-wrapper">
        <!-- Hero Carousel -->
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/sdn-pasirputih01/assets/img/galeri/guru3.jpeg" alt="Guru SDN Pasir Putih 01" loading="lazy" onerror="this.src='/sdn-pasirputih01/assets/img/placeholder.jpg';">
                    <div class="carousel-caption">
                        <h1>Selamat Datang di UPTD SD Negeri Pasir Putih 01</h1>
                        <h2>Untuk pendidikan yang unggul dan berkarakter.</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/sdn-pasirputih01/assets/img/galeri/gerbang-sekolah.jpg" alt="Gedung SDN Pasir Putih 01" loading="lazy" onerror="this.src='/sdn-pasirputih01/assets/img/placeholder.jpg';">
                    <div class="carousel-caption">
                        <h1>Lingkungan Belajar yang Inspiratif</h1>
                        <h2>Fasilitas modern untuk mendukung prestasi siswa.</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/sdn-pasirputih01/assets/img/galeri/halaman-sekolah3.jpg" alt="Siswa SDN Pasir Putih 01" loading="lazy" onerror="this.src='/sdn-pasirputih01/assets/img/placeholder.jpg';">
                    <div class="carousel-caption">
                        <h1>Membentuk Generasi Berprestasi</h1>
                        <h2>Aktivitas siswa yang kreatif dan inovatif.</h2>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Sambutan & Statistik Section -->
        <div class="container">
            <div class="section-container">
                <h2 class="section-title">Sambutan Kepala Sekolah</h2>
                <p class="section-subtitle">Pesan dari kepala sekolah dan data terkini SD Negeri Pasir Putih 01.</p>
                <div class="sambutan-card">
                    <i class="fas fa-user-tie icon"></i>
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="sambutan-image">
                                        <img src="/sdn-pasirputih01/assets/img/<?= htmlspecialchars($sambutan['image']) ?>" alt="Foto Kepala Sekolah">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="sambutan-nama"><?= htmlspecialchars($sambutan['kepala_sekolah']) ?></div>
                                    <p class="sambutan-isi"><?= htmlspecialchars($sambutan['text_content']) ?></p>
                                    <a href="/sdn-pasirputih01/sambutan-kepsek.php" class="sambutan-cta">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="statistik-wrapper">
                                <div class="statistik-card">
                                    <div class="statistik-label">Guru & Staf</div>
                                    <div class="statistik-angka" data-count="<?= $statistik['guru_staf'] ?>">
                                        0<span class="statistik-unit">orang</span>
                                    </div>
                                </div>
                                <div class="statistik-card">
                                    <div class="statistik-label">Total Siswa</div>
                                    <div class="statistik-angka" data-count="<?= $statistik['siswa'] ?>">
                                        0<span class="statistik-unit">siswa</span>
                                    </div>
                                </div>
                                <div class="statistik-card">
                                    <div class="statistik-label">Rombongan Belajar</div>
                                    <div class="statistik-angka" data-count="<?= $statistik['rombel'] ?>">
                                        0<span class="statistik-unit">kelas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Section -->
        <div class="container">
            <div class="section-container">
                <h2 class="section-title">Visi & Misi Sekolah</h2>
                <p class="section-subtitle">Arah dan tujuan SD Negeri Pasir Putih 01 untuk pendidikan berkualitas.</p>
                <div class="visi-misi-card">
                    <i class="fas fa-bullseye icon"></i>
                    <p class="visi-misi-visi"><strong>Visi:</strong> <?= htmlspecialchars($visi) ?></p>
                    <p class="visi-misi-misi-title"><strong>Misi:</strong></p>
                    <ul class="visi-misi-list">
                        <?php foreach ($misi_list as $misi): ?>
                            <li><?= htmlspecialchars($misi) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Artikel Section -->
        <div class="container">
            <div class="artikel-section">
                <h2 class="section-title">Berita & Artikel Sekolah</h2>
                <p class="section-subtitle">Ikuti kabar terbaru dan informasi penting dari SD Negeri Pasir Putih 01.</p>
                <div class="row">
                    <?php foreach ($artikel_list as $artikel): ?>
                        <div class="col-md-4">
                            <div class="artikel-card">
                                <h4><a href="<?= htmlspecialchars($artikel['link']) ?>"><?= htmlspecialchars($artikel['judul']) ?></a></h4>
                                <p><?= htmlspecialchars($artikel['ringkasan']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Number Counter Animation
            const counters = document.querySelectorAll('.statistik-angka');
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText.replace(/[^0-9]/g, '');
                    const speed = 200;
                    const increment = target / speed;
                    if (count < target) {
                        const newCount = Math.ceil(count + increment);
                        const unit = counter.querySelector('.statistik-unit');
                        const unitText = unit ? unit.outerHTML : '';
                        counter.innerHTML = newCount + unitText;
                        setTimeout(updateCount, 10);
                    } else {
                        const unit = counter.querySelector('.statistik-unit');
                        const unitText = unit ? unit.outerHTML : '';
                        counter.innerHTML = target + unitText;
                    }
                };
                const observer = new IntersectionObserver(entries => {
                    if (entries[0].isIntersecting) {
                        updateCount();
                        observer.disconnect();
                    }
                }, { threshold: 0.5 });
                observer.observe(counter);
            });

            // Scroll Animations
            const sections = document.querySelectorAll('.section-container, .artikel-section');
            const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
            const scrollObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                        scrollObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                scrollObserver.observe(section);
            });

            // Initialize Carousel
            const carousel = new bootstrap.Carousel(document.getElementById('heroCarousel'), {
                interval: 5000,
                ride: 'carousel'
            });
        });
    </script>
</body>
</html>