<?php $root = config("app.root") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Code Crafters" />
  <meta name="description" content="Discover a world of convenience and endless possibilities at QuickBuy, your ultimate destination for online shopping. With a wide selection of products from trusted vendors, we bring together the best of fashion, electronics, home goods, and more, all in one convenient platform. Enjoy seamless browsing, quick transactions, and secure purchases, as you explore a marketplace tailored to meet your every need. Experience the joy of effortless shopping with QuickBuy, where quality, variety, and convenience converge.">
  <meta name="keywords" content="html, css, javascript, js, sass, scss, bootstrap, tailwind, jquery, ajax, php, oop, ecom, ecommerce" />
  <!-- Web Page Title -->
  <title><?= $pageName ?> | QuickBuy - "Discover, Explore, Shop!"</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $root ?>assets/images/favicon.svg" type="image/x-icon" />
  <!-- Font Awesome (v6.4.0) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/font-awesome-6.4.0/css/all.min.css" />
  <!-- Bootstap (v5.3.0) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/bootstrap-v5.3.0/css/bootstrap.min.css" />
  <!-- Owl-Carousel (v2.3.4) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/owl-carousel-v2.3.4/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?= $root ?>plugins/owl-carousel-v2.3.4/css/owl.theme.default.min.css" />
  <!-- Chart.js (v4.3.0) -->
  <!-- <link rel="stylesheet" href="<?= $root ?>plugins/chart.js-v4.3.0/charts.min.css" /> -->
  <!-- Select2 Bootstrap 5 Theme (v1.3.0) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/select2-bootstrap-5-theme-1.3.0/css/select2.min.css" />
  <link rel="stylesheet" href="<?= $root ?>plugins/select2-bootstrap-5-theme-1.3.0/css/select2-bootstrap-5-theme.min.css" />
  <!-- DataTable (v1.13.4) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/datatables-1.13.4/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="<?= $root ?>plugins/datatables-responsive-2.4.1/css/responsive.bootstrap5.min.css" />
  <link rel="stylesheet" href="<?= $root ?>plugins/datatables-buttons-2.3.6/css/buttons.bootstrap5.min.css" />
  <!-- Summernote (v0.8.20) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/summernote-0.8.20/summernote-lite.min.css" />
  <!-- Perfect Scrollbar (v1.5.0) -->
  <link rel="stylesheet" href="<?= $root ?>plugins/perfect-scrollbar-v1.5.0/css/perfect-scrollbar.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= $root ?>assets/scss/styles.css" />
  <!-- jQuery (v3.7.0) -->
  <script src="<?= $root ?>plugins/jquery/jquery-3.7.0.min.js"></script>
  <!-- Font Awesome (v6.4.0) -->
  <script src="<?= $root ?>plugins/font-awesome-6.4.0/js/all.min.js"></script>
  <!-- Bootstap (v5.3.0) -->
  <script src="<?= $root ?>plugins/bootstrap-v5.3.0/js/bootstrap.bundle.min.js"></script>
  <!-- Owl-Carousel (v2.3.4) -->
  <script src="<?= $root ?>plugins/owl-carousel-v2.3.4/js/owl.carousel.min.js"></script>
  <!-- Chart.js (v4.3.0) -->
  <!-- <script src="<?= $root ?>plugins/chart.js-v4.3.0/chart.min.js"></script> -->
  <!-- Select2 Bootstrap 5 Theme (v1.3.0) -->
  <script src="<?= $root ?>plugins/select2-bootstrap-5-theme-1.3.0/js/select2.min.js"></script>
  <!-- DataTable (v1.13.4) -->
  <script src="<?= $root ?>plugins/datatables-1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-responsive-2.4.1/js/dataTables.responsive.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-responsive-2.4.1/js/responsive.bootstrap5.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-buttons-2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-buttons-2.3.6/js/buttons.bootstrap5.min.js"></script>
  <script src="<?= $root ?>plugins/jszip-2.5.0/jszip.min.js"></script>
  <script src="<?= $root ?>plugins/pdfmake-0.2.7/pdfmake.min.js"></script>
  <script src="<?= $root ?>plugins/pdfmake-0.2.7/vfs_fonts.js"></script>
  <script src="<?= $root ?>plugins/datatables-buttons-2.3.6/js/buttons.html5.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-buttons-2.3.6/js/buttons.print.min.js"></script>
  <script src="<?= $root ?>plugins/datatables-buttons-2.3.6/js/buttons.colVis.min.js"></script>
  <!-- Sweetalart2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Summernote (v0.8.20) -->
  <script src="<?= $root ?>plugins/summernote-0.8.20/summernote-lite.min.js"></script>
  <!-- Perfect Scrollbar (v1.5.0) -->
  <script src="<?= $root ?>plugins/perfect-scrollbar-v1.5.0/js/perfect-scrollbar.min.js"></script>
  <!-- Custom JS -->
  <script src="<?= $root ?>assets/js/scripts.js"></script>
  <!-- Google Fonts : -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- Google Fonts : Ubuntu -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
  <!-- Google Fonts : Ubuntu Monospace -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
  <!-- Google Fonts : Ubuntu Condensed -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet" />
</head>