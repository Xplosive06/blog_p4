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

    echo "fonction add() appellée";

    $q->execute();
  }

  public function delete($id)
  {
    $this->_db->exec('DELETE FROM comments WHERE id = '.$id);
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, post_id, author, comment, reports, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date FROM comments WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Comment($donnees);
    
  }

  public function getList($post_id)
  {
    $comments = [];

    $q = $this->_db->query('SELECT id, post_id, author, comment, reports, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date FROM comments WHERE post_id = '.$post_id.' ORDER BY comment_date DESC');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($donnees);
    }

    return $comments;
  }

  public function getNumberOfComments($post_id){
    $list_of_comments = $this->getList($post_id);
    $number_of_comments = count($list_of_comments);

    return $number_of_comments;
  }

  public function update(Comment $comment)
  {
    $q = $this->_db->prepare('UPDATE comments SET id = :id, post_id = :post_id, author = :author, comment = :comment, reports = :reports, comment_date = now() WHERE id = :id');

    $q->bindValue(':id', $comment->id());
    $q->bindValue(':post_id', $comment->post_id(), PDO::PARAM_INT);
    $q->bindValue(':author', $comment->author());
    $q->bindValue(':comment', $comment->comment());
    $q->bindValue(':reports', $comment->reports(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}