<section class="py-5 bg-body-secondary">
  <div class="container py-lg-5">
    <div class="row row-cols-3 g-3 g-lg-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
        <img src="<?= info()['logo'] ?>" class="w-100" alt="" />
        <div class="my-3 font-condensed" style="text-align: justify;" >
          <small><?= info()['description'] ?></small>
        </div>
        <div class="mt-3">
          <p class="py-0 my-0">
            <i class="fas fa-phone" style="width: 1.5rem;" ></i>
            <span><?= info()['phone'] ?></span>
          </p>
          <p class="py-0 my-0">
            <i class="fas fa-envelope" style="width: 1.5rem;" ></i>
            <span><?= info()['email'] ?></span>
          </p>
          <p class="py-0 my-0">
            <i class="fas fa-location-dot" style="width: 1.5rem;" ></i>
            <span><?= info()['address'] ?></span>
          </p>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
        <div class="row g-3 g-lg-5">
          <div class="col">
            <h5 class="text-center border-bottom border-3 border-primary pt-0 pb-2 mt-0">Informations</h5>
            <ul class="navbar-nav text-center">
              <a href="javascript:void(0)" class="nav-link py-1" >About Us</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Disclaimer</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Blog Page</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Terms & Conditions</a>
              <a href="javascript:void(0)" class="nav-link py-1" >F.A.Q.</a>
            </ul>
          </div>
          <div class="col">
            <h5 class="text-center border-bottom border-3 border-primary pt-0 pb-2 mt-0">Useful Links</h5>
            <ul class="navbar-nav text-center">
              <a href="javascript:void(0)" class="nav-link py-1" >Your Account</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Track your order</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Shipping Rates</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Become an affiliate</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Help Center</a>
            </ul>
          </div>
          <div class="col">
            <h5 class="text-center border-bottom border-3 border-primary pt-0 pb-2 mt-0">Our Policies</h5>
            <ul class="navbar-nav text-center">
              <a href="javascript:void(0)" class="nav-link py-1" >Privacy Policy</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Security Policy</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Shipping Policy</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Return Policy</a>
              <a href="javascript:void(0)" class="nav-link py-1" >Refund Policy</a>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
        <h5 class="text-center border-bottom border-3 border-primary pt-0 pb-2 mt-0 mb-4">Newsletter</h5>
        <form action="" method="post">
          <div class="row g-3 g-lg-4">
            <div class="input-group">
              <input type="text" name="" class="form-control" id="" placeholder="Full Name" />
            </div>
            <div class="input-group">
              <input type="text" name="" class="form-control" id="" placeholder="Email Address" />
            </div>
            <div class="form-check d-flex justify-content-center">
              <input type="checkbox" class="form-check-input" id="notification" value="" />
              <label class="form-check-label ms-2" for="notification">Notify me when update</label>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">
                <strong>Subscribe</strong>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>