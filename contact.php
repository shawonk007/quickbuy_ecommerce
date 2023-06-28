<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Contact";
require __DIR__ . '/components/header.php';

?>
<body>
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-5 my-5">
      <div class="container">
        <div class="card contact-card shadow">
          <div class="card-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d542.5423184749977!2d90.37308427883083!3d23.82659422776662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1ed3a392237%3A0x918805f8f0d05823!2sEidGaon%20Maath%20D%20Block!5e0!3m2!1sen!2sbd!4v1678946158395!5m2!1sen!2sbd" class="w-100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="card contact-card shadow mt-3">
          <div class="card-body py-4">
            <div class="row g-3">
              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 d-flex align-items-center justify-content-center">
                <div class="contact-card-info">
                  <i class="fas fa-location-dot contact-card-icon"></i>
                  <h6 class="mt-2">
                    <span>Pallabi, Mirpur, Dhaka-1216</span>
                  </h6>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 d-flex align-items-center justify-content-center">
                <div class="contact-card-info">
                  <i class="fas fa-phone contact-card-icon"></i>
                  <h6 class="mt-2">
                    <a href="tel:+8801234567890" class="nav-link" >+88 (012) 34-567890</a>
                  </h6>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 d-flex align-items-center justify-content-center">
                <div class="contact-card-info">
                  <i class="fas fa-envelope contact-card-icon"></i>
                  <h6 class="mt-2">
                    <a href="mailto:info@example.com" class="nav-link" >info@example.com</a>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 my-5">
      <div class="container">
          <div class="card shadow">
            <div class="card-body">
              <form action="" method="post">
                <div class="row g-lg-5">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 ps-lg-5">
                    <div class="row my-3">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="fName">First Name</label>
                          <div class="input-group mt-2">
                            <input type="text" name="" class="form-control" id="fName" placeholder="John" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="lName">Last Name</label>
                          <div class="input-group mt-2">
                            <input type="text" name="" class="form-control" id="lName" placeholder="Doe" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group my-3">
                      <label for="email">Email Address</label>
                      <div class="input-group mt-2">
                        <input type="email" name="" class="form-control" id="email" placeholder="someone@example.com" required />
                      </div>
                    </div>
                    <div class="form-group my-3">
                      <label for="phone">Cell Phone</label>
                      <div class="input-group mt-2">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+88 (0XX) XX-XXXXXX" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" oninput="formatPhoneNumber()" maxlength="19" />
                      </div>
                    </div>
                    <div class="form-group my-3">
                      <label for="topic">Subject</label>
                      <div class="input-group mt-2">
                        <input type="text" name="" class="form-control" id="topic" placeholder="What do you wanna know?" />
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 pe-lg-5">
                    <div class="form-group my-3">
                      <label for="message">Message</label>
                      <div class="input-group mt-2">
                        <textarea name="" class="form-control" id="message" cols="30" rows="9" placeholder="Type your message here ..." required ></textarea>
                      </div>
                    </div>
                    <div class="btn-group d-grid mt-4">
                      <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-envelope"></i>
                        <span class="ps-2">Send Message</span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
</body>
</html>