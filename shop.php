<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Class\Category;
use App\Class\ProductImages;
use App\Class\Products;
use App\Database;

$db = new Database();
$products = new Products($db->conn);
ProductImages::initialize($db->conn);

$pageName = "Shop";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo "Added";
}

require __DIR__ . '/components/header.php';
?>

<body>
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-5">
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="row">
            <div class="col pe-0 me-0">
              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#searchFilters" aria-controls="searchFilters">
                <i class="fas fa-sliders"></i>
                <span class="ps-1">Filter</span>
              </button>
            </div>
            <div class="col ps-0 ms-0">
              <select class="form-select form-select-sm" aria-label="Default select example">
                <option selected>Default</option>
                <option value="1">Name A to Z</option>
                <option value="2">Name Z to A</option>
                <option value="3">Price Low to High</option>
                <option value="4">Price High to Low</option>
              </select>
            </div>
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm justify-content-end">
              <li class="page-item disabled">
                <a class="page-link">
                  <i class="fas fa-angle-left"></i>
                </a>
              </li>
              <li class="page-item"><a class="page-link active" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fas fa-angle-right"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <aside class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="searchFilters" aria-labelledby="searchFiltersLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="searchFiltersLabel">Search Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <!-- <p>Try scrolling the rest of the page to see this option in action.</p> -->
            <form action="">
              <h6>Search by keyword :</h6>
              <div class="form-group mt-2 mb-4">
                <div class="input-group">
                  <input type="search" name="" class="form-control" id="search" placeholder="Search here ..." />
                  <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
            <hr>
            <div class="my-4">
              <label for="customRange2" class="form-label">Price Range</label>
              <input type="range" class="form-range" id="customRange2" />
            </div>
            <hr>
            <div class="my-4">
              <h6>Filter By Brands :</h6>
              <form action="">
                <div class="input-group input-group-sm mt-1 mb-2">
                  <input type="search" name="" class="form-control" id="brandSearch" placeholder="Search Brands ..." />
                  <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="nestle">
                <label class="form-check-label" for="nestle">Nestle</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="unilever">
                <label class="form-check-label" for="unilever">Unilever</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="cocaCola">
                <label class="form-check-label" for="cocaCola">Coca-Cola</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="pepsico">
                <label class="form-check-label" for="pepsico">Pepsico</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="pranGroup">
                <label class="form-check-label" for="pranGroup">Pran Group</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="bombaySweets">
                <label class="form-check-label" for="bombaySweets">Bombay Sweets</label>
              </div>
            </div>
          </aside>
          <div class="row row-cols-3 g-3 my-3" >
            <?php $productList = $products->index();
            foreach ($productList as $product) { 
              // echo $image = ProductImages::getProductImages($product['product_id']);
            ?>
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
              <a href="display.php?product=<?= $product['product_slug'] ?>" class="nav-link">
                <div class="card product-card" >
                  <div class="card-image">
                    <img src="<?= isset($product['product_thumbnail']) ? config("app.root") . 'uploads/products/' . $product['product_thumbnail'] : config("app.root") . 'assets/images/dummy-square.jpg' ;?>" class="card-img-top" alt="..." />
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-title"><?= $product['product_title'] ?></h5>
                    <!-- <a href="#" class="nav-link" ><?= Category::parent($product['product_category'], $db) ?></a> -->
                    <p class="card-text mt-2">
                      <i class="fas fa-star rating-icon"></i>
                      <i class="fas fa-star rating-icon"></i>
                      <i class="fas fa-star rating-icon"></i>
                      <i class="fas fa-star rating-icon"></i>
                      <i class="fas fa-star rating-icon"></i>
                    </p>
                    <p class="card-text">
                      <strong>BDT.</strong>
                      <?php
                      if (isset($product['offer_price'])) { ?>
                        <s><?= $product['regular_price'] ?></s>
                        <span class="badge bg-secondary ms-1"><?= $product['offer_price'] ?></span>
                      <?php } else { ?>
                        <span class="badge bg-secondary ms-1">195.00/-</span>
                      <?php }
                      ?>
                    </p>
                  </div>
                  <div class="card-footer card-btn d-flex justify-content-center">
                    <form action="<?= config("app.root") ?>src/actions/wishlist/store.php" method="post">
                      <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>" >
                      <button type="button" class="btn btn-outline-danger btn-sm btn-wishlist me-2">
                        <i class="fas fa-heart"></i>
                        <span class="ps-1">Wishlist</span>
                      </button>
                    </form>
                    <!-- <button type="button" class="btn btn-outline-danger btn-sm btn-wishlist me-2" data-product="<?= $product['product_id'] ?>">
                      <i class="fas fa-heart"></i>
                      <span class="ps-1">Wishlist</span>
                    </button> -->
                    <a href="#" role="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModal">
                      <i class="fas fa-eye"></i>
                      <span class="ps-1">Quick View</span>
                    </a>
                  </div>
                </div>
              </a>
            </div>
            <?php } ?>
          </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <section>
      <!-- Modal -->
      <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="productModalLabel">Standard Horlicks</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-2">
                    <div class="card">
                      <div class="card-body">
                        <img src="https://via.placeholder.com/700x700" class="card-img-top" alt="..." />
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5 p-2">
                    <div class="card">
                      <div class="card-header">
                        <p class="card-text">
                          <span class="badge bg-success">
                            <i class="fas fa-star"></i>
                            <span class="ps-1">4.5 Star</span>
                          </span>
                          <span class="ps-2">35 Ratings & 45 Reviews Given</span>
                        </p>
                      </div>
                      <div class="card-body">
                        <div class="card-text">
                          <h6>Highlights</h6>
                          <p class="text-xs" style="text-align: justify;">
                            Filled with a wide range of vitamins and minerals including as Calcium, Iron, Zinc, Phosphorous, Vitamins A, C, E, D, B1, B2, B6, B12 - Horlicks is a nourishing beverage that helps support your child’s growth. Produced from a mix of malted barley, wheat and milk, this unrivaled tasty recipe has been providing nutrition to people for many years. Horlicks helps to make kids Taller, Stronger and Sharper!
                          </p>
                        </div>
                        <hr>
                        <table class="table table-borderless">
                          <tbody>
                            <tr>
                              <th class="ps-0 pe-0 py-1">
                                <h6>SKU</h6>
                              </th>
                              <td class="ps-0 pe-1 py-1">:</td>
                              <td class="ps-0 pe-0 py-1">
                                <p>HWFS-001</p>
                              </td>
                            </tr>
                            <tr>
                              <th class="ps-0 pe-0 py-1">
                                <h6>Category</h6>
                              </th>
                              <td class="ps-0 pe-1 py-1">:</td>
                              <td class="ps-0 pe-0 py-1">
                                <a href="#" class="nav-link">Food Suppliments</a>
                              </td>
                            </tr>
                            <tr>
                              <th class="ps-0 pe-0 py-1">
                                <h6>Brand</h6>
                              </th>
                              <td class="ps-0 pe-1 py-1">:</td>
                              <td class="ps-0 pe-0 py-1">
                                <p>Unilever</p>
                              </td>
                            </tr>
                            <tr>
                              <th class="ps-0 pe-0 py-1">
                                <h6>Price</h6>
                              </th>
                              <td class="ps-0 pe-1 py-1">:</td>
                              <td class="ps-0 pe-0 py-1">
                                <h6>
                                  <strong>BDT.</strong>
                                  <span id="price" class="badge bg-secondary ms-2"></span>
                                </h6>
                              </td>
                            </tr>
                            <tr>
                              <th class="ps-0 pe-0 py-1">
                                <h6>Stock</h6>
                              </th>
                              <td class="ps-0 pe-1 py-1">:</td>
                              <td class="ps-0 pe-0 py-1">
                                <p>
                                  <span>Available in stock</span>
                                  <span class="badge bg-warning ms-1">20</span>
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <hr>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="size">Size</label>
                              <select id="size" class="form-control mt-2">
                                <option value="small">250 gm</option>
                                <option value="medium" selected>500 gm</option>
                                <option value="large">1000 gm</option>
                              </select>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="qty">Quantity</label>
                              <div class="input-group mt-2">
                                <button class="btn btn-sm btn-secondary btn-decrement">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" name="" class="form-control text-center qty" id="qty" value="1" min="1" />
                                <button class="btn btn-sm btn-secondary btn-increment">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <a href="#" class="btn btn-outline-danger d-block">
                              <i class="fas fa-heart"></i>
                              <span class="ps-1">Add to Wishlist</span>
                            </a>
                          </div>
                          <div class="col">
                            <a href="#" class="btn btn-outline-primary d-block">
                              <i class="fas fa-shopping-cart"></i>
                              <span class="ps-1">Add to Cart</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a href="#" class="btn btn-outline-secondary">
                <i class="fas fa-eye"></i>
                <span class="ps-1">View Product</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
  <script>
    $(document).ready(function() {
      console.log("Working");
      $('.btn-wishlist').click(function() {
        var product = $(this).data("product");
        console.log(product);
        $.ajax({
          // url: '',
          url: '<? config("app.root") ?>src/actions/wishlist/store.php',
          method: 'POST',
          data: { product: product },
          success: function(response) {
            if (response === "success") {
              alert("Product added to wishlist successfully.");
            } else {
              alert("Failed to add product to wishlist.");
            }
          }
        });
      });
    });
  </script>
</body>

</html>