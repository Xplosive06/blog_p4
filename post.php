<?php
class Post
{
	private $_id;
	private $_title;
	private $_content;
	private $_creation_date;

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
	
	public function title()
	{
		return $this->_title;
	}
	
	public function content()
	{
		return $this->_content;
	}
	
	public function creation_date()
	{
		return $this->_creation_date;
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

	public function setCreation_date($creation_date)
	{
		$this->_creation_date = $creation_date;

	}
	
}
?>