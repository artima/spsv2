<?php

namespace App;

use app\proposal;

/**
 * Class ProposalMapper
 * @package App
 */
abstract class ProposalMapper
{
    /**
     * Méthode permettant d'ajouter une proposal.
     * @param $proposal Proposal La proposal à ajouter
     * @return void
     */
    abstract protected function add(Proposal $proposal);

    /**
     * Méthode renvoyant le nombre de proposal total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode permettant de supprimer une proposal.
     * @param $id int L'identifiant de la proposal à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode retournant une liste de proposal demandée.
     * @param $debut int La première proposal à sélectionner
     * @param $limite int Le nombre de proposal à sélectionner
     * @return array La liste des proposal. Chaque entrée est une instance de proposal.
     */
    abstract public function getList($debut = -1, $limite = -1);

    /**
     * Méthode retournant une proposal précise.
     * @param $id int L'identifiant de la proposal à récupérer
     * @return Proposal La proposal demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer une proposal.
     * @param $proposal Proposal la proposal à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Proposal $proposal)
    {
        if ($proposal->isValid())
        {
            $proposal->isNew() ? $this->add($proposal) : $this->update($proposal);
        }
        else
        {
            throw new \RuntimeException('La proposal doit être valide pour être enregistrée');
        }
    }

    /**
     * Méthode permettant de modifier une proposal.
     * @param $proposal Proposal la proposal à modifier
     * @return void
     */
    abstract protected function update(Proposal $proposal);
}