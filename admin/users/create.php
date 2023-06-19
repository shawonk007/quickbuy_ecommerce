<?php
require __DIR__ . '../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "Add New User";
$pageGroup = "Users & Members";
$currentGroup = ["Users", "users/index.php"];
$currentPage = "Create";
require __DIR__ . '/../../components/header/tertiary.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row row-cols-3 row-cols-lg-5 g-3 g-lg-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-primary pb-0">
                <h5 class="card-title text-light">Create New User</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-3 h-100">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                          <span>(MIN. RESOLUTION 700X700)</span>
                        </p>
                      </div>
                      <input type="file" name="file" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                </div>
                <hr>
                <div class="input-group input-group-sm my-3">
                  <input type="text" name="" class="form-control" id="" placeholder="First Name" />
                  <input type="text" name="" class="form-control" id="" placeholder="Last Name" />
                </div>
                <div class="row g-3">
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Username" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="date" name="" class="form-control" id="" placeholder="" />
                    </div>
                  </div>
                </div>
                <hr>
                <div class="input-group input-group-sm my-3">
                  <input type="email" name="" class="form-control" id="" placeholder="someone@example.com" />
                </div>
                <div class="input-group input-group-sm my-3">
                  <input type="email" name="" class="form-control" id="" placeholder="someone@example.com" />
                </div>
                <hr>
                <div class="row g-3">
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <input type="tel" name="" class="form-control" id="" placeholder="+88 (01X) XX-XXXXXX" />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <input type="tel" name="" class="form-control" id="" placeholder="+88 (01X) XX-XXXXXX" />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <input type="password" name="" class="form-control" id="" placeholder="Password" />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <input type="password" name="" class="form-control" id="" placeholder="Confirm Password" />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Role --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Status --</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="index.php" class="btn btn-secondary btn-sm rounded-pill py-2">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Previous</span>
                    </a>
                  </div>
                  <div class="col d-grid">
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill py-2">
                      <i class="fas fa-plus"></i>
                      <span class="ps-1">Create New</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-body">
                <!-- <div id="formattingBttons">
                  <button onclick="formatText('bold')" class="btn btn-light"><i class="fas fa-bold"></i></button>
                  <button onclick="formatText('italic')" class="btn btn-light"><i class="fas fa-italic"></i></button>
                  <button onclick="formatText('underline')" class="btn btn-light"><i class="fas fa-underline"></i></button>
                  <button onclick="alignText('left')" class="btn btn-light"><i class="fas fa-align-left"></i></button>
                  <button onclick="alignText('center')" class="btn btn-light"><i class="fas fa-align-center"></i></button>
                  <button onclick="alignText('right')" class="btn btn-light"><i class="fas fa-align-right"></i></button>
                </div> -->
                <div class="input-group input-group-sm mb-3">
                  <textarea name="" class="form-control" id="" cols="30" rows="20" placeholder="Type your details here ..."></textarea>
                </div>
                <hr>
                <div class="input-group input-group-sm my-3">
                  <textarea name="" class="form-control" id="" cols="30" rows="4" placeholder="Type your address here ..."></textarea>
                </div>
                <div class="row g-3">
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Division --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose District --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Postal Code" />
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Gender --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Religion --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Marital Status --</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
</body>
</html>