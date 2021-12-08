<?php
class Connection {
 
    private $host = 'localhost';
    private $login = 'root';
    private $password = '';
    private $database = 'vydap_projekt';
 
    protected $connection;
 
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = new mysqli($this->host, $this->login, $this->password, $this->database);
 
            if (!$this->connection) {
                echo 'Nemožno sa pripojiť k DB serveru!';
                exit;
            }            
        }    
 
        return $this->connection;
    }

    public function getQuery($sql) {
        if ($this->connection->query($sql) === TRUE) {
            echo "Vloženie záznamu prebehlo v poriadku.";
        } else {
            echo "";//"Chyba: " . $sql . "<br>" . $this->connection->error;
        }
        $this->connection->close();
    }

}
?>