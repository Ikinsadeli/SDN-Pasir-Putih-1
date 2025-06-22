<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Footer Sekolah - SD Negeri Pasir Putih 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    .footer {
      background-color: #2c3e50;
      color: #fff;
      padding: 60px 0 20px;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    .footer-logo {
      width: 100px;
      margin-right: 20px;
      transition: transform 0.3s ease;
    }

    .footer-logo:hover {
      transform: scale(1.1);
    }

    .footer h5, .footer h6 {
      font-weight: 700;
      color: #fff;
      margin-bottom: 20px;
      font-size: 1.7rem; /* Diperbesar dari 1.25rem */
    }

    .footer p {
      color: #d1d8e0;
      font-size: 1.2rem; /* Diperbesar dari 0.95rem */
      line-height: 1.7; /* Disesuaikan untuk keterbacaan */
    }

    .footer a {
      color: #a3bffa;
      text-decoration: none;
      font-size: 1.2rem; /* Diperbesar dari 0.9rem */
      transition: color 0.3s ease;
    }

    .footer a:hover {
      color: #fff;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 15px;
    }

    .social-links a {
      color: #fff;
      font-size: 1.9rem;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-links a:hover {
      transform: translateY(-3px);
      color: #74c0fc;
    }

    .footer-list {
      list-style: none;
      padding: 0;
    }

    .footer-list li {
      margin-bottom: 10px;
      font-size: 1rem; /* Diperbesar dari 0.9rem */
    }

    .footer-bottom {
      background-color: #1a252f;
      padding: 15px 0;
      text-align: center;
      font-size: 1rem; /* Diperbesar dari 0.85rem */
      border-top: 1px solid #3b4a5e;
      margin-top: -10px;
      margin-bottom: -20px;
    }

    .footer-bottom a {
      color: #74c0fc;
    }

    .footer-bottom a:hover {
      color: #fff;
    }

    /* Calendar Styles */
    .calendar {
      background-color: #1a252f;
      padding: 15px;
      border-radius: 8px;
      text-align: center;
    }

    .calendar h6 {
      margin-bottom: 15px;
      font-size: 1.3rem; /* Diperbesar dari default */
    }

    .calendar table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
      font-size: 1rem; /* Diperbesar dari 0.85rem */
    }

    .calendar th, .calendar td {
      padding: 8px;
      text-align: center;
      width: 14.28%; /* 100% / 7 days */
    }

    .calendar th {
      color: #a3bffa;
      font-weight: 500;
      font-size: 0.95rem; /* Diperbesar dari 0.8rem */
    }

    .calendar td {
      color: #d1d8e0;
      transition: background-color 0.3s ease;
    }

    .calendar td.today {
      background-color: #74c0fc;
      color: #fff;
      border-radius: 50%;
      font-weight: 600;
    }

    .calendar td.empty {
      color: #6b7280;
    }

    .calendar td:hover:not(.empty) {
      background-color: #3b4a5e;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .footer-logo {
        width: 80px;
      }

      .footer h5, .footer h6 {
        font-size: 1.3rem; /* Disesuaikan untuk responsivitas */
      }

      .footer p, .footer a {
        font-size: 0.95rem; /* Disesuaikan dari 0.85rem */
      }

      .footer-list li {
        font-size: 0.95rem; /* Disesuaikan */
      }

      .social-links a {
        font-size: 1.3rem;
      }

      .footer .col-md-6, .footer .col-md-3 {
        margin-bottom: 30px;
      }

      .calendar {
        padding: 10px;
      }

      .calendar table {
        font-size: 0.9rem; /* Disesuaikan dari 0.75rem */
      }

      .calendar th {
        font-size: 0.85rem; /* Disesuaikan */
      }

      .calendar th, .calendar td {
        padding: 6px;
      }

      .footer-bottom {
        font-size: 0.9rem; /* Disesuaikan */
      }
    }
  </style>
</head>
<body>
<?php
// PHP to generate calendar for the current month
date_default_timezone_set('Asia/Jakarta'); // Set to WIB
$today = new DateTime('2025-06-16'); // Updated to current date
$month = $today->format('n'); // Month number (1-12)
$year = $today->format('Y'); // Year (2025)
$day = $today->format('j'); // Day of month (16)

// Month name in Indonesian
$month_names = [
  1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
  5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
  9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
];

// First day of the month
$first_day = new DateTime("$year-$month-01");
$first_day_weekday = (int)$first_day->format('w'); // 0 (Sunday) to 6 (Saturday)

// Days in the month
$days_in_month = (int)$first_day->format('t');

// Generate calendar array
$calendar = [];
$week = array_fill(0, 7, null);
$day_count = 1;

// Fill in empty days before the first day
for ($i = 0; $i < $first_day_weekday; $i++) {
  $week[$i] = '';
}

// Fill in the days of the month
for ($i = $first_day_weekday; $i < 7 && $day_count <= $days_in_month; $i++) {
  $week[$i] = $day_count++;
}

// Add the first week to the calendar
$calendar[] = $week;

// Fill in remaining weeks
while ($day_count <= $days_in_month) {
  $week = array_fill(0, 7, '');
  for ($i = 0; $i < 7 && $day_count <= $days_in_month; $i++) {
    $week[$i] = $day_count++;
  }
  $calendar[] = $week;
}

// Fill in the last week with empty days if needed
if (count($calendar) < 6) {
  $last_week = array_fill(0, 7, '');
  $calendar[] = $last_week;
}
?>

<footer class="footer">
  <div class="container">
    <div class="row">
      <!-- Logo dan Deskripsi -->
      <div class="col-md-6 mb-4">
        <div class="d-flex align-items-start">
          <img src="/sdn-pasirputih01/assets/img/viber-Photoroom1.png" alt="Logo SD" class="footer-logo" loading="lazy" onerror="this.src='/sdn-pasirputih01/assets/img/placeholder.jpg';">
          <div>
            <h5 class="fw-bold mb-1">SD NEGERI PASIR PUTIH 1</h5>
            <p class="mb-2">SAWANGAN - DEPOK JAWA BARAT</p>
            <p class="small">Puji syukur kita panjatkan ke hadirat Allah SWT yang telah memberikan kita kesehatan dan kesempatan sehingga kita dapat terus melangkah dan berkembang dalam dunia pendidikan. Dengan penuh rasa bangga dan bahagia, saya menyampaikan sambutan ini kepada seluruh pengunjung website resmi SD Negeri Pasir Putih 1, Sawangan - Depok, Jawa Barat.</p>
          </div>
        </div>
        <!-- Media Sosial -->
        <div class="social-links">
          <a href="https://www.facebook.com/sdmuhammadiyahpakem" target="_blank" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://twitter.com/sdmuhpakem" target="_blank" title="Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="https://www.instagram.com/sdn_pasput1" target="_blank" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://youtube.com/@uptdsdnpasirputih1408?si=_SsJuffGatwahEfQ" target="_blank" title="YouTube">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="https://www.tiktok.com/@sdmuhammadiyahpakem" target="_blank" title="TikTok">
            <i class="fab fa-tiktok"></i>
          </a>
        </div>
      </div>

      <!-- Profil Sekolah -->
      <div class="col-md-3 mb-4">
        <h6>Profil Sekolah</h6>
        <ul class="footer-list">
          <li><a href="/sdn-pasirputih01/index.php">Beranda</a></li>
          <li><a href="#">Profil Sekolah</a></li>
          <li><a href="#">Akademik</a></li>
          <li><a href="#">Informasi</a></li>
          <li><a href="/sdn-pasirputih01/pages/kemitraan-sekolah.php">Kemitraan</a></li>
          <li><a href="/sdn-pasirputih01/pages/galeri-sekolah.php">Galeri</a></li>
          <li><a href="/sdn-pasirputih01/pages/kritik-saran.php">Kritik & Saran</a></li>
          <li><a href="/sdn-pasirputih01/pages/kontak.php">Kontak</a></li>
        </ul>
      </div>

      <!-- Kalender -->
      <div class="col-md-3 mb-4">
        <h6>Kalender</h6>
        <div class="calendar">
          <h6><?php echo $month_names[$month] . ' ' . $year; ?></h6>
          <table>
            <thead>
              <tr>
                <th>M</th><th>S</th><th>S</th><th>R</th><th>K</th><th>J</th><th>S</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($calendar as $week): ?>
                <tr>
                  <?php foreach ($week as $day): ?>
                    <td class="<?php echo $day == $today->format('j') ? 'today' : ($day == '' ? 'empty' : ''); ?>">
                      <?php echo $day; ?>
                    </td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <p class="mb-0">2025 © SD NEGERI PASIR PUTIH 1 SAWANGAN DEPOK JAWA BARAT</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>