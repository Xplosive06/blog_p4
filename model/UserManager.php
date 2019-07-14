<?php
class UserManager extends Database
{
  private $_db;

  public function __construct()
  {
    $this->_db = $this->getDb();
  }

  public function add(User $user)
  {
    $q = $this->_db->prepare('INSERT INTO users(nickname, password) VALUES(:nickname, :password)');

    echo 'UserManager fonction add()';

    $q->bindValue(':nickname', $user->nickname());
    $q->bindValue(':password', $user->password());

    $q->execute();
  }

  public function delete(User $user)
  {
    $this->_db->exec('DELETE FROM users WHERE id = '.$user->id());
  }

  public function get($nickname)
  {

    $q = $this->_db->prepare('SELECT id, nickname, password, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%i") AS creation_date, role FROM users WHERE nickname = :nickname');
    $q->execute(array(
      'nickname' => $nickname));
    $donnees = $q->fetch();

    return new User($donnees);
  }

  public function getList()
  {
    $users = [];

    $q = $this->_db->query('SELECT id, nickname, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%i") AS creation_date, role FROM users ORDER BY creation_date');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new User($donnees);
    }

    return $users;
  }


  public function update(User $user)
  {
    $q = $this->_db->prepare('UPDATE users SET id = :id, nickname = :nickname, password = :password, creation_date = now(), role = :role WHERE id = :id');

    $q->bindValue(':id', $user->id(), PDO::PARAM_INT);
    $q->bindValue(':nickname', $user->nickname());
    $q->bindValue(':password', $user->password());
    $q->bindValue(':role', $user->role());

    $q->execute();
  }
}