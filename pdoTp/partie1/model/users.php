<?php

/**
 * Modèle de la table users.
 * Ici je la déclare
 * Le mot clé extends permet de dire que la classe users hérite de la classe database
 */
class users extends database {

    /**
     *
     * Declaration des attributs
     */
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthdate = '01/01/1900';
    public $adress = '';
    public $city = '';
    public $postalCode = '';
    public $phoneNumber = '';
    public $id_tpPdo1_service = 0;

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
    public function addUsers() {
        $query = 'INSERT INTO `tpPdo1_users` (`id`, `lastName`, `firstName`, `birthdate`, `adress`, `postalCode`, `phoneNumber`,`id_tpPdo1_service`) '
                . 'VALUES (NULL, UPPER(:lastName), :firstName,STR_TO_DATE(:birthdate, \'%d/%m/%Y\'), :adress, :postalCode, REPLACE(:phoneNumber, \'.\',\'\'), :id_tpPdo1_service)';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $queryResult->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':adress', $this->adress, PDO::PARAM_STR);
        $queryResult->bindValue(':postalCode', $this->postalCode, PDO::PARAM_STR);
        $queryResult->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_tpPdo1_service', $this->id_tpPdo1_service, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function showUsers() {
        $query = 'SELECT `tpPdo1_users`.`id` AS `idUser`,`tpPdo1_users`.`lastName`, `tpPdo1_users`.`firstName`, '
                . 'floor(DATEDIFF(CURRENT_DATE,`birthdate`)/365.25) AS `birthdate`, '
                . '`tpPdo1_users`.`adress`, `tpPdo1_users`.`postalCode`, '
                . '`tpPdo1_users`.`phoneNumber`, `tpPdo1_users`.`id_tpPdo1_service`, '
                . '`tpPdo1_service`.`id`,  `tpPdo1_service`.`nameService`'
                . 'FROM `tpPdo1_users` '
                . 'INNER JOIN `tpPdo1_service` '
                . 'ON `tpPdo1_users`.`id_tpPdo1_service` = `tpPdo1_service` . `id` ';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteUsers() {
        $query = 'DELETE FROM `tpPdo1_users`'
                . 'WHERE `id` = :id';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
