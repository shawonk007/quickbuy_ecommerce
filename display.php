<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "Product Display";
require __DIR__ . '/components/header/primary.php';
require __DIR__ . '/vendor/autoload.php';
?>
<body>
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-5 mt-5">
      <div class="container">
        <div class="row row-cols-3 g-3 g-lg-5">
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card">
              <div class="card-body">
                <div class="display-image">
                  <img src="https://via.placeholder.com/700x700" class="w-100" alt="..." />
                </div>
                <div class="image-gallery owl-carousel owl-theme mt-3">
                  <div class="item">
                    <div class="card p-0 m-0">
                      <div class="card-body p-0 m-0">
                        <img src="https://via.placeholder.com/150x150" class="" alt="..." />
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="card p-0 m-0">
                      <div class="card-body p-0 m-0">
                        <img src="https://via.placeholder.com/150x150" class="" alt="..." />
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="card p-0 m-0">
                      <div class="card-body p-0 m-0">
                        <img src="https://via.placeholder.com/150x150" class="" alt="..." />
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="card p-0 m-0">
                      <div class="card-body p-0 m-0">
                        <img src="https://via.placeholder.com/150x150" class="" alt="..." />
                      </div>
                    </div>
                  </div>
                </div><!-- /.card-gallery -->
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="card">
              <div class="card-header pb-0 mb-0">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0)">Health & Wellness</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Food Suppliments</li>
                  </ol>
                </nav>
              </div>
              <div class="card-body py-2">
                <h4 class="card-title">Standard Horlicks</h4>
                <p class="card-text py-0">
                  <span class="badge bg-success">
                    <i class="fas fa-star"></i>
                    <span class="ps-1">4.5 Star</span>
                  </span>
                  <span class="ps-2">35 Ratings & 45 Reviews Given</span>
                </p>
                <hr>
                <div class="card-text">
                  <h6>Highlights</h6>
                  <p style="text-align: justify;" >
                    Filled with a wide range of vitamins and minerals including as Calcium, Iron, Zinc, Phosphorous, Vitamins A, C, E, D, B1, B2, B6, B12 - Horlicks is a nourishing beverage that helps support your child’s growth. Produced from a mix of malted barley, wheat and milk, this unrivaled tasty recipe has been providing nutrition to people for many years. Horlicks helps to make kids Taller, Stronger and Sharper!
                  </p>
                </div>
                <hr>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <th scope="col" class="ps-0 pe-0 py-1" >SKU</th>
                      <td class="ps-0 pe-0 py-1" >:</td>
                      <td class="ps-0 pe-0 py-1" >QBP-0001</td>
                    </tr>
                    <tr>
                      <th scope="col" class="ps-0 pe-0 py-1" >Brand</th>
                      <td class="ps-0 pe-0 py-1" >:</td>
                      <td class="ps-0 pe-0 py-1" ></td>
                    </tr>
                    <tr>
                      <th scope="col" class="ps-0 pe-0 py-1" ></th>
                      <td class="ps-0 pe-0 py-1" >:</td>
                      <td class="ps-0 pe-0 py-1" ></td>
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
                        <option value="medium" selected >500 gm</option>
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
                    <a href="cart.html" class="btn btn-outline-primary d-block">
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
    </section>
    <section class="py-5">
      <div class="container">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title">Search Tags</h5>
          </div>
          <div class="card-body py-0">
            <p></p>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#description">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#purchase">Purchase</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#replace">Replace Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#comment">Comments</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="description" class="container tab-pane active"><br>
            <h3>Description</h3>
            <ul class="list-group mt-5">
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Horlicks Health and Nutrition Drink Jar.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">It contains the goodness of malted barley and wheat with zero cholesterol, high protein, and no added sugar.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">The High Protein, it contains, is known to help in cell maintenance and repair.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Lite Horlicks contains 6 anti-oxidant nutrients (Selenium, Copper, Zinc, Vitamin C, B2 .and E) that are known to contribute to the protection of cells from oxidative stress.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Filled with a wide range of key vital nutrients and minerals.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Net Weight: 250gm | 500gm | 1000gm </span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Delivery is available.</span>
              </li>
            </ul>
          </div>
          <div id="purchase" class="container tab-pane fade"><br>
            <h3>Purchase Step</h3>
            <ul class="list-group my-5">
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Select number of product you want to buy.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Click on Add to Cart button.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">If you are a new user, please click on Sign Up. Then sign up by providing the required information.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Use your user name & password if you are a registered customer.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Choose your payment (Check out) method.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Follow required instruction based on payment method.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Full advance Payment is required for the delivery outside Dhaka.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Order confirmation and delivery completion are subject to product availability.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Once sold, the product cannot be returned & replaced until it has a warranty.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Please check your product at the time of delivery.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Disclaimer: Product color may slightly vary due to photography, lighting sources or your monitor settings.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">The product will deliver based on product availability.</span>
              </li>
            </ul>
            <h3>How to pay:</h3>
            <ul class="list-group mt-5">
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Cash on Delivery</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Card - Stripe, Visa, Master, Amex, Debit, Credit, Paypal</span>
              </li>
            </ul>
          </div>
          <div id="replace" class="container tab-pane fade"><br>
            <h3>Product Replace</h3>
            <ul class="list-group mt-5">
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Please check your products in front of riders or courier service agents.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Product will be replaced if it has any defect by its manufacturer.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Customer needs to inform us within 24 hours from the date of delivery*.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Products must be with the tags intact and in their original packaging, in an unwashed and undamaged condition.</span>
              </li>
              <li class="list-group-item">
                <i class="far fa-circle-check"></i>
                <span class="ps-2">Replacement for products is subject to inspection and checking by Groceria team.</span>
              </li>
            </ul>
          </div>
          <div id="comment" class="container tab-pane fade"><br>
            <h3>Comment</h3>
            <p>Your must <a href="./auth/index.html">login</a> to submit your comment</p>
            <form action="" aria-disabled="true" >
              <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                  <h6>Your Ratings</h6>
                </div>
                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-4 col-xxl-8">
                  <div>
                    <a disabled >
                      <i class="far fa-star"></i>
                    </a>
                    <a disabled >
                      <i class="far fa-star"></i>
                    </a>
                    <a disabled >
                      <i class="far fa-star"></i>
                    </a>
                    <a disabled >
                      <i class="far fa-star"></i>
                    </a>
                    <a disabled >
                      <i class="far fa-star"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row my-3">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                  <h6>Your Comment</h6>
                </div>
                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-4 col-xxl-8">
                  <div class="input-group mt-2">
                    <textarea name="" class="form-control w-100" id="message" rows="10" placeholder="Type your comment here" disabled ></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>
                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-4 col-xxl-8">
                  <button type="submit" class="btn btn-outline-primary w-100" >Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 my-5">
      <div class="container featured position-relative">
        <h3 class="position-absolute">Related Products</h3>
        <!-- Card Gallery -->
        <div class="featured-left owl-carousel owl-theme pt-4">
          <div class="item">
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <img src="./assets/images/shop/product-08/02.jpg" class="" alt="..." />
                </div>
              </div>
            </a>
          </div>
          <div class="item">
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <img src="./assets/images/shop/product-09/01.jpg" class="" alt="..." />
                </div>
              </div>
            </a>
          </div>
          <div class="item">
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <img src="./assets/images/shop/product-11/01.jpeg" class="" alt="..." />
                </div>
              </div>
            </a>
          </div>
          <div class="item">
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <img src="./assets/images/products/cat-01/nestle-koko-krunch-chocolate-cereal-box-300-gm.webp" class="" alt="..." />
                </div>
              </div>
            </a>
          </div>
          <div class="item">
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <img src="./assets/images/products/cat-01/nestle-nescafe-classic-instant-coffee-jar-50-gm.webp" class="" alt="..." />
                </div>
              </div>
            </a>
          </div>
          <div class="item">
            <a href="#">
              <div class="card">
                <div class="card-body">
                  <img src="./assets/images/products/cat-01/cadbury-dairy-milk-silk-plain-chocolate-bar-150-gm.webp" class="" alt="..." />
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
</body>
</html>