<section class="container-fluid mb-4" >
  <div class="card bg-light pt-2 pb-1">
    <!-- <div class="card-body d-md-flex align-items-center justify-content-between py-0"> -->
    <div class="card-body d-flex align-items-center justify-content-between py-0">
      <h4><?= $pageGroup ?></h4>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $currentPage?></li>
        </ol>
      </nav>
    </div>
  </div>
</section>