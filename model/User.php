<?php

class User
{
	private $_id;
	private $_nickname;
	private $_password;
	private $_creation_date;
	private $_role;

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
	
	public function nickname()
	{
		return $this->_nickname;
	}
	
	public function password()
	{
		return $this->_password;
	}

	public function creation_date()
	{
		return $this->_creation_date;
	}

	public function role()
	{
		return $this->_role;
	}
		
	public function setId($id)
	{

		$id = (int) $id;
		
		if ($id > 0)
		{
			$this->_id = $id;
		}
	}
	
	public function setNickname($nickname)
	{

		if (is_string($nickname))
		{
			$this->_nickname = $nickname;
		}
	}
	
	public function setPassword($password)
	{
		
		if (is_string($password))
		{
			password_hash($password, PASSWORD_DEFAULT);
			$this->_password = $password;
		}
	}

	public function setCreation_date($creation_date)
	{
		$this->_creation_date = $creation_date;

	}

	public function setRole($role)
	{
		$this->_role = $role;
	}
	
}
