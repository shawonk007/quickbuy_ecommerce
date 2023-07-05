<?php $root = config("app.root") ?>
<aside id="sidebar" class="customer-sidebar" >
  <button id="toggleSidebar" >
        <i class="fas fa-bars" style="width: 1.5rem; height: 1.5rem; font-size: 1.5rem; color: white;"></i>
        <span>Customer Panel</span>
  </button>
  <nav class="nav-sidebar">
    <ul>
      <li >
        <a href="javascript:void(0)" class="active">
          <i class="fas fa-tachometer-alt"></i>
          <span class="sidebar-link-span" >Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>edit-profile.php">
          <i class="fas fa-user-edit"></i>
          <span class="sidebar-link-span" >Edit Profile</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>notification.php">
          <i class="fas fa-bell"></i>
          <span class="sidebar-link-span" >Notifications</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>messages.php">
          <i class="fas fa-envelope"></i>
          <span class="sidebar-link-span" >Messages</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>my-order.php">
          <i class="fas fa-shopping-cart"></i>
          <span class="sidebar-link-span" >My Orders</span>
        </a>
      </li>
      <li>
        <a href="<?= $root ?>my-wishlist.php">
          <i class="fas fa-heart"></i>
          <span class="sidebar-link-span" >My Wishlist</span>
        </a>
      </li>
      <li >
        <a href="<?= $root ?>feedback.php">
          <i class="fas fa-comments"></i>
          <span class="sidebar-link-span" >Feedback</span>
        </a>
      </li>
      <li >
        <a href="javascript:void(0)">
          <i class="fas fa-cog"></i>
          <span class="sidebar-link-span" >Settings</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>