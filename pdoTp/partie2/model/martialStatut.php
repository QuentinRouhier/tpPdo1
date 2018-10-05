<?php

/**
 * Modèle de la table martialStatut.
 * Ici je la déclare
 * Le mot clé extends permet de dire que la classe martialStatut hérite de la classe database
 */
class martialStatut extends database {

    /**
     *
     * Declaration des attributs
     */
    public $id = 0;
    public $statut = '';

    /**
     * Déclaration de la méthode magique construct.
     * Le constructeur de la classe est appelé avec le mot clé new.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    public function showMartialStatut() {
        $queryResult = $this->pdo->prepare('SELECT `id`, `statut` FROM `tpPdo2_martial_statut`');
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
