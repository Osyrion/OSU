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
                echo '<div class="container my-5"><div class="alert alert-danger">Nemožno sa pripojiť k DB serveru!</div></div>';
                exit;
            }            
        }    
 
        return $this->connection;
    }

    public function getQuery($sql) {
        if ($this->connection->query($sql) === TRUE) {
            $_SESSION['message'] = "<div class=\"container my-5\"><div class=\"alert alert-success\">Vloženie záznamu prebehlo v poriadku.</div></div>";
        } else {
            $_SESSION['message'] = "<div class=\"container my-5\"><div class=\"alert alert-danger\">Chyba: " . $sql . "<br>" . $this->connection->error . "</div></div>";
        }
        $this->connection->close();
    }

}
?>