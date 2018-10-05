<?php
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'lang/FR_fr.php';
include_once 'model/credit.php';
include_once 'model/customers.php';
include_once 'helpers/form.php';
include_once 'controlleur/addCreditControlleur.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- css du theme bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- feuille de style de la page -->
        <link href="assets/CSS/style.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title><?= ADD_CLIENT ?></title>
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <div class="container">
            <h1><?= $errorList == 0 ? $succesAddCredit : $errorAddCredit ?></h1>
            <form method="post" action='addCredit.php'>
                <fieldset>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6 col-xs-12 col-lg-6">
                            <label for="organisme"><?= ORGANISME ?></label>
                            <input class="form-control <?= isset($errorList['organisme']) ? 'is-invalid' : '' ?>" name="organisme" placeholder="<?= ORGANISME ?>" type="text" <?= REQUIRED ?> value="">
                            <p class="help-block"><?= isset($errorList['organisme']) ? $errorList['organisme'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xs-12 col-lg-6">
                            <label for="customer"><?= NAME ?></label>
                            <select class="custom-select" name="customer">
                                <?php
                                foreach ($showCustomer as $showCustomers) {
                                    ?>
                                    <option value="<?= $showCustomers->id ?>" <?= $showCustomers->lastName == '' && $showCustomers->firstName == '' ? '' : 'selected' ?>><?= $showCustomers->lastName ?>  <?= $showCustomers->firstName ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group col-sm-12 col-md-6 col-xs-12 col-lg-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                            </div>
                            <input type="text" class="form-control <?= isset($errorList['amount']) ? 'is-invalid' : '' ?>" name="amount" placeholder="<?= AMOUNT ?>" type="text" <?= REQUIRED ?> value="">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                                <p class="help-block"><?= isset($errorList['amount']) ? $errorList['amount'] : '' ?></p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="submit"><?= ADD ?></button>

                </fieldset>
            </form>
        </div>
        <?php include_once 'footer.php'; ?>
        <!-- script du theme bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    </body>
</html>
