<?php $root = config("app.root") ?>
<aside id="sidebar" class="customer-sidebar" >
  <button id="toggleSidebar" >
    <i class="fas fa-bars" style="width: 1.5rem; height: 1.5rem; font-size: 1.5rem; color: white;"></i>
    <span>Customer Panel</span>
  </button>
  <nav class="nav-sidebar" >
    <ul class="font-ubuntu" >
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>dashboard.php" class="sidebar-link" >
          <i class="fas fa-tachometer-alt" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Dashboard</span>
        </a>
      </li>
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>notification.php" class="sidebar-link" >
          <i class="fas fa-bell" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Notifications</span>
        </a>
      </li>
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>messages.php" class="sidebar-link" >
          <i class="fas fa-envelope" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Messages</span>
        </a>
      </li>
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>my-order.php" class="sidebar-link" >
          <i class="fas fa-shopping-cart" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >My Orders</span>
        </a>
      </li>
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>my-wishlist.php" class="sidebar-link" >
          <i class="fas fa-heart" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >My Wishlist</span>
        </a>
      </li>
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>feedback.php" class="sidebar-link" >
          <i class="fas fa-comments" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Feedback</span>
        </a>
      </li>
      <hr class="border border-2 border-top border-white py-0 ms-3 me-3 my-0">
      <li class="sidebar-item" >
        <a href="<?= $root ?>settings.php" class="sidebar-link" >
          <i class="fas fa-cog" style="width: 1.5rem;" ></i>
          <span class="sidebar-link-span" >Settings</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>