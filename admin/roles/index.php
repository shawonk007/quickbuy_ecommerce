<?php
require __DIR__ . '../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
use App\Class\Roles;
use Carbon\Carbon;
$db = new Database();
$roles = new Roles($db->conn);
$pageName = "Manage Roles";
$pageGroup = "Users Settings";
$currentGroup = ["Roles", "roles/index.php"];
$currentPage = "Index";
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
      <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRole"> -->
      <a href="create.php" class="btn btn-primary" >
        <i class="fas fa-plus"></i>
        <span class="ps-1">Add New</span>
      </a>
    </section>
    <section class="container-fluid my-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="enable-tab" data-bs-toggle="tab" data-bs-target="#enable-tab-pane" type="button" role="tab" aria-controls="enable-tab-pane" aria-selected="false">Enable</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="disable-tab" data-bs-toggle="tab" data-bs-target="#disable-tab-pane" type="button" role="tab" aria-controls="disable-tab-pane" aria-selected="false">Disable</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="draft-tab" data-bs-toggle="tab" data-bs-target="#draft-tab-pane" type="button" role="tab" aria-controls="draft-tab-pane" aria-selected="false">Drafts</button>
        </li>
      </ul>
    </section>
    <section class="container-fluid tab-content my-5" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body">
            <!-- <h4>All Promo Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Title of Roles</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $roleList = $roles->index();
                  if (empty($roleList)) { ?>
                    <tr>
                      <td class="text-center" colspan="6"><?= "No Data Available" ?></td>
                    </tr>
                  <?php } else {
                  foreach ($roleList as $k => $role) { 
                    $statusLabel = "";
                    $statusClass = "";
                    if ($role['role_status'] == 1) {
                      $statusLabel = "Active";
                      $statusClass = "bg-success";
                    } elseif ($role['role_status'] == 0) {
                      $statusLabel = "Deactive";
                      $statusClass = "bg-danger";
                    } else {
                      $statusLabel = "Pending";
                      $statusClass = "bg-secondary";
                    }
                  ?>
                  <tr>
                    <th scope="row"><?= $k+1 ?></th>
                    <td><?= $role['role_title'] ?></td>
                    <td><?= $role['role_slug'] ?></td>
                    <td>
                      <span class="badge bg-success"><?= $statusLabel ?></span>
                    </td>
                    <td><?= Carbon::parse($role['created_at'])->diffForHumans(); ?></td>
                    <td>
                      <form action="<?= config("app.root") ?>src/actions/roles/delete.php" method="post" id="deleteRole">
                        <input type="hidden" name="id" value="<?= $role['role_id'] ?>">
                        <a href="edit.php?id=<?= $role['role_id'] ?>" class="btn btn-outline-info btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>
                        <!-- <button type="button" class="btn btn-outline-success btn-sm view-role" data-bs-toggle="modal" data-bs-target="#viewRole" data-role-id="<?= $role['role_id'] ?>" >
                          <i class="fas fa-eye"></i>
                        </button> -->
                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="deleteRole(<?= $role['role_id'] ?>)" >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php } } ?>
              </tbody>
            </table>
            <div class="row mt-5">
              <div class="col">
                <caption><span class="text-secondary" >Showing Results <?= count($roleList) ?></span></caption>
              </div>
              <div class="col d-flex justify-content-end">
              <?php include __DIR__ . '/../../components/navigation/pagination.php' ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="enable-tab-pane" role="tabpanel" aria-labelledby="enable-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body">
            <!-- <h4>Coupon Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Promo Title</th>
                  <th scope="col">Promo Code</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="disable-tab-pane" role="tabpanel" aria-labelledby="disable-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body">
            <!-- <h4>Voucher Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Promo Title</th>
                  <th scope="col">Promo Code</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="draft-tab-pane" role="tabpanel" aria-labelledby="draft-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body">
            <!-- <h4>Voucher Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Promo Title</th>
                  <th scope="col">Promo Code</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
    <section class="modal fade" id="viewRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewRoleLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $role = $roles->show($id); ?>
            
            <div class="modal-header py-2">
              <h1 class="modal-title fs-5" id="viewRoleLabel"><?= $role['role_title'] ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="roleDetails"></div>
            </div>
            <div class="modal-footer py-1">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <strong class="ps-2">Create New</strong>
              </button>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main>
  <script>
    function deleteRole(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      })
      .then((confirmed) => {
        if (confirmed) {
          $.ajax({
            url: "<?= config("app.root") ?>src/actions/roles/delete.php", // Replace with your deletion endpoint
            type: "POST",
            data: { id: id},
            dataType: 'json',
            success: function(response) {
              if (response === "success") {
                Swal.fire({
                  title: "Deleted!",
                  text: "The role has been deleted.",
                  icon: "success",
                }).then(() => {
                  // Refresh the page to update the role list
                  location.reload();
                });
              } else {
                // If deletion fails
                Swal.fire({
                  title: "Error!",
                  text: "Failed to delete the role. Please try again.",
                  icon: "error",
                });
              }
            },
            error: function() {
              Swal.fire({
                title: "Error!",
                text: "An error occurred while deleting the role. Please try again.",
                icon: "error",
              });
            }
          });
        }
      });
    }
  </script>
</body>
</html>