<nav class="navbar navbar-expand-lg bg-primary-subtle pt-4">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?= info()['logo'] ?>" style="width: 200px;" alt="logo" />
    </a>
    <form class="d-none d-lg-flex ms-auto col-lg-7" role="search">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
          <button type="submit" class="btn btn-primary" >
            <i class="fas fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
      <ul class="navbar-nav flex-row ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="btn btn-outline-primary ps-4 pe-4" aria-current="page" href="#">
            <i class="fas fa-heart"></i>
            <span class="ps-sm-2">0</span>
          </a>
        </li>
        <li class="nav-item d-lg-none ms-2">
          <a class="btn btn-outline-primary ps-4 pe-4" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#yourCart" aria-controls="yourCart" >
            <i class="fas fa-shopping-cart"></i>
            <span class="ps-sm-2">0</span>
          </a>
        </li>
      </ul>
  </div>
</nav>
<aside class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="yourCart" aria-labelledby="yourCartLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="yourCartLabel">Your Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <table class="table">
      <thead>
        <tr>
          <th>Thumbnail</th>
          <th>Product Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <img src="https://via.placeholder.com/80x80" alt="" />
          </td>
          <td>
            <h6 class="py-0 my-0">HP Elitebook 8440p</h6>
            <p class="py-1 my-1">Laptop</p>
            <p class="py-0 my-0">25,000.00</p>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="row g-3 position-absolute w-100 bottom-0 pe-3 pb-3"  >
      <div class="col d-grid">
        <a href="cart.php" class="btn btn-primary ps-3 pe-3">
          <i class="fas fa-eye"></i>
          <strong class="ps-2">View Cart</strong>
        </a>
      </div>
      <div class="col d-grid">
        <a href="checkout.php" class="btn btn-primary ps-3 pe-3">
          <i class="fas fa-cart-shopping"></i>
          <strong class="ps-2">Checkout</strong>
        </a>
      </div>
    </div>
  </div>
</aside>