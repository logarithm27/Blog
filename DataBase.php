<?php


class DataBase 
{
    const HOST = 'localhost';
	private $bdd = 'blogdb';
	const USER = 'root';
	const PASSWORD = 'root';

	public function connection()
    {
		try
        {
			return new PDO('mysql:host='.self::HOST.';dbname='.$this->bdd, self::USER, self::PASSWORD);
		}
		catch(Exception $ex)
        {
			die('Error : '. $ex->getMessage());
		}
	}
}

?>