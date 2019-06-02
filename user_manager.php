<?php
class UserManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(User $user)
  {
    $q = $this->_db->prepare('INSERT INTO users(nickname, password, posts_ids) VALUES(:nickname, :password, :posts_ids)');

    echo 'UserManager fonction add()';

    $q->bindValue(':nickname', $user->nickname());
    $q->bindValue(':password', $user->password());
    $q->bindValue(':posts_ids', $user->posts_ids());

    $q->execute();
  }

  public function delete(User $user)
  {
    $this->_db->exec('DELETE FROM users WHERE id = '.$user->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, nickname, password, posts_ids FROM users WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new User($donnees);
  
}

  public function getList()
  {
    $users = [];

    $q = $this->_db->query('SELECT id, nickname, password, posts_ids FROM users ORDER BY creation_date');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new User($donnees);
    }

    return $users;
  }

  public function update(User $user)
  {
    $q = $this->_db->prepare('UPDATE users SET id = :id, nickname = :nickname, password = :password, posts_ids = :posts_ids, creation_date = now() WHERE id = :id');

    $q->bindValue(':id', $user->id(), PDO::PARAM_INT);
    $q->bindValue(':nickname', $user->nickname());
    $q->bindValue(':password', $user->password());
    $q->bindValue(':posts_ids', $user->posts_ids());

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}