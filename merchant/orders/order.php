<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "order-view";
$pageGroup = "order-view";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "order-view";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";
?>
<body>
<?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <section class="m-3">
      <div class="">
        <div class="clearfix hidden">
          <ul class="list-unstyled row">
            <li class="col-4 text-decoration-none">
              <form action="">
                <select class="form-select focus-ring focus-dark" placeholder="Example placeholder" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)">
                  <option value="1" disabled selected hidden class=" dropdown-toggle" class="">Status<span class="caret mobile-hide"></span></option>
                  <option value="2">Paid</option>
                  <option value="2">Complete</option>
                  <option value="2">Open</option>
                  <option value="3">Failed</option>
                  <option value="4">Declined</option>
                  <option value="5">Backordered</option>
                  <option value="5">Canceled</option>
                  <option value="5">Awaiting call</option>
                  <option value="5">Incomplete</option>
                </select>
              </form>
            </li>
          </ul>
        </div>

        <div class="">
          <table width="100%" class="table table-middle table-responsive">
            <thead data-ca-bulkedit-default-object="true" data-ca-bulkedit-component="defaultObject" class="">
              <tr class="text-decoration-none m-3">
                <th width="15%">
                  <a class="text-decoration-none text-dark">ID</a>
                </th>
                <th width="15%">
                  <a class="text-decoration-none text-dark">Status</a>
                </th>
                <th width="15%">
                  <a class="text-decoration-none text-dark">Date</a>
                </th>
                <th width="17%">
                  <a class="text-decoration-none text-dark">Customer</a>
                </th>
                <th width="14%">
                  <a class="text-decoration-none text-dark">Phone</a>
                </th>
                <th class="mobile-hide">Total</th>
                <th width="10%" class="">
                  <a class="text-decoration-none text-dark" data-ca-target-id="pagination_contents">View</a>
                </th>
              </tr>
            </thead>

            <tbody>


              <tr class="" data-ca-longtap-action="setCheckBox" data-ca-id="32" id="">
                <td width="15%" data-th="ID">
                  <a href="#!" class="underlined text-dark fw-bold">Order #31</a>

                </td>
                <td width="15%" data-th="Status">

                  <div class="dropdown">
                    <a href="#" id="" class="btn btn-sm btn-info  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Complete <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="#!">Paid</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Complete</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Open</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Failed</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Declined</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Backordered</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Canceled</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Awaiting call</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">Incomplete</a>
                      </li>
                    </ul>
                    <!-- Inline script moved to the bottom of the page -->
                  </div>
                </td>
                <td width="15%" class="" data-th="Date">06/04/2023, 20:03</td>
                <td width="17%" data-th="Customer">
                  <a class="text-decoration-none text-dark" href="mailto:shop4pjl%40example.com">@</a>Eslie Pam
                </td>
                <td width="14%" data-th="Phone"><bdi><a class=" text-dark" href="tel:+1(800)777-7777">+1(800)777-7777</a></bdi></td>
                <td width="10%" class="right" data-th="Total">
                    <span class="">$</span><span class="">99.99</span>
                </td>
                <td class="center" data-th="Tools">
                  <div class="hidden-tools">
                    <div class="">
                      <a href="order_view.php" class="btn btn-sm border-1 border-dark"><i class=" fa-solid fa-eye"></i></a>
                    </div>
                  </div>
                </td>
                
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</body>

</html>