  <?php
  class CommentManager
  {
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Comment $comment)
  {
    $q = $this->_db->prepare('INSERT INTO comments(post_id, author, comment) VALUES(:post_id, :author, :comment)');

    $q->bindValue(':post_id', $comment->post_id(), PDO::PARAM_INT);
    $q->bindValue(':author', $comment->author());
    $q->bindValue(':comment', $comment->comment());

    $q->execute();
  }

  public function delete(Comment $comment)
  {
    $this->_db->exec('DELETE FROM comments WHERE id = '.$comment->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Comment($donnees);
    
  }

  public function getList($post_id)
  {
    $comments = [];

    $q = $this->_db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr FROM comments WHERE post_id = '.$post_id.' ORDER BY comment_date DESC');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($donnees);
    }

    return $comments;
  }

  public function update(Comment $comment)
  {
    $q = $this->_db->prepare('UPDATE comments SET id = :id, post_id = :post_id, author = :author, comment = :comment, comment_date = now() WHERE id = :id');

    $q->bindValue(':id', $comment->id());
    $q->bindValue(':post_id', $comment->post_id(), PDO::PARAM_INT);
    $q->bindValue(':author', $comment->author());
    $q->bindValue(':comment', $comment->comment());

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}