<?php

class Database
{
	
	public function getDb(){
		$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');

		return $db;

	}
}