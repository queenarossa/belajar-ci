<?php
use App\Models\DiskonModel;
$diskonModel = new DiskonModel();
$diskonHariIni = $diskonModel->where('tanggal', date('Y-m-d'))->first();
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center">
      <img src="<?= base_url() ?>NiceAdmin/assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Toko</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

<?php if ($diskonHariIni): ?>
  <li class="nav-item d-flex align-items-center me-2">
    <span class="badge bg-info text-dark fw-bold">
       🎉 Hari ini ada diskon <?= 'Rp' . number_format($diskonHariIni['nominal']) ?> per item
    </span>
  </li>
<?php endif; ?>

      <!-- Notifikasi (boleh dibiarkan) -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">4</span>
        </a>
        <!-- ... isi notifikasi ... -->
      </li>

      <!-- Pesan -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a>
        <!-- ... isi pesan ... -->
      </li>

      <!-- Profil -->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= base_url()?>NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">
            <?= session()->get('username'); ?> (<?= session()->get('role'); ?>)
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= session()->get('username'); ?></h6>
            <span><?= ucfirst(session()->get('role')); ?></span>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item d-flex align-items-center" href="logout"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
        </ul>
      </li>

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
