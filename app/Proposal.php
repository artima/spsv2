<?php

namespace App;
/**
 * Class Proposal
 * @package App
 */
class Proposal
{
    private $id;
    private $name;
    private $createDate;
    private $editDate;
    private $stage;
    private $user;

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
     * Méthode permettant de savoir si la proposal est nouvelle.
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * Méthode permettant de savoir si la proposal est valide.
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

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
        return $this;
    }

    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;
        return $this;
    }

    public function setStage($stage)
    {
        $this->stage = $stage;
        return $this;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
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

    public function getCreateDate()
    {
        return $this->createDate;
    }

    public function getEditDate()
    {
        return $this->editDate;
    }

    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}