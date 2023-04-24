<?php 



 abstract class Db  {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'cpn#2010';
    private $dbname = 'poo_blog';

    public PDO $pdo;
    public $error;

    
  
    
  
    public function __construct() {
      // Set DSN
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
  
      // Set options
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
  
      // Create a new PDO instance
      try {
        $this->pdo = new \PDO($dsn, $this->user, $this->pass, $options);
      
      } catch (PDOException $e) {
        $this->error = $e->getMessage();
      }
    }


   

  
 
}

