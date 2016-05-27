<?php

namespace Model\Entity;

/**
 * Class User
 * @package Model\Entity
 */
class User
{
    private $id;
    private $name;
    private $email;
    private $userCreateDate;

    /**
     * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
     * @param $valeurs array Les valeurs à assigner
     * @return void
     */
    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
            $this->hydrate($valeurs);
        }
    }

    /**
     * Méthode assignant les valeurs spécifiées aux attributs correspondant.
     * @param $donnees array Les données à assigner
     * @return void
     */
    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set'.ucfirst($attribut);

            if (is_callable([$this, $methode]))
            {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Méthode permettant de savoir si le user est nouvelle.
     * @return bool
     */
    public function isNew()
    {
        die('ok');
        return empty($this->id);
    }

    /**
     * Méthode permettant de savoir si le user est valide.
     * @return bool
     */
    public function isValid()
    {
        return !(empty($this->name));
    }


    // SETTERS //

    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setUserCreateDate($userCreateDate)
    {
        $this->userCreateDate = $userCreateDate;
        return $this;
    }


    // GETTERS //

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUserCreateDate()
    {
        return $this->createDate;
    }
}