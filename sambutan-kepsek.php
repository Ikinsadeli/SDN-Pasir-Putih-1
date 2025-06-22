<?php
// Koneksi ke database
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "sekolah";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if (!$conn) {
    error_log("Koneksi database gagal: " . $conn->connect_error);
    die("Koneksi database gagal. Silakan coba lagi nanti.");
}

// Ambil data sambutan
$text_content = $footer_content = $kepala_sekolah = $image = "";
$result = $conn->query("SELECT text_content, footer_content, kepala_sekolah, image FROM sambutan_kepsek WHERE id = 1");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $text_content = $row['text_content'];
    $footer_content = $row['footer_content'];
    $kepala_sekolah = $row['kepala_sekolah'];
    $image = $row['image'];
} else {
    error_log("Data sambutan tidak ditemukan di database.");
    $image = 'foto-sekolah.jpg';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sambutan hangat dari Kepala Sekolah SD Negeri Pasir Putih 1, Sawangan, Depok. Komitmen kami dalam mencetak generasi unggul yang berakhlak mulia.">
    <meta name="keywords" content="Sambutan Kepala Sekolah, SDN Pasir Putih 1, Sekolah Dasar Sawangan, Pendidikan Depok">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Sambutan Kepala Sekolah | SD Negeri Pasir Putih 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="/sdn-pasirputih01/assets/img/viber-Photoroom1.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
            opacity: 0;
            transform: translateY(30px);
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
        .ekskul-card {
            border-radius: 12px;
            background-color: #fff;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #0077cc;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .ekskul-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .ekskul-card .icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: #0077cc;
            opacity: 0.2;
        }
        .ekskul-card .image-grid {
            margin-bottom: 20px;
        }
        .ekskul-card .image-item {
            position: relative;
            display: block;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .ekskul-card .image-item img {
            width: 100%;
            max-width: 480px;
            height: auto;
            object-fit: cover;
            display: block;
        }
        .ekskul-card .text-content p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: justify;
        }
        .ekskul-card .footer-content p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: justify;
        }
        .ekskul-card .footer-content p.signature {
            text-align: left;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .section-container {
                margin: 20px;
                padding: 20px;
            }
            .section-title {
                font-size: 2rem;
            }
            .section-subtitle {
                font-size: 1rem;
            }
            .container {
                padding: 15px;
            }
            .ekskul-card .text-content p,
            .ekskul-card .footer-content p {
                font-size: 0.9rem;
            }
            .ekskul-card .icon {
                font-size: 1.5rem;
            }
            .ekskul-card .image-item img {
                max-width: 100%;
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
        <div class="container">
            <div class="section-container">
                <h2 class="section-title">Sambutan Kepala Sekolah</h2>
                <p class="section-subtitle">Komitmen SD Negeri Pasir Putih 1 dalam mencetak generasi unggul yang berakhlak mulia.</p>
                <div class="row">
                    <div class="col-12">
                        <div class="ekskul-card">
                            <i class="fas fa-user-tie icon"></i>
                            <div class="row">
                                <div class="col-md-8 text-content">
                                    <?php echo nl2br(htmlspecialchars($text_content)); ?>
                                </div>
                                <div class="col-md-4 image-grid">
                                    <div class="image-item">
                                        <img src="/sdn-pasirputih01/assets/img/<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/sdn-pasirputih01/assets/img/' . htmlspecialchars($image)) ? htmlspecialchars($image) : 'foto-sekolah.jpg'; ?>" alt="Kepala Sekolah">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 footer-content">
                                    <?php echo nl2br(htmlspecialchars($footer_content)); ?>
                                    <p class="signature"><strong>Kepala Sekolah,</strong><br><em><?php echo htmlspecialchars($kepala_sekolah); ?></em></p>
                                </div>
                            </div>
                        </div>
                    </div>
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
            const sections = document.querySelectorAll('.section-container');
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
                scrollObserver.observe(section);
            });
        });
    </script>
</body>
</html>