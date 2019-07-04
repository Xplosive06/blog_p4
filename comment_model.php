<?php
class Comment
{
	private $_id;
	private $_post_id;
	private $_author;
	private $_comment;
	private $_comment_date;

	public function __construct($value = array())
	{
		if(!empty($value))
			$this->hydrate($value);
	}

	// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	public function hydrate(array $donnees)
	{

		foreach ($donnees as $key => $value)
		{
    // On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);
			
    // Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
      // On appelle le setter.
				$this->$method($value);
			}
		}
	}

  // Liste des getters
	
	public function id()
	{
		return $this->_id;
	}	

	public function post_id()
	{
		return $this->_post_id;
	}
	
	public function author()
	{
		return $this->_author;
	}
	
	public function comment()
	{
		return $this->_comment;
	}
	
	public function comment_date()
	{
		return $this->_comment_date;
	}
	
  // Liste des setters
	
	public function setId($id)
	{

		$id = (int) $id;
		
		if ($id > 0)
		{
			$this->_id = $id;
		}
	}

	public function setPost_id($author_id)
	{

		$author_id = (int) $author_id;
		
		if ($author_id > 0)
		{
			$this->_author_id = $author_id;
		}
	}
	
	public function setAuthor($author)
	{

		if (is_string($author))
		{
			$this->_author = $author;
		}
	}
	
	public function setComment($comment)
	{
		
		if (is_string($comment))
		{
			$this->_comment = $comment;
		}
	}

	public function setComment_date($comment_date)
	{
		$this->_comment_date = $comment_date;

	}
	
}
