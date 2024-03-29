<?php
class Comment
{
	private $_id;
	private $_post_id;
	private $_author;
	private $_comment;
	private $_comment_date_formatted;
	private $_reports;

	public function __construct($value = array())
	{
		if(!empty($value))
			$this->hydrate($value);
	}

	public function hydrate(array $donnees)
	{

		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	
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
	
	public function comment_date_formatted()
	{
		return $this->_comment_date_formatted;
	}

	public function reports()
	{
		return $this->_reports;
	}
	
	public function setId($id)
	{

		$id = (int) $id;
		
		if ($id > 0)
		{
			$this->_id = $id;
		}
	}

	public function setPost_id($post_id)
	{

		$post_id = (int) $post_id;
		
		if ($post_id > 0)
		{
			$this->_post_id = $post_id;
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

	public function setComment_date_formatted($comment_date_formatted)
	{
		$this->_comment_date_formatted = $comment_date_formatted;
	}

	public function setReports($reports)
	{
		$this->_reports = $reports;
	}

	public function reported()
	{
		$this->_reports++;
	}
	
}
