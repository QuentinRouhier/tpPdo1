<?php
/**
 * Modèle de la table tpPdo1_service.
 * Ici je la déclare
 * Le mot clé extends permet de dire que la classe service hérite de la classe database
 */
class service extends database {
    /**
     *
     * Declaration des attributs
     */
    public $id = 0;
    public $nameService = '';
    public $description = '';
    
    /**
     * Déclaration de la méthode magique construct.
     * Le constructeur de la classe est appelé avec le mot clé new.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }
    /**
     * on va chercher les servies de la bdd
     */
    public function showService(){
        $queryResult = $this->pdo->prepare('SELECT `id` , `nameService` , `description` FROM `tpPdo1_service`');
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
}