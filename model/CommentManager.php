  <?php
  class CommentManager extends Database
  {
    private $_db;

    public function __construct()
    {
      $this->_db = $this->getDb();
    }

    public function add(Comment $comment)
    {
      $q = $this->_db->prepare('INSERT INTO comments(post_id, author, comment) VALUES(:post_id, :author, :comment)');

      $q->bindValue(':post_id', $comment->post_id(), PDO::PARAM_INT);
      $q->bindValue(':author', $comment->author());
      $q->bindValue(':comment', $comment->comment());

      $q->execute();
    }

    public function delete($id)
    {
      $this->_db->exec('DELETE FROM comments WHERE id = '.$id);
    }

    public function get($id)
    {
      $id = (int) $id;

      $q = $this->_db->query('SELECT id, post_id, author, comment, reports, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date FROM comments WHERE id = '.$id);
      
      $donnees = $q->fetch(PDO::FETCH_ASSOC);

      return new Comment($donnees);
      
    }

    public function getList($post_id)
    {
      $comments = [];

      $q = $this->_db->query('SELECT id, post_id, author, comment, reports, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date_formatted FROM comments WHERE post_id = '.$post_id.' ORDER BY comment_date DESC');
    

      $test = 0;

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
        $comments[] = new Comment($donnees);
      }


      return $comments;
    }

    public function getUserComments($author)
    {
      $comments = [];

      $q = $this->_db->query('SELECT id, post_id, author, comment, reports, comment_date FROM comments WHERE author = "'.$author.'" ORDER BY comment_date DESC');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
        $comments[] = new Comment($donnees);
      }

      return $comments;
    }

    public function getCommentByReports()
    {
      $comments = [];

      $q = $this->_db->query('SELECT id, post_id, author, comment, reports, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date_formatted FROM comments ORDER BY reports DESC');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
        $comments[] = new Comment($donnees);
      }

      return $comments;
    }


    //Change the name of the deleted User
    public function deleteAuthorName($author)
    {
      $comments = $this->getUserComments($author);

      foreach ($comments as $key => $comment) {
        $comment->setAuthor('Utilisateur supprimé');
        $this->update($comment);
      }
    }

    public function getNumberOfComments($post_id)
    {
      $list_of_comments = $this->getList($post_id);
      $number_of_comments = count($list_of_comments);

      return $number_of_comments;
    }

    public function updateReports(Comment $comment)
    {

      $q = $this->_db->prepare('UPDATE comments SET reports = :reports WHERE id = :id');

      $q->bindValue(':id', $comment->id());
      $q->bindValue(':reports', $comment->reports(), PDO::PARAM_INT);

      $q->execute();

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

  }