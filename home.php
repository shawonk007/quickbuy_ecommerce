<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "Homepage";
require __DIR__ . '/components/header/primary.php';
require __DIR__ . '/vendor/autoload.php';
?>
<body>
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-0 my-5">
      <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://via.placeholder.com/1281x549" class="d-block w-100" alt="..." />
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://via.placeholder.com/1281x549" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://via.placeholder.com/1281x549" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <section class="py-5 my-5">
      <div class="container-fluid container-xl">
        <!-- Category Card -->
        <div class="card shadow">
          <div class="card-body p-0 m-0">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                <div class="card-header bg-primary pb-0">
                  <h5 class="card-title text-white text-center">Foods & Beverages</h5><!-- /.card-title -->
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Fruits & Vegetables</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Meat & Fish</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Cooking</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Sauces & Pickles</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Dairy & Eggs</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Breakfast</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Candy & Chocolate</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Snacks & Baking</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Beverages</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Frozen & Canned</span>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="javascript:void(0)" class="nav-link" >
                      <i class="fas fa-hand-point-right"></i>
                      <span class="ps-2">Diabetic Foods</span>
                    </a>
                  </li>
                </ul>
              </div><!-- /.col -->
              <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 ps-4 pe-4 ps-lg-0 pe-lg-4 ms-0">
                <div class="row row-cols-3 g-2 g-lg-3 py-3">
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                  <div class="col-3">
                    <a href="javascript:void(0)" class="nav-link">
                      <div class="card">
                        <div class="card-body p-1 p-lg-2">
                          <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="..." /><!-- /.card-img-top -->
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                    </a><!-- /.nav-link -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.container -->
    </section>
    <section class="py-5 my-5">
      <div class="container"></div>
    </section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
</body>
</html>