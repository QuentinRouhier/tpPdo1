<?php

/**
 * Modèle de la table customers.
 * Ici je la déclare
 * Le mot clé extends permet de dire que la classe customers hérite de la classe database
 */
class customers extends database {

    /**
     *
     * Declaration des attributs
     */
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthdate = '01/01/1900';
    public $address = '';
    public $city = '';
    public $postalCode = '';
    public $phoneNumber = '';
    public $id_tpPdo2_martial_statut = 0;

    /**
     * Déclaration de la méthode magique construct.
     * Le constructeur de la classe est appelé avec le mot clé new.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    /**
     * 
     * Ajoue d'un utilisateur avec jointure pour aller cherceher l'id du service de l'utilisateur
     */
    public function addCustomers() {
        $query = 'INSERT INTO `tpPdo2_customers` (`id`, `lastName`, `firstName`, `birthdate`, `address`, `postalCode`, `phoneNumber`, `id_tpPdo2_martial_statut`) '
                . 'VALUES (NULL, UPPER(:lastName), :firstName, STR_TO_DATE(:birthdate, \'%d/%m/%Y\'), :address, :postalCode, REPLACE(:phoneNumber, \'.\',\'\'), :id_tpPdo2_martial_statut)';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $queryResult->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryResult->bindValue(':postalCode', $this->postalCode, PDO::PARAM_STR);
        $queryResult->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_tpPdo2_martial_statut', $this->id_tpPdo2_martial_statut, PDO::PARAM_STR);
        return $queryResult->execute();
    }
    
    public function showCustomers() {
        $query = 'SELECT `id`,`lastName`,`firstName` FROM `tpPdo2_customers` ';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
    public function getDetailCustomer() {
        $query = 'SELECT `tpPdo2_customers`.`id`, `tpPdo2_customers`.`lastName`, `tpPdo2_customers`.`firstName`, '
                . '`tpPdo2_customers`.`birthdate`, `tpPdo2_customers`.`address`, `tpPdo2_customers`.`postalCode`, '
                . '`tpPdo2_customers`.`phoneNumber`, `tpPdo2_customers`.`id_tpPdo2_martial_statut`, '
                . '`tpPdo2_credit`.`organisme`, `tpPdo2_credit`.`amount`, '
                . '`tpPdo2_martial_statut`.`statut` '
                . 'FROM `tpPdo2_customers` '
                . 'INNER JOIN `tpPdo2_credit` '
                . 'ON `tpPdo2_customers`.`id_tpPdo2_martial_statut` = `tpPdo2_credit`.`id` '
                . 'INNER JOIN `tpPdo2_martial_statut` '
                . 'ON `tpPdo2_customers`.`id_tpPdo2_martial_statut` = `tpPdo2_martial_statut`.`id` '
                . 'WHERE `tpPdo2_customers`.`id` = :id';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
