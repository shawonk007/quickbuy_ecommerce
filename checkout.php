<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Checkout";
require __DIR__ . '/components/header.php';

?>
<body class="bg-transparent">
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-5 my-5">
      <div class="container">
        <form action="">
          <div class="row row-cols-3 g-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-2">
              <div class="card shadow">
                <div class="card-header pb-0">
                  <h4 class="card-title">Checkout Form</h4>
                </div>
                <div class="card-body">
                  <h4 class="border-bottom pb-1 mb-3">Billing Information</h4>
                  <div class="col-12" style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 1rem;">
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroup-sizing-sm">
                        <i class="fas fa-user"></i>
                      </span>
                      <input type="text" class="form-control" id="name1" placeholder="First Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required />
                      <input type="text" class="form-control" id="name1" placeholder="Last Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required />
                    </div>
                    <div class="row g-3">
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroup-sizing-sm">
                            <i class="fas fa-envelope"></i>
                          </span>
                          <input type="email" class="form-control" id="email1" placeholder="someone@example.com" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required />
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroup-sizing-sm">
                            <i class="fas fa-phone"></i>
                          </span>
                          <input type="tel" name="phone" class="form-control" id="" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                        </div>
                      </div>
                    </div>
                    <div class="input-group">
                      <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>
                    <div class="row g-3">
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <select class="form-control  d-block w-100" id="division1" required >
                          <option value="">-- Choose One --</option>
                        </select>
                      </div>
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <select class="form-control  d-block w-100" id="district1" required >
                          <option value="">-- Choose One --</option>
                        </select>
                      </div>
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="input-group">
                          <input type="text" class="form-control" id="postal1" placeholder="Ex. 1216" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="5" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <h4 class="border-bottom pb-1 mb-3">Shipping Information</h4>
                  <div class="col-12" style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 1rem;">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-sm">
                          <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" id="name2" placeholder="First Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required />
                        <input type="text" class="form-control" id="name2" placeholder="Last Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required />
                    </div>
                    <div class="row g-3">
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-sm">
                              <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email2" placeholder="someone@example.com" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required />
                        </div>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-sm">
                              <i class="fas fa-phone"></i>
                            </span>
                            <input type="tel" name="phone" class="form-control" id="" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                        </div>
                      </div>
                    </div>
                    <div class="input-group ">
                      <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>
                    <div class="row g-3">
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <select class="form-control d-block w-100 my-1" id="division2" required>
                            <option value="">-- Choose One --</option>
                        </select>
                      </div>
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <select class="form-control d-block w-100 my-1" id="district2" required>
                            <option value="">-- Choose One --</option>
                        </select>
                      </div>
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="postal2" placeholder="Ex. 1216" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" maxlength="5" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5 p-2">
              <div class="card shadow">
                <div class="card-header pb-0">
                  <div class="card-title position-relative">
                    <h4 class="me-2">
                      <i class="fas fa-shopping-cart"></i>
                      <span class="ps-2">Cart Summary</span>
                    </h4>
                    <a href="cart.php" class="btn btn-secondary btn-sm position-absolute" style="top: 0; right: 0;" >
                      <i class="fas fa-edit"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table pt-0 mt-0 my-0">
                    <tbody>
                      <tr>
                        <td>
                          <strong>1 x Arzish Ajwa Dates</strong>
                        </td>
                        <td class="text-end" >BDT. 700.00/-</td>
                      </tr>
                      <tr>
                        <td>
                          <strong>1 x Nescafé Coffee Jar</strong>
                        </td>
                        <td class="text-end" >BDT. 195.00/-</td>
                      </tr>
                      <tr>
                        <td>
                          <strong>1 x Lays Potato Chips</strong>
                        </td>
                        <td class="text-end" >BDT. 60.00/-</td>
                      </tr>
                      <tr>
                        <td>
                          <strong>1 x Dove Bar (White)</strong>
                        </td>
                        <td class="text-end" >BDT. 195.00/-</td>
                      </tr>
                      <tr>
                        <td>
                          <strong>1 x Standard Horlicks</strong>
                        </td>
                        <td class="text-end" >BDT. 780.00/-</td>
                      </tr>
                      <tr>
                        <td>
                          <strong>1 x Nestlé Koko Krunch</strong>
                        </td>
                        <td class="text-end" >BDT. 450.00/-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer bg-white py-0">
                  <table class="table mb-0" >
                    <tbody>
                      <tr>
                        <td class="border-0" >
                          <strong>Grand Total</strong>
                        </td>
                        <td class="text-end border-0" >
                          <b>BDT. 2,700.00/-</b>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card shadow mt-3">
                <div class="card-header pb-0">
                  <h4 class="card-title">Payment Method</h4>
                </div>
                <div class="card-body pt-0">
                  <div class="custom-control custom-radio mt-3">
                    <input id="cashDelivery" name="paymentMethod" type="radio" class="custom-control-input" checked />
                    <label class="custom-control-label" for="cashDelivery">Cash on Delivery</label>
                  </div>
                  <div class="d-flex mt-3 mb-2">
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="creditCard" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="creditCard" title="Credit Card" >
                        <i class="far fa-credit-card pay-icon"></i>
                      </label>
                    </div>
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="debitCard" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="debitCard" title="Debit Card" >
                        <i class="fas fa-credit-card pay-icon"></i>
                      </label>
                    </div>
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="stripe" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="stripe" title="Stripe" >
                        <i class="fab fa-cc-stripe pay-icon"></i>
                      </label>
                    </div>
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="masterCard" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="masterCard" title="Mastercard" >
                        <i class="fab fa-cc-mastercard pay-icon"></i>
                      </label>
                    </div>
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="visaCard" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="visaCard" title="Visa" >
                        <i class="fab fa-cc-visa pay-icon"></i>
                      </label>
                    </div>
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="americanExpress" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="americanExpress" title="Amrecian Express" >
                        <i class="fab fa-cc-amex pay-icon"></i>
                      </label>
                    </div>
                    <div class="custom-control payment-icon custom-radio py-0 my-0">
                      <input id="payPal" name="paymentMethod" type="radio" class="custom-control-input visually-hidden" value="option-1" />
                      <label class="custom-control-label" for="payPal" title="Paypal" >
                        <i class="fab fa-cc-paypal pay-icon"></i>
                      </label>
                    </div>
                  </div>
                    
                  <div class="row row-cols-3 g-3">
                    <div class="col-6">
                      <div class="input-group  my-1">
                        <input type="text" class="form-control input-field" id="cc-name" placeholder="John Doe" disabled required />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group  my-1">
                        <input type="text" class="form-control input-field text-center" id="cc-number" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="16" disabled required />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group  my-1">
                        <input type="date" class="form-control input-field" id="cc-expiration" placeholder="" disabled required />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group  my-1">
                        <input type="text" class="form-control input-field text-center" id="cc-cvv" placeholder="XXXX" maxlength="4" disabled required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-outline-primary" >Place Your Order</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
</body>
</html>