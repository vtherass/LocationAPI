<?php

class Prof implements JsonSerializable {

    private $id;
    private $nom;
    private $prenom;
    private $email;

    function __construct($n, $p, $e, $id = NULL) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $e;
    }

    function __get($attr) {
        switch($attr) {
            case "id":
                return $this->id;
                break;
            case "prenom":
                return $this->prenom;
                break;
            case "nom":
                return $this->nom;
                break;
            case "email":
                return $this->email;
                break;
            default:
                return "Unknow";
                break;
        }
    }

    function __set($attr, $value) {
        switch($attr) {
            case "prenom":
                $this->prenom = $value;
                break;
            case "nom":
                $this->nom = $value;
                break;
            case "email":
                $this->email = $value;
                break;
            default:
                return "Unknow";
                break;
        }
    }

    function __toString() {
        return $this->id." - ".$this->prenom.' - '.$this->nom.' - '.$this->email;
    }

    public function jsonSerialize()
    {
        return array("id" => $this->id, "nom" => $this->nom, "prenom" => $this->prenom, "email" => $this->email);
    }
}

?>