<?php //$root = "/quickbuy/admin/"; ?>
<?php $root = config("app.admin"); ?>
<aside id="sidebar" class="admin-sidebar" >
  <button id="toggleSidebar" >
    <i class="fas fa-bars" style="width: 1.5rem; height: 1.5rem; font-size: 1.5rem; color: white;"></i>
    <span>Admin Panel</span>
  </button>
  <nav class="nav-sidebar">
    <ul>
      <li>
        <a href="<?= $root ?>dashboard.php" class="active">
          <i class="fas fa-tachometer-alt" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Dashboard</span>
        </a>
      </li>
      <li>
        <span>Miscellaneous</span>
      </li>
      <li>
        <a href="<?= $root ?>notifications/index.php">
          <i class="fas fa-bell" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Notification</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>messages/index.php">
          <i class="fas fa-envelope" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Messages</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>uploads.php">
          <i class="fas fa-upload" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Uploads</span>
        </a>
      </li>
      <li>
        <span>Blog Management</span>
      </li>
      <li>
        <a href="<?= $root ?>posts/index.php">
          <i class="fas fa-thumbtack" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Blog Post</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fas fa-tag" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Post Category</span>
        </a>
      </li>
      <li>
        <span>Retail Management</span>
      </li>
      <li>
        <a href="<?= $root ?>promos/index.php">
          <i class="fas fa-ticket" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Coupons</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>category/index.php">
          <i class="fas fa-tag" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Categories</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>products/index.php">
          <i class="fas fa-cubes" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Products</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>orders/index.php">
          <i class="fas fa-store" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Orders</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>stores/index.php">
          <i class="fas fa-store" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Stores</span>
        </a>
      </li>
      <li>
        <span>Users & Members</span>
      </li>
      <li >
        <a href="<?= $root ?>users/index.php">
          <i class="fas fa-users" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Manage Users</span>
        </a>
      </li>
      <li >
        <a href="<?= $root ?>users/index.php">
          <i class="fas fa-users" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Manage Users</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>roles/index.php">
          <i class="fas fa-user-cog" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >User Settings</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fas fa-cog" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Settings</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>