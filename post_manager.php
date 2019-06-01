<?php
class PostsManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Post $post)
  {
    $q = $this->_db->prepare('INSERT INTO posts(title, content) VALUES(:title, :content)');

    $q->bindValue(':title', $post->title());
    $q->bindValue(':content', $post->content());

    $q->execute();
  }

  public function delete(Post $post)
  {
    $this->_db->exec('DELETE FROM posts WHERE id = '.$perso->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, title, content, creation_date FROM posts WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Post($donnees);
  }

  public function getList()
  {
    $posts = [];

    $q = $this->_db->query('SELECT id, title, content, creation_date FROM posts ORDER BY creation_date');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $posts[] = new Post($donnees);
    }

    return $posts;
  }

  public function update(Post $post)
  {
    $q = $this->_db->prepare('UPDATE posts SET title = :title, content = :content, WHERE id = :id');

    $q->bindValue(':title', $post->title());
    $q->bindValue(':content', $post->content());

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}