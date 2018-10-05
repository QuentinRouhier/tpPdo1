<?php

/**
 * Modèle de la table credit.
 * Ici je la déclare
 * Le mot clé extends permet de dire que la classe credit hérite de la classe database
 */
class credit extends database {

    /**
     *
     * Declaration des attributs
     */
    public $id = 0;
    public $organisme = '';
    public $amount  = '';
    public $id_tpPdo2_customers = 0;

    /**
     * Déclaration de la méthode magique construct.
     * Le constructeur de la classe est appelé avec le mot clé new.
     */
    public function __construct() {
        parent::__construct();
        $this->connectDB();
    }

    public function addCredit() {
        $query = 'INSERT INTO `tpPdo2_credit` (`id`, `organisme`, `amount`, `id_tpPdo2_customers`) '
                . 'VALUES (NULL, :organisme, :amount, :id_tpPdo2_customers)';
        $queryResult = $this->pdo->prepare($query);
        $queryResult->bindValue(':organisme', $this->organisme, PDO::PARAM_STR);
        $queryResult->bindValue(':amount', $this->amount, PDO::PARAM_STR);
        $queryResult->bindValue(':id_tpPdo2_customers', $this->id_tpPdo2_customers, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
