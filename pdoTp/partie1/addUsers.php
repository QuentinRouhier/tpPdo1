<?php
include_once 'configuration.php';
include_once 'class/database.php';
include_once 'lang/FR_fr.php';
include_once 'model/users.php';
include_once 'model/service.php';
include_once 'controlleur/addUsersControlleur.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- css du datepicker -->
        <link href="assets/CSS/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/CSS/bootstrap-datepicker3.standalone.css" rel="stylesheet" type="text/css"/>
        <!-- css du theme bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- mask pour le téléphone-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <!-- feuille de style de la page -->
        <link href="assets/CSS/style.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title><?= ADD_USER ?></title>
    </head>
    <body>
        <?= include_once 'header.php'; ?>
        <div class="container">
            <h1><?= $errorList == 0 ? $errorList['submit'] : $errorAddUser ?></h1>
            <form method="post" action='addUsers.php'>
                <fieldset>
                    <div class="row">
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="lastName"><?= LAST_NAME ?></label>
                            <input class="form-control <?= isset($errorList['lastName']) ? 'is-invalid' : '' ?>" name="lastName" placeholder="<?= LAST_NAME ?>" type="text" <?= REQUIRED ?> value="<?= $users->lastName ?>">
                            <p class="help-block"><?= isset($errorList['lastName']) ? $errorList['lastName'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="firstName"><?= FIRST_NAME ?></label>
                            <input class="form-control <?= isset($errorList['firstName']) ? 'is-invalid' : '' ?>" name="firstName" placeholder="<?= FIRST_NAME ?>" type="text" <?= REQUIRED ?> value="<?= $users->firstName ?>">
                            <p class="help-block"><?= isset($errorList['firstName']) ? $errorList['firstName'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="serviceGroup"><?= SERVICE_GROUP ?></label>
                            <select class="custom-select" name="serviceGroup">
                                <?php
                                foreach ($groupService as $groupServices) {
                                    ?>
                                    <option value="<?= $groupServices->id ?>" <?= $service->nameService == '' ? '' : 'selected'?>><?= $groupServices->nameService ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="birthDate"><?= BIRTHDATE ?></label>
                            <input id="date-mask" data-provide="datepicker" class="form-control datepicker <?= isset($errorList['birthDate']) ? 'is-invalid' : '' ?>" id="birthDate" name="birthDate" placeholder="<?= BIRTHDATE ?>" type="text" data-mask="99/99/9999" <?= REQUIRED ?> value="<?= $users->birthdate ?>">
                            <p class="help-block"><?= isset($errorList['birthDate']) ? $errorList['birthDate'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="adress"><?= ADRESS ?></label>
                            <input class="form-control <?= isset($errorList['adress']) ? 'is-invalid' : '' ?>" name="adress" placeholder="<?= ADRESS ?>" type="text" <?= REQUIRED ?> value="<?= $contentAdress ?>">
                            <p class="help-block"><?= isset($errorList['adress']) ? $errorList['adress'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="city"><?= CITY ?></label>
                            <input class="form-control <?= isset($errorList['city']) ? 'is-invalid' : '' ?>" name="city" placeholder="<?= CITY ?>" type="text" <?= REQUIRED ?> value="<?= $contentCity ?>">
                            <p class="help-block"><?= isset($errorList['city']) ? $errorList['city'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="postalCode"><?= POSTAL_CODE ?></label>
                            <input class="form-control <?= isset($errorList['postalCode']) ? 'is-invalid' : '' ?>" name="postalCode" placeholder="<?= POSTAL_CODE ?>" type="text" <?= REQUIRED ?> value="<?= $users->postalCode ?>">
                            <p class="help-block"><?= isset($errorList['postalCode']) ? $errorList['postalCode'] : '' ?></p>
                        </div>
                        <div class="form-group col-sm-3 col-md-6 col-xs-3 col-lg-6">
                            <label for="phoneNumber"><?= PHONE_NUMBER ?></label>
                            <input class="form-control <?= isset($errorList['phoneNumber']) ? 'is-invalid' : '' ?>" name="phoneNumber" placeholder="<?= PHONE_NUMBER ?>" type="text" data-mask="09.99.99.99.99" <?= REQUIRED ?> value="<?= $users->phoneNumber ?>">
                            <p class="help-block"><?= isset($errorList['phoneNumber']) ? $errorList['phoneNumber'] : '' ?></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="submit"><?= ADD ?></button>
                </fieldset>
            </form>
        </div>
        <!-- Faire fonctionner jQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- script du theme bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
        <!-- JS du datpicker -->
        <script src="assets/javaScript/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/javaScript/bootstrap-datepicker.fr.min.js" type="text/javascript"></script>
        <script src="assets/javaScript/datePicker.js" type="text/javascript"></script>
        <!-- mask du telephone -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    </body>
</html>
