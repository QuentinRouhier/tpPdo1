<?php

// instantie la class users
$users = new users();
// suppression d'un utilisateur
if (isset($_GET['deleteUsers'])) {
    $deleteUsers = strip_tags($_GET['deleteUsers']);
    $users->id = intval($deleteUsers);
    $users->deleteUsers();
}
if (isset($_GET['getId'])) {
    $users->nameService = strip_tags($_GET['getId']);
    $id_tpPdo1_service = strip_tags($_GET['getId']);
    $users->id_tpPdo1_service = intval($id_tpPdo1_service);
}
$deleteUsers = '';
$getUserListByService = $users->getUserListByService();
$service = new service();
$showService = $service->showService();

if (isset($_GET['home'])) {
    // dirige vers :
    header('location: /index.php');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
$liAddUsser = TRUE;
if (isset($_GET['partie1'])) {
    // dirige vers :
    header('location: /partie1/index.php');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
if (isset($_GET['partie2'])) {
    // dirige vers :
    header('location: /partie2/index.php');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
if (isset($_GET['addUsers'])) {
    // dirige vers :
    header('location: /partie1/addUsers.php');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
