<?php

namespace App;

/**
 * Class UserMapperPdo
 * @package App
 */
class UserMapperPdo
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
     * @see UserManager::add()
     */
    public function add(User $user)
    {
        $requete = $this->db->prepare('INSERT INTO user(id, name, email, userCreateDate) VALUES("", :name, :email, NOW())');
        $requete->bindValue(':name', $user->getName());
        $requete->bindValue(':email', $user->getEmail());
        $requete->execute();
    }

    /**
     * @see UserManager::count()
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM user')->fetchColumn();
    }

    /**
     * @see UserManager::delete()
     */
    public function delete($id)
    {
        $this->db->exec('DELETE FROM user WHERE id = '.(int) $id);
    }

    /**
     * @see UserManager::getList()
     */
    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT * FROM user ORDER BY id DESC';

        // On vérifie l'intégrité des paramètres fournis.
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->db->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'User');

        $listUser = $requete->fetchAll();

        $requete->closeCursor();

        return $listUser;
    }

    /**
     * @see UserManager::getUnique()
     * @param $id
     * @return mixed
     */
    public function getUnique($id)
    {
        $requete = $this->db->prepare('SELECT * FROM user WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class);

        $user = $requete->fetch();

        return $user;
    }

    /**
     * @see UserManager::update()
     */
    public function update(User $user)
    {
        $requete = $this->db->prepare('UPDATE user SET name = :name, email = :email WHERE id = :id');

        $requete->bindValue(':name', $user->getName());
        $requete->bindValue(':email', $user->getEmail());
        $requete->bindValue(':id', $user->getId(), \PDO::PARAM_INT);

        $requete->execute();
    }
}