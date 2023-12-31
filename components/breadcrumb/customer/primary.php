<?php $root = config("app.root"); ?>
<section class="container-fluid pt-3 mb-5" >
  <div class="card bg-primary-subtle shadow pt-2 pb-1">
    <div class="card-body d-md-flex align-items-center justify-content-between py-0">
      <h4><?= $pageGroup ?></h4>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
        <ol class="breadcrumb mb-2">
          <li class="breadcrumb-item">
            <i class="fas fa-house"></i>
            <a href="<?= $root ?>dashboard.php" >
              <span class="ps-1">Home</span>
            </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><?= $currentPage?></li>
        </ol>
      </nav>
    </div>
  </div>
</section>