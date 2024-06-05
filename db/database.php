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
    public function addNewUser($username, $email, $password, $profilePicture)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, email, password, profilePicture) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $username, $email, $hashedPassword);
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
        $query = "SELECT * FROM postcard WHERE idPostcard=?";
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

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * Query to select all the penfriends of a user 
     */
    public function getPenfriends($username)
    {
        $query = "SELECT COUNT(usernameSender) as penFriends " .
            " FROM friendship " .
            " WHERE usernameReceiver = ? " .
            " GROUP BY usernameSender";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * Query to select all the penfriends followed by a user 
     */
    public function getPenfriendsFollowed($username)
    {
        $query = "SELECT COUNT(usernameReceiver) as penFriendsFollowed " .
            " FROM friendship " .
            " WHERE usernameSender = ? " .
            " GROUP BY usernameReceiver";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * Query to insert a new friendship  
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
     * Query to remove a friendship 
     */
    public function removeFriendship($usernameReceiver, $usernameSender)
    {
        $query = "DELETE FROM friendship WHERE usernameReceiver = ? AND usernameSender = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $usernameReceiver, $usernameSender);
        $stmt->execute();

        return $stmt->affected_rows;
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
     * Query to insert the profile picture of a user in the database
     */
    public function insertProfilePicture($profilePicture, $username)
    {
        $query = "UPDATE user 
                  SET profilePicture = ? 
                  WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $profilePicture, $username);
        $result = $stmt->execute();

        return $result;
    }

    /*
     * Query to check if a user is the owner of a comment
     */
    public function isCommentOwner($commentId, $username)
    {
        $query = "SELECT COUNT(*) as count FROM comment WHERE idComment = ? AND username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $commentId, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['count'] > 0;
    }

    /*
     * Query to insert a new comment in the database
     */
    public function addComment($idPostCard, $text, $username)
    {
        $query = "INSERT INTO comment (idPostcard, text, username) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iss', $idPostCard, $text, $username);
        $result = $stmt->execute();

        return $result;
    }

    /*
     * Query to remove a comment from the database
     */
    public function deleteComment($commentId)
    {
        $query = "DELETE FROM comment WHERE idComment = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $commentId);
        $result = $stmt->execute();

        return $result;
    }

    /*
     * Query to load the home page of a user
     */
    public function loadHomePage($username)
    {
        $query = "SELECT p.idPostCard, p.timeStamp, p.location, p.image, p.caption, p.username, u.profilePicture 
            FROM postcard p
            JOIN user u ON p.username = u.username 
            WHERE p.username IN (SELECT f.usernameReceiver 
            FROM friendship f
            WHERE f.usernameSender = ?) 
            ORDER BY p.timestamp DESC";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * Query to load the profile page of a user
     */
    public function getUserProfile($username)
    {
        $query = "SELECT u.username, u.profilePicture
              FROM user u
              WHERE u.username = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function loadUserPostcards($username)
    {
        $query = "SELECT * 
            FROM postcard p
            WHERE p.username = ?
            ORDER BY p.timeStamp DESC";

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
        $query = "SELECT c.idComment, c.username, c.text, c.timeStamp, u.profilePicture 
                  FROM comment c
                  JOIN user u ON c.username = u.username
                  WHERE idPostcard = ?
                  ORDER BY c.timeStamp DESC";
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
        $query = "SELECT sender, timeStamp, type FROM notification WHERE receiver = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Query to get all the usernames matching a text
     */
    public function searchUsers($currentUserUsername, $username)
    {
        $username = "%" . $username . "%";
        $stmt = $this->db->prepare("SELECT * FROM user WHERE user.username LIKE ? AND user.username <> ? ORDER BY username");
        $stmt->bind_param('ss', $username, $currentUserUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>