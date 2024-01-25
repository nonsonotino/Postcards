<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getPostcardById($idPostCard){
        $query = "SELECT idPostCard, timeStamp as date, location, image, caption FROM postcard WHERE idPostcard=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPostCard);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByUsername($username){
        $query = "SELECT username, profilePicture FROM user WHERE username = ?"
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQL_ASSOC);
    }

    public function insertPostcard($timeStamp, $location, $image, $caption){
        $query = "INSERT INTO postcard (timeStamp, location, image, caption) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isss',$timeStamp, $location, $image, $caption);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function checkLogin($username, $password){
        $query = "SELECT username, password FROM user WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }    

}
?>