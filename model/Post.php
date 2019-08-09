<?php

class Post
{
	private $_id;
	private $_title;
	private $_content;
	private $_image;
	private $_creation_date_formatted;

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
	
	public function title()
	{
		return $this->_title;
	}
	
	public function content()
	{
		return $this->_content;
	}

		public function image()
	{
		return $this->_image;
	}
	
	public function creation_date_formatted()
	{
		return $this->_creation_date_formatted;
	}

	public function getPreview()
	{

		if(strlen($this->content()) > 200) {
			// Find the first ' ' in the string and get the 200 firsts caracters
			$pos = strpos($this->content(), ' ', 200);
			$result = substr($this->content(), 0, $pos); 

			return $result.' ...';

		}else {

			return $this->content();
		}
	}
	
	public function setId($id)
	{

		$id = (int) $id;
		
		if ($id > 0)
		{
			$this->_id = $id;
		}
	}
	
	public function setTitle($title)
	{

		if (is_string($title))
		{
			$this->_title = $title;
		}
	}
	
	public function setContent($content)
	{
		
		if (is_string($content))
		{
			$this->_content = $content;
		}
	}

	public function setImage($image = NULL)
	{

		$this->_image = $image;

	}

	public function setCreation_date_formatted($creation_date_formatted)
	{
		$this->_creation_date_formatted = $creation_date_formatted;

	}
	
}
