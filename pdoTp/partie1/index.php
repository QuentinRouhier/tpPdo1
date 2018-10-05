<?php
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'lang/FR_fr.php';
include_once 'model/users.php';
include_once 'model/service.php';
include_once 'controlleur/indexControlleur.php';
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
            <div class="btn-group">
                <a title="Lister les services" href="?getUserListByService" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= FILTER ?>
                </a>
                <div class="dropdown-menu">
                    <?php foreach ($showService as $showServices) { ?>
                        <a title="Service" href="?getId=<?= $showServices->id ?>" class="dropdown-item" ><?= $showServices->nameService ?></a>
                    <?php } ?>
                    <a title="Service" href="index.php?partie1" class="dropdown-item" > <?= ALL_SERVICE ?></a>
                </div>
            </div>
            <div class="table-responsive-lg table-responsive-xl table-responsive-md table-responsive-sm">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col"><?= NAME ?></th>
                            <th scope="col"><?= YEARS ?></th>
                            <th scope="col"><?= ADDRESS ?></th>
                            <th scope="col"><?= PHONE_NUMBER ?></th>
                            <th scope="col"><?= SERVICE_GROUP ?></th>
                            <th scope="col"><?= DELETE_USERS ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getUserListByService as $getUserListByServices) { ?>
                            <tr class="table-info">
                                <th scope="row"><?= $getUserListByServices->lastName . ' ' . $getUserListByServices->firstName ?></th>
                                <td><?= $getUserListByServices->age . YEAR ?></td>
                                <td><?= $getUserListByServices->adress . ' ' . $getUserListByServices->postalCode ?></td>
                                <td><?= wordwrap($getUserListByServices->phoneNumber, 2, '.', 1) ?></td>
                                <td><?= $getUserListByServices->nameService ?></td>
                                <td>
                                    <a type="submit" href="?deleteUsers=<?= $getUserListByServices->idUser ?>" title="deleteUsers" class="btn btn-danger"><?= DELETE_USERS ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>