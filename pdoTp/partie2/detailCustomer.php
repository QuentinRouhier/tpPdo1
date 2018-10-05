<?php
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'lang/FR_fr.php';
include_once 'model/customers.php';
include_once 'model/credit.php';
include_once 'controlleur/detailCustomerControlleur.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
                                <th scope="col"><?= BIRTHDATE ?></th>
                                <th scope="col"><?= ADDRESS ?></th>
                                <th scope="col"><?= POSTAL_CODE ?></th>
                                <th scope="col"><?= PHONE_NUMBER ?></th>
                                <th scope="col"><?= MARTIAL_STATUT ?></th>
                                <th scope="col"><?= ORGANISME ?></th>
                                <th scope="col"><?= AMOUNT ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getDetailCustomer as $getDetailCustomers) { ?>
                                <tr class="table-info">
                                    <th scope="row"><?= $getDetailCustomers->lastName ?></th>
                                    <td><?= $getDetailCustomers->firstName ?></td>
                                    <td><?= $getDetailCustomers->birthdate ?></td>
                                    <td><?= $getDetailCustomers->address ?></td>
                                    <td><?= $getDetailCustomers->postalCode ?></td>
                                    <td><?= wordwrap($getDetailCustomers->phoneNumber, 2, '.', 1) ?></td>
                                    <td><?= $getDetailCustomers->statut ?></td>
                                    <td><?= $getDetailCustomers->organisme ?></td>
                                    <td><?= $getDetailCustomers->amount ?> €</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php include_once 'footer.php'; ?>
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>