<?php
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'lang/FR_fr.php';
include_once 'model/customers.php';
include_once 'model/credit.php';
include_once 'controlleur/indexControlleur.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="assets/CSS/style.css" rel="stylesheet" type="text/css"/>
        <title><?= PART_ONE ?></title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <div class="container">

            <div class="table-responsive-lg table-responsive-xl table-responsive-md table-responsive-sm">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col"><?= LAST_NAME ?></th>
                            <th scope="col"><?= FIRST_NAME ?></th>
                            <th scope="col"><?= VIEW_PROFIL ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getCustomer as $getCustomers) { ?>
                            <tr class="table-info">
                                <th scope="row"><?= $getCustomers->lastName ?></th>
                                <td ><?= $getCustomers->firstName ?></td>
                                <td >
                                    <form method="post" action="detailCustomer.php">
                                        <button type="submit" name="viewProfil" value="<?= $getCustomers->id ?>" class="btn btn-secondary"><?= VIEW_PROFIL ?></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>