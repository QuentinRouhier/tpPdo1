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
// Instancie la class martialStatut
$martialStatut = new martialStatut();
// cree la liste 
$getListMartialStatut = $martialStatut->showMartialStatut();
// Instancie la class customers
$customers = new customers();
// on cree un tableau d'erreur vide comme ca la fin si il y a une erreur on l'affiche.
$errorList = array();
// on cree deux variable pour pouvoir les concatener afin d'avoir un adresse complete
$contentAddress = NULL;
$contentCity = NULL;
// On cree une variable $errorAddUser vide pour lui afficher si il y a une erreur et $succesAddUser pour afficher une reussite
$errorAddCustomer = '';
$succesAddCustomer = '';
// si le form est envoyer
if (isset($_POST['submit'])) {
    // tu verifie si le Nom n'est pas vide
    if (form::checkIfEmpty($_POST['lastName'])) {
        // tu ajoute dans l'attribue lastName le contenu de ce que l'utilisateur a envoyer
        $customers->lastName = strip_tags($_POST['lastName']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkName($customers->lastName)) {
            // Tu mets dans le tableau une erreur
            $errorList['lastName'] = ERROR_NAME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['lastName'] = EMPTY_VALUE;
    }
    // tu verifie si le Prenom n'est pas vide
    if (form::checkIfEmpty($_POST['firstName'])) {
        // tu ajoute dans l'attribue firstName le contenu de ce que l'utilisateur a envoyer
        $customers->firstName = strip_tags($_POST['firstName']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkName($customers->firstName)) {
            // Tu mets dans le tableau une erreur
            $errorList['firstName'] = ERROR_NAME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['firstName'] = EMPTY_VALUE;
    }
    // si le group envoyer a l'id qui n'est pas 0 
    if (!form::checkMartialStatut($_POST['martialStatut'])) {
        // tu ajoute dans l'attribue id_tpPdo1_service l'id du group envoyer
        $customers->id_tpPdo2_martial_statut = intval(strip_tags($_POST['martialStatut']));
    } else {
        // Tu mets dans le tableau une erreur
        $errorList['martialStatut'] = EMPTY_VALUE;
    }
    // tu verifie si la date de naissance n'est pas vide
    if (form::checkIfEmpty($_POST['birthDate'])) {
        // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
        $customers->birthdate = strip_tags($_POST['birthDate']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkDate($_POST['birthDate'])) {
            // Tu mets dans le tableau une erreur
            $errorList['birthDate'] = ERROR_BIRTH_DAY;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['birthDate'] = EMPTY_VALUE;
    }
    // tu verifie si l'adresse n'est pas vide
    if (form::checkIfEmpty($_POST['address'])) {
        // tu ajoute dans la variable $contentAdress le contenu de ce que l'utilisateur a envoyer
        $contentAddress = strip_tags($_POST['address']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkAddress($_POST['address'])) {
            // Tu mets dans le tableau une erreur
            $errorList['address'] = ERROR_ADDRESS;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['adress'] = EMPTY_VALUE;
    }
    // tu verifie si la ville n'est pas vide
    if (form::checkIfEmpty($_POST['city'])) {
        // tu ajoute dans variable $contentCity le contenu de ce que l'utilisateur a envoyer
        $contentCity = strip_tags($_POST['city']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkAddress($_POST['city'])) {
            // Tu mets dans le tableau une erreur
            $errorList['city'] = ERROR_CITY;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['city'] = EMPTY_VALUE;
    }
    // si la variable $contentAdress et $contentCity n'est pas NULL alors tu les concatenes
    if ($contentAddress == !NULL && $contentCity == !NULL) {
        $customers->address = $contentAddress . ' -> ' . $contentCity;
    }
    // tu verifie si le code postale n'est pas vide
    if (form::checkIfEmpty($_POST['postalCode'])) {
        // tu ajoute dans l'attribu postalCode le contenu de ce que l'utilisateur a envoyer
        $customers->postalCode = strip_tags($_POST['postalCode']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkPostalCode($_POST['postalCode'])) {
            // Tu mets dans le tableau une erreur
            $errorList['postalCode'] = ERROR_POSTAL_CODE;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['postalCode'] = EMPTY_VALUE;
    }
    // tu verifie si le numero de telephone n'est pas vide
    if (form::checkIfEmpty($_POST['phoneNumber'])) {
        // tu ajoute dans l'attribu phoneNumber le contenu de ce que l'utilisateur a envoyer
        $customers->phoneNumber = strip_tags($_POST['phoneNumber']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkPhoneNumber($_POST['phoneNumber'])) {
            // Tu mets dans le tableau une erreur
            $errorList['phoneNumber'] = ERROR_PHONE_NUMBER;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['phoneNumber'] = EMPTY_VALUE;
    }
    // si le total tu tableau $errorList et egale a 0
    if (count($errorList) == 0) {
        // si on ne peux pas ajouter un client
        if (!$customers->addCustomers()) {
            // tu mets une erreur
            $errorAddCustomer = ERROR_ADD_CUSTOMER;
          // sinon tu ajouter l'utilisateur
        } else {
            // tu indique une reussite
            $succesAddCustomer = SUCCES_ADD_CUSTOMER;
        }
    } else {
        // sinon il y a une erreur
        $errorAddCustomer = ERROR_ADD_CUSTOMER;
    }
}