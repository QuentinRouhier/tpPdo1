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
// on cree un tableau d'erreur vide comme ca la fin si il y a une erreur on l'affiche.
$errorList = array();
// on cree deux variable pour pouvoir les concatener afin d'avoir un adresse complete
$contentAdress = NULL;
$contentCity = NULL;
// On cree une variable $errorAddUser vide pour lui afficher si il y a une erreur et $succesAddUser pour afficher une reussite
$errorAddUser = '';
$succesAddUser = '';
if (isset($_POST['submit'])) {
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['lastName'])) {
        // tu ajoute dans l'attribue lastName le contenu de ce que l'utilisateur a envoyer
        $users->lastName = strip_tags($_POST['lastName']);
        // Appel la class form qui contien la methode checkName et on passe en parametre ce que contien l'attribu.
        if (!form::checkName($users->lastName)) {
            // Tu mets dans le tableau une erreur
            $errorList['lastName'] = ERROR_NAME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['lastName'] = EMPTY_VALUE;
    }
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['firstName'])) {
        // tu ajoute dans l'attribue firstName le contenu de ce que l'utilisateur a envoyer
        $users->firstName = strip_tags($_POST['firstName']);
        // Appel la class form qui contien la methode checkName et on passe en parametre ce que contien l'attribu.
        if (!form::checkName($users->firstName)) {
            // Tu mets dans le tableau une erreur
            $errorList['firstName'] = ERROR_NAME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['firstName'] = EMPTY_VALUE;
    }
    // si le group envoyer a l'id qui n'est pas 0 
    if (!form::checkServiceGroup($_POST['serviceGroup'])) {
        // tu ajoute dans l'attribue id_tpPdo1_service l'id du group envoyer
        $users->id_tpPdo1_service = intval(strip_tags($_POST['serviceGroup']));
    } else {
        // Tu mets dans le tableau une erreur
        $errorList['serviceGroup'] = EMPTY_VALUE;
    }
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['birthDate'])) {
        // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
        $users->birthdate = strip_tags($_POST['birthDate']);
        // Appel la class form qui contien la methode checkDate et on passe en parametre ce que contien l'attribu.
        if (!form::checkDate($users->birthdate)) {
            $errorList['birthDate'] = ERROR_BIRTH_DAY;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['birthDate'] = EMPTY_VALUE;
    }
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['adress'])) {
        // tu ajoute dans la variable $contentAdress le contenu de ce que l'utilisateur a envoyer
        $contentAdress = strip_tags($_POST['adress']);
        // Appel la class form qui contien la methode checkAddress et on passe en parametre ce que contien la variable.
        if (!form::checkAddress($contentAdress)) {
            // Tu mets dans le tableau une erreur
            $errorList['adress'] = ERROR_ADRESS;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['adress'] = EMPTY_VALUE;
    }
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['city'])) {
        // tu ajoute dans variable $contentCity le contenu de ce que l'utilisateur a envoyer
        $contentCity = strip_tags($_POST['city']);
        // Appel la class form qui contien la methode checkAddress et on passe en parametre ce que contien la variable.
        if (!form::checkAddress($contentCity)) {
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
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['postalCode'])) {
        // tu ajoute dans l'attribu postalCode le contenu de ce que l'utilisateur a envoyer
        $users->postalCode = strip_tags($_POST['postalCode']);
        // Appel la class form qui contien la methode checkPostalCode et on passe en parametre ce que contien l'attribu.
        if (!form::checkPostalCode($users->postalCode)) {
            // Tu mets dans le tableau une erreur
            $errorList['postalCode'] = ERROR_POSTAL_CODE;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['postalCode'] = EMPTY_VALUE;
    }
    // Appel la class form qui contien la methode checkIfEmpty et on passe en parametre ce que contien la methode post
    if (form::checkIfEmpty($_POST['phoneNumber'])) {
        // tu ajoute dans l'attribu phoneNumber le contenu de ce que l'utilisateur a envoyer
        $users->phoneNumber = strip_tags($_POST['phoneNumber']);
        // Appel la class form qui contien la methode checkPhoneNumber et on passe en parametre ce que contien l'attribu.
        if (!form::checkPhoneNumber($users->phoneNumber)) {
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
        $errorAddUser = ERROR_ADD_USER;
    }
}