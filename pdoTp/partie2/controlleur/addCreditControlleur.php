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
$customers = new customers;
$showCustomer = $customers->showCustomers();
// instantie la class credit
$credit = new credit();
// on cree un tableau d'erreur vide comme ca la fin si il y a une erreur on l'affiche.
$errorList = array();
// On cree une variable $errorAddUser vide pour lui afficher si il y a une erreur et $succesAddUser pour afficher une reussite
$errorAddCredit = '';
$succesAddCredit = '';
// si le form est envoyer
if (isset($_POST['submit'])) {
    // tu verifie si le organisme n'est pas vide
    if (form::checkIfEmpty($_POST['organisme'])) {
        // tu ajoute dans l'attribue organisme le contenu de ce que l'utilisateur a envoyer
        $credit->organisme = strip_tags($_POST['organisme']);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkOrganisme($credit->organisme)) {
            // Tu mets dans le tableau une erreur
            $errorList['organisme'] = ERROR_ORAGANISME;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['organisme'] = EMPTY_VALUE;
    }
    // si le group envoyer a l'id qui n'est pas 0 
    if (!form::checkMartialStatut($_POST['customer'])) {
        // tu ajoute dans l'attribue id_tpPdo2_martial_statut l'id du group envoyer
        $credit->id_tpPdo2_customers = intval(strip_tags($_POST['customer']));
    } else {
        // Tu mets dans le tableau une erreur
        $errorList['martialStatut'] = EMPTY_VALUE;
    }
    // tu verifie si le amount n'est pas vide
    if (form::checkIfEmpty($_POST['amount'])) {

        // tu ajoute dans l'attribue amount le contenu de ce que l'utilisateur a envoyer
        $credit->amount = strip_tags($_POST['amount']) . '.00';
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!form::checkAmount($credit->amount)) {
            // Tu mets dans le tableau une erreur
            $errorList['amount'] = ERROR_AMOUNT;
        }
    } else {
        //sinon tu mets dans le tableau une erreur
        $errorList['organisme'] = EMPTY_VALUE;
    }
    // si le total tu tableau $errorList et egale a 0
    if (count($errorList) == 0) {
        // si on ne peux pas ajouter un client
        if (!$credit->addCredit()) {
            // tu mets une erreur
            $errorAddCredit = ERROR_ADD_USER;
            // sinon tu ajouter l'utilisateur
        } else {
            // tu indique une reussite
            $succesAddCredit = 'l\'utilisateur a bien etait enregistré';
        }
    } else {
        // sinon il y a une erreur
        $errorAddCredit = ERROR_ADD_USER;
    }
}