<?php
$liAddUsser = FALSE;
if (isset($_GET['partie1'])) {
    // dirige vers :
    header('location: /partie1');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}

if (isset($_GET['home'])) {
    // dirige vers :
    header('location: /index.php');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
if (isset($_GET['partie2'])) {
    // dirige vers :
    header('location: /partie2');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
//Instanciation de la classe service
$service = new service();
//appel de la méthode showService pour pouvoir construire la liste déroulante
$groupService = $service->showService();
// Instancie la class users
$users = new users();
// Regex pour les erreurs
$regexName = '/^[a-zA-z][(a-zàéèëêù\'ïîâäöôç\- )]{2,50}$/i';
$regexBirthDate = '/((0[1-9])|([1-2][0-9])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/((19[0-9]{2})|(20(([0-4][0-9])|(50))))/';
$regexAdress = '/^([a-z0-9àéèëêù\'ïîâäöôç\- ]){2,100}$/i';
$regexCity = '/^([a-z0-9àéèëêù\'ïîâäöôç\- ]){2,100}$/i';
$regexPostcalCode = '/^[0-9]{5}$/i';
$regexPhoneNumber = '/^0[1-79](\.\d{2}){4}$/i';
// on cree un tableau d'erreur vide comme ca la fin si il y a une erreur on l'affiche.
$errorList = array();
// on cree deux variable pour pouvoir les concatener afin d'avoir un adresse complete
$contentAdress = NULL;
$contentCity = NULL;
// On cree une variable $errorAddUser vide pour lui afficher si il y a une erreur
$errorAddUser = '';
$succesAddUser = '';
// si le form est envoyer
if (isset($_POST['submit'])) {
    // tu verifie si le Nom n'est pas vide
    if (!empty($_POST['lastName'])) {
        // tu ajoute dans l'attribue lastName le contenu de ce que l'utilisateur a envoyer
        $users->lastName = strip_tags($_POST['lastName']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexName, $_POST['lastName'])) {
            // Tu mets dans le tableau une erreur
            $errorList['lastName'] = ERROR_NAME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['lastName'] = EMPTY_VALUE;
    }
    // tu verifie si le Prenom n'est pas vide
    if (!empty($_POST['firstName'])) {
        // tu ajoute dans l'attribue firstName le contenu de ce que l'utilisateur a envoyer
        $users->firstName = strip_tags($_POST['firstName']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexName, $_POST['firstName'])) {
            // Tu mets dans le tableau une erreur
            $errorList['firstName'] = ERROR_NAME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['firstName'] = EMPTY_VALUE;
    }
    // si le group envoyer a l'id qui n'est pas 0 
    if (!$_POST['serviceGroup'] == 0) {
        // tu ajoute dans l'attribue id_tpPdo1_service l'id du group envoyer
        $users->id_tpPdo1_service = intval(strip_tags($_POST['serviceGroup']));
    } else {
        // Tu mets dans le tableau une erreur
        $errorList['serviceGroup'] = EMPTY_VALUE;
    }
    // tu verifie si la date de naissance n'est pas vide
    if (!empty($_POST['birthDate'])) {
        // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
        $users->birthdate = strip_tags($_POST['birthDate']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexBirthDate, $_POST['birthDate'])) {
            // Tu mets dans le tableau une erreur
            $errorList['birthDate'] = ERROR_BIRTH_DAY;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['birthDate'] = EMPTY_VALUE;
    }
    // tu verifie si l'adresse n'est pas vide
    if (!empty($_POST['adress'])) {
        // tu ajoute dans la variable $contentAdress le contenu de ce que l'utilisateur a envoyer
        $contentAdress = strip_tags($_POST['adress']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexAdress, $_POST['adress'])) {
            // Tu mets dans le tableau une erreur
            $errorList['adress'] = ERROR_ADRESS;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['adress'] = EMPTY_VALUE;
    }
    // tu verifie si la ville n'est pas vide
    if (!empty($_POST['city'])) {
        // tu ajoute dans variable $contentCity le contenu de ce que l'utilisateur a envoyer
        $contentCity = strip_tags($_POST['city']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexCity, $_POST['city'])) {
            // Tu mets dans le tableau une erreur
            $errorList['city'] = ERROR_CITY;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['city'] = EMPTY_VALUE;
    }
    // si la variable $contentAdress et $contentCity n'est pas NULL alors tu les concatenes
    if ($contentAdress == !NULL && $contentCity == !NULL) {
        $users->adress = $contentAdress . ' -> ' . $contentCity;
    }
    // tu verifie si le code postale n'est pas vide
    if (!empty($_POST['postalCode'])) {
        // tu ajoute dans l'attribu postalCode le contenu de ce que l'utilisateur a envoyer
        $users->postalCode = strip_tags($_POST['postalCode']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexPostcalCode, $_POST['postalCode'])) {
            // Tu mets dans le tableau une erreur
            $errorList['postalCode'] = ERROR_POSTAL_CODE;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['postalCode'] = EMPTY_VALUE;
    }
    // tu verifie si le numero de telephone n'est pas vide
    if (!empty($_POST['phoneNumber'])) {
        // tu ajoute dans l'attribu phoneNumber le contenu de ce que l'utilisateur a envoyer
        $users->phoneNumber = strip_tags($_POST['phoneNumber']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
            // Tu mets dans le tableau une erreur
            $errorList['phoneNumber'] = ERROR_PHONE_NUMBER;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['phoneNumber'] = EMPTY_VALUE;
    }
    // si le total tu tableau $errorList et egale a 0
    if (count($errorList) == 0) {
        // si on ne peux pas ajouter un utilisateur
        if (!$users->addUsers()) {
            // tu mets une erreur
            $errorAddUser = ERROR_ADD_USER;
          // sinon tu ajouter l'utilisateur
        } else {
            // tu indique une reussite
            $succesAddUser = SUCCES_ADD_USER;
        }
    } else {
        // sinon il y a une erreur
        $errorList['submit'] = 'toto';
    }
}