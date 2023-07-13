<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;
use App\Class\Category;
use Carbon\Carbon;

<<<<<<< HEAD
// Auth::initialize();

// if (!isset($_SESSION['login'])) {
//   if (!Auth::check() || !Auth::isAdmin()) {
//     header("Location: ../login.php");
//     exit();
//   }
// }
=======
Auth::initialize();

if (!isset($_SESSION['login'])) {
  if (!Auth::check() || !Auth::isAdmin()) {
    header("Location: ../login.php");
    exit();
  }
}
>>>>>>> 2b59195ad61800ccdb78cfc6be7f06e03605a476

$db = new Database();
$categories = new Category($db->conn);

$pageName = "Manage Categories";
$pageGroup = "Category & Product";
$currentPage = "Category";

require __DIR__ . '/../../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/primary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5">
      <a href="create.php" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span class="ps-1">Add New</span>
      </a>
    </section>
    <section class="container-fluid my-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-tab-pane" type="button" role="tab" aria-controls="admin-tab-pane" aria-selected="false">Administrators</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="seller-tab" data-bs-toggle="tab" data-bs-target="#seller-tab-pane" type="button" role="tab" aria-controls="seller-tab-pane" aria-selected="false">Merchants</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="buyer-tab" data-bs-toggle="tab" data-bs-target="#buyer-tab-pane" type="button" role="tab" aria-controls="buyer-tab-pane" aria-selected="false">Customers</button>
        </li>
      </ul>
    </section>
    <section class="container-fluid tab-content my-5" id="myTabContent">
      <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Category Title</th>
                  <th scope="col">Parent Category</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $catList = $categories->index();
                foreach ($catList as $k => $category) {
                  $statusLabel = "";
                  $statusClass = "";
                  $parentTitle = Category::parent($category['parent_id'], $db);
                  $parent = $parentTitle !== false ? $parentTitle : "No Parent";
                  if ($category['cat_status'] == 1) {
                    $statusLabel = "Active";
                    $statusClass = "bg-success";
                  } elseif ($category['cat_status'] == 0) {
                    $statusLabel = "Deactive";
                    $statusClass = "bg-danger";
                  } else {
                  $statusLabel = "Pending";
                  $statusClass = "bg-secondary";
                } ?>
                <tr>
                  <th scope="row"><?= $k+1 ?></th>
                  <td><?= $category['cat_title'] ?></td>
                  <td><?= $parent ?></td>
                  <td><?= $category['cat_slug'] ?></td>
                  <td>
                    <span class="badge <?= $statusClass ?>"><?= $statusLabel ?></span>
                  </td>
                  <td><?= Carbon::parse($category['created_at'])->diffForHumans() ?></td>
                  <td>
                    <a href="edit.php?id=<?= $category['cat_id'] ?>" class="btn btn-info btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="deleteCat(<?= $category['cat_id'] ?>)" >
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="coupon-tab-pane" role="tabpanel" aria-labelledby="coupon-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
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
      <div class="tab-pane fade" id="voucher-tab-pane" role="tabpanel" aria-labelledby="voucher-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
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
  </main>
  <script>
    function deleteCat(catId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '<?= config("app.root")?>src/actions/category/delete.php',
            type: 'POST',
            data: { id: catId },
            success: function(response) {
              console.log(response);
              Swal.fire({
                title: 'Deleted!',
                text: 'Category has been deleted',
                icon: 'success'
              }).then(() => {
                location.reload();
              });
            },
            error: function() {
              Swal.fire({
                title: 'Error',
                text: 'An error occurred while deleting the category.',
                icon: 'error'
              });
            }
          });
        }
      });
    }
  </script>
</body>
</html>