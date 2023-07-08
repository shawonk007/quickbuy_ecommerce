<?php //$root = "/quickbuy/admin/"; ?>
<?php $root = config("app.admin"); ?>
<aside id="sidebar" class="admin-sidebar" >
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
        <a href="<?= $root ?>notifications/index.php" class="sidebar-link">
          <i class="fas fa-bell" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Notification</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>messages/index.php" class="sidebar-link">
          <i class="fas fa-envelope" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Messages</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>uploads.php" class="sidebar-link">
          <i class="fas fa-upload" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Uploads</span>
        </a>
      </li>
      <li>
        <span>Blog Management</span>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>posts/index.php" class="sidebar-link">
          <i class="fas fa-thumbtack" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Blog Post</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="#" class="sidebar-link">
          <i class="fas fa-tag" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Post Category</span>
        </a>
      </li>
      <li>
        <span>Retail Management</span>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>brands/index.php" class="sidebar-link">
          <i class="fas fa-industry" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Brands</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>promos/index.php" class="sidebar-link">
          <i class="fas fa-ticket" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Coupons</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>category/index.php" class="sidebar-link">
          <i class="fas fa-tag" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Categories</span>
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
        <a href="<?= $root ?>stores/index.php" class="sidebar-link">
          <i class="fas fa-store" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Stores</span>
        </a>
      </li>
      <li>
        <span>Users & Members</span>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>users/index.php" class="sidebar-link">
          <i class="fas fa-users" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Manage Users</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="<?= $root ?>roles/index.php" class="sidebar-link">
          <i class="fas fa-user-cog" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >User Settings</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="#" class="sidebar-link">
          <i class="fas fa-cog" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Settings</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>