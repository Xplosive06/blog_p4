  <?php
  class PostManager extends Database
  {
    private $_db;

    public function __construct()
    {
      $this->_db = $this->getDb();
    }

    public function add(Post $post)
    {
      $q = $this->_db->prepare('INSERT INTO posts(title, content, image) VALUES(:title, :content, :image)');

      $q->bindValue(':title', $post->title());
      $q->bindValue(':content', $post->content());
      $q->bindValue(':image', $post->image());

      $q->execute();
    }

    public function delete(Post $post)
    {
      if($post->image()) {

        $image_to_delete = ROOT.$post->image();

        if (file_exists($image_to_delete)) {

          unlink($image_to_delete);

        } else {

          echo " L'image n'existe pas ou plus";

        }

      }

      $this->_db->exec('DELETE FROM posts WHERE id = '.$post->id());
    }

    public function get($id)
    {
      $id = (int) $id;

      $q = $this->_db->query('SELECT id, title, content, image, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%i") AS creation_date_formatted FROM posts WHERE id = '.$id);

      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      
      return new Post($donnees);

    }

    public function getList()
    {
      $posts = [];

      $q = $this->_db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%i") AS creation_date_formatted FROM posts ORDER BY creation_date DESC');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
        $posts[] = new Post($donnees);
      }

      return $posts;
    }

    public function update(Post $post)
    {
      $q = $this->_db->prepare('UPDATE posts SET id = :id, title = :title, image = :image, content = :content, creation_date = now() WHERE id = :id');

      $q->bindValue(':id', $post->id(), PDO::PARAM_INT);
      $q->bindValue(':title', $post->title());
      $q->bindValue(':content', $post->content());
      $q->bindValue(':image', $post->image());

      $q->execute();
    }
  }