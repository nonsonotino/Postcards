<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    /*
     * Query to add a new user into the database  
     */
    public function addNewUser($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $username, $email, $hashedPassword);
        $result = $stmt->execute();

        return $result;
    }

    /*
     * Query to check if the credentials submitted are correct
     */
    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return (count($result) == 0 ? null : (password_verify($password, $result[0]["password"]) ? $result[0] : null));
    }

    /*
     * Query to check if a username is already in use
     */
    public function checkUsernameExists($username)
    {
        $query = "SELECT COUNT(*) as count FROM user WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['count'] > 0;
    }

    /*
     * Query to select a postcard by its id
     */
    public function getPostcardById($idPostCard)
    {
        $query = "SELECT idPostCard, timeStamp as date, location, image, caption FROM postcard WHERE idPostcard=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idPostCard);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * Query to search an user by his username 
     */
    public function getUserByUsername($username)
    {
        $query = "SELECT username, profilePicture FROM user WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQL_ASSOC);
    }

    /*
     * Query to select all the penfriends of a user 
     */
    public function getPenfriends($usernameReceiver)
    {
        $query = "SELECT usernameSender as PenFriends FROM friendship WHERE usernameReceiver=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $usernameReceiver);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQL_ASSOC);
    }

    /*
     * Query to insert a new friendship request 
     */
    public function addFriendship($usernameReceiver, $usernameSender)
    {
        $query = "INSERT INTO friendship (usernameReceiver, usernameSender) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $usernameReceiver, $usernameSender);
        $stmt->execute();

        return $stmt->insert_id;
    }

    /*
     * Query to insert a new postcard in the database
     */
    public function insertPostcard($location, $image, $caption, $username)
    {
        $query = "INSERT INTO postcard (location, image, caption, username) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $location, $image, $caption, $username);
        $result = $stmt->execute();

        return $result;
    }

    /*
     * Query to load the home page of a user
     */
    public function loadHomePage($username)
    {
        $query = "SELECT * " .
            "FROM postcard " .
            "WHERE postcard.username IN (SELECT friendship.usernameSender " .
            "FROM friendship " .
            "WHERE friendship.usernameReceiver = ?)";


        $query .= "ORDER BY timestamp DESC";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * Query to visualize all comments of a postcard
     */
    public function getComments($idPostCard)
    {
        $query = "SELECT username, text FROM comment WHERE idPostcard = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idPostCard);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /*
     * Query to visualize all notifications of a user
     */
    public function getNotifications($username)
    {
        $query = "SELECT username, type, timeStamp FROM notification WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>