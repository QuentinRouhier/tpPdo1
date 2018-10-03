<?php

// instantie la class users
$users = new users();
// apprel ma lethode dans une variable $groupUser
$groupUser = $users->showUsers();
$deleteUsers = '';
// suppression d'un utilisateur
if (isset($_POST['deleteUsers'])) {
    $deleteUsers = strip_tags($_POST['deleteUsers']);
    $users->id = intval($deleteUsers);
    $users->deleteUsers();
    header('location: /partie1/index.php');
    exit;
}
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
