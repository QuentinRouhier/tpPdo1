<?php

/**
 * instantie la class form
 */
class form {

    /**
     *  Premet de savoir si les champs sont vide ou non.
     * @param type $empty prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkIfEmpty($empty) {
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (!empty($empty)) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctEmpty = TRUE;
        } else {
            $correctEmpty = FALSE;
        }
        return $correctEmpty;
    }

    /**
     * Chek si la date est vraiment une date et si elle existe
     * @param type $date prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkDate($date) {
        //regex pour la date
        $regexBirthDate = '/((0[1-9])|([1-2][0-9])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/((19[0-9]{2})|(20(([0-4][0-9])|(50))))/';
        $cutDate = explode('/', $date);
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (preg_match($regexBirthDate, $date) && checkdate($cutDate[1], $cutDate[0], $cutDate[2])) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctDate = TRUE;
        } else {
            $correctDate = FALSE;
        }
        return $correctDate;
    }

    /**
     * Check si la regex match ou non 
     * @param type $name prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkName($name) {
        //regex pour le nom et le prenom
        $regexName = '/^[a-zA-z][(a-zàéèëêù\'ïîâäöôç\- )]{2,50}$/i';
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (preg_match($regexName, $name)) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctName = TRUE;
        } else {
            $correctName = FALSE;
        }
        return $correctName;
    }
    /**
     * chek si $serviceGroup == 0
     * @param type $serviceGroup prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkServiceGroup($serviceGroup) {
        if ($serviceGroup == 0) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctServiceGroup = TRUE;
        } else {
            $correctServiceGroup = FALSE;
        }
        return $correctServiceGroup;
    }

    /**
     * Check si la regex match ou non 
     * @param type $address prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkAddress($address) {
        //regex pour le nom et le prenom
        $regexAddress = '/^([a-z0-9àéèëêù\'ïîâäöôç\- ]){2,100}$/i';
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (preg_match($regexAddress, $address)) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctAddress = TRUE;
        } else {
            $correctAddress = FALSE;
        }
        return $correctAddress;
    }

    /**
     * Check si la regex match ou non 
     * @param type $postalCode prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkPostalCode($postalCode) {
        //regex pour le nom et le prenom
        $regexPostcalCode = '/^[0-9]{5}$/i';
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (preg_match($regexPostcalCode, $postalCode)) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctPostalCode = TRUE;
        } else {
            $correctPostalCode = FALSE;
        }
        return $correctPostalCode;
    }

    /**
     * Check si la regex match ou non 
     * @param type $phoneNumber prend ce qu'il y a en paramettre dans le controlleur
     * @return boolean
     */
    static function checkPhoneNumber($phoneNumber) {
        //regex pour le nom et le prenom
        $regexPhoneNumber = '/^0[1-79](\.\d{2}){4}$/i';
        // si la regex n'est pas en accord avec ce que l'utilisateur a envoyer
        if (preg_match($regexPhoneNumber, $phoneNumber)) {
            // tu ajoute dans l'attribue birthdate le contenu de ce que l'utilisateur a envoyer
            $correctPhoneNumber = TRUE;
        } else {
            $correctPhoneNumber = FALSE;
        }
        return $correctPhoneNumber;
    }

}
