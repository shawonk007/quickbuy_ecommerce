<?php
$pageName = "Messages";
$pageGroup = "User Profile";
$currentPage = "Messages";
require __DIR__ . '/components/header/primary.php';
require __DIR__ . '/vendor/autoload.php';
?>

<body>
<?php require __DIR__ . "/components/sidebar/customer.php" ?>
    <main id="content">
        <!-- BREADCRUM -->
        <?php require_once "./includes/breadcrum.php" ?>
        <!-- YOUR CONTENT STARTS FROM HERE -->
        <section class="my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>User name</th>
                        <th>Desciption</th>
                        <th>Time</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>