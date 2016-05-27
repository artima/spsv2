<?php

namespace Model\Dao;

/**
 * Class ProposalMapperPdo
 * @package App
 */
class ProposalMapperPdo extends ProposalMapper
{
    /**
     * Attribut contenant l'instance représentant la BDD.
     * @type \PDO
     */
    protected $db;

    /**
     * Constructeur étant chargé d'enregistrer l'instance de \PDO dans l'attribut $db.
     * @param $db \PDO
     * @return void
     */
    public function __construct(DatabaseFactory $db)
    {
        $this->db = $db->dbConnection();
    }

    /**
     * @see ProposalManager::add()
     */
    public function add(Proposal $proposal)
    {
        $requete = $this->db->prepare('INSERT INTO proposal(id, userId, name, createDate, editDate, stage) VALUES("",:userId, :name, NOW(), NULL, :stage)');
        $requete->bindValue(':userId', $proposal->getUser()->getId());
        $requete->bindValue(':name', $proposal->getName());
        $requete->bindValue(':stage', $proposal->getStage());
        $requete->execute();
    }

    /**
     * @see ProposalManager::count()
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM proposal')->fetchColumn();
    }

    /**
     * @see ProposalManager::delete()
     */
    public function delete($id)
    {
        $this->db->exec('DELETE FROM proposal WHERE id = '.(int) $id);
    }

    /**
     * @see ProposalManager::getList()
     */
    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT * FROM proposal ORDER BY id DESC';

        // On vérifie l'intégrité des paramètres fournis.
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->db->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Proposal');

        $listeProposal = $requete->fetchAll();

        $requete->closeCursor();

        return $listeProposal;
    }

    /**
     * @see ProposalManager::getUnique()
     * @param $id
     * @return mixed
     */
    public function getUnique($id)
    {
        $requete = $this->db->prepare('SELECT * FROM proposal WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Proposal');

        $proposal = $requete->fetch();

        return $proposal;
    }

    /**
     * @see ProposalManager::update()
     */
    public function update(Proposal $proposal)
    {
        $requete = $this->db->prepare('UPDATE proposal SET name = :name, editDate = NOW() WHERE id = :id');

        $requete->bindValue(':name', $proposal->getName());
        $requete->bindValue(':stage', $proposal->getStage());
        $requete->bindValue(':id', $proposal->getId(), \PDO::PARAM_INT);

        $requete->execute();
    }
}