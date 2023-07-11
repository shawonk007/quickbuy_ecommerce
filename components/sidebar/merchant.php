<?php //$root = "/quickbuy/admin/"; ?>
<?php $root = config("app.merchant"); ?>
<aside id="sidebar" class="vendor-sidebar" >
  <button id="toggleSidebar" >
    <i class="fas fa-bars" style="width: 1.5rem; height: 1.5rem; font-size: 1.5rem; color: white;"></i>
    <span>Admin Panel</span>
  </button>
  <nav class="nav-sidebar" >
    <ul class="font-ubuntu" >
      <li class="sidebar-item" >
        <a href="<?= $root ?>dashboard.php" class="sidebar-link">
          <i class="fas fa-tachometer-alt" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Dashboard</span>
        </a>
      </li>
      <li>
        <span>Miscellaneous</span>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>posts/index.php" class="sidebar-link">
          <i class="fas fa-thumbtack" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Blog Post</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="javascript:void(0)" class="sidebar-link">
          <i class="fas fa-bell" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Notification</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="javascript:void(0)" class="sidebar-link">
          <i class="fas fa-envelope" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Messages</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="javascript:void(0)" class="sidebar-link">
          <i class="fas fa-upload" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Uploads</span>
        </a>
      </li>
      <li>
        <span>Retail Management</span>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>merchant.php" class="sidebar-link">
          <i class="fas fa-store" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >My Store</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>promos/index.php" class="sidebar-link">
          <i class="fas fa-ticket" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Coupons</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>products/index.php" class="sidebar-link">
          <i class="fas fa-cubes" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Products</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>orders/index.php" class="sidebar-link">
          <i class="fas fa-shopping-cart" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Orders</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="javascript:void(0)" class="sidebar-link">
          <i class="fas fa-cog" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Settings</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>