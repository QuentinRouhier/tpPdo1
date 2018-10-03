<?php
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'lang/FR_fr.php';
include_once 'model/users.php';
include_once 'controlleur/indexControlleur.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title><?= PART_ONE ?></title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <?= include_once 'header.php'; ?>
        <table class="table table-hover">
            <tbody>
                <?php foreach ($groupUser as $groupUsers) { ?>
                    <tr class="table-info">
                        <th><?= $groupUsers->lastName . ' ' . $groupUsers->firstName ?></th>
                        <td><?= $groupUsers->birthdate . YEAR ?></td>
                        <td><?= $groupUsers->adress . ' ' . $groupUsers->postalCode ?></td>
                        <td><?= wordwrap($groupUsers->phoneNumber, 2, '.', 1) ?></td>
                        <td><?= $groupUsers->nameService ?></td>
                        <td>
                            <form method="post" action="index.php">
                                <button type="submit" name="deleteUsers" value="<?= $groupUsers->idUser ?>" class="btn btn-secondary"><?= DELETE_USERS ?></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> 
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>