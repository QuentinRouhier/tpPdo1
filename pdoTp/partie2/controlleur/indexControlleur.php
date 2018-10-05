<?php
if (isset($_GET['home'])) {
    // dirige vers :
    header('location: /index.php');
    //On s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée.
    exit;
}
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
$customers = new customers();
$getCustomer = $customers->showCustomers();
if (isset($_POST['viewProfil'])){
    header('location : /partie2/detailCustomer.php');
    exit;
}