<?php


class DB extends mysqli {
    // private $dbHost     = "pluto.hood.edu";
    // private $dbUsername = "jia2";
    // private $dbPassword = "password";
    // private $dbName     = "cifdb";
    private $dbHost    ;
    private $dbUsername;
    private $dbPassword;
    private $dbName    ;

    public $db;

    public function __construct() {
        if(!isset($this->db)){

            include('conn.php');


            $this->dbHost     = $dbHost;
            $this->dbUsername = $dbUsername;
            $this->dbPassword = $dbPassword;
            $this->dbName     = $dbName;

            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    public function store_profile_results($sql){
        $result = $this->db->query("SELECT * FROM profile WHERE ID = {$_SESSION['user']['ID']}");
            if ($result){
                $result = $result->fetch_assoc();
            // $result['status'] = 1;
            if ($result) {
                $this->db->query("DELETE FROM profile WHERE ID = {$_SESSION['user']['ID']}");
            }
               $result = $this->db->query($sql);
                echo $this->db->error;
                echo $sql;
                return $result;
            }
        
    }


    public function get_profile_data($ID){
        $result = $this->db->query("SELECT * FROM profile WHERE ID = {$ID}");
    
        if($result) {
 
            $result = $result->fetch_assoc();
            // $result['status'] = 1;
            if ($result) {
                return $result;
            } 
 
            return array('status' => 'error');
        }
    }

    public function store_vector_results($sql){
            $result = $this->db->query($sql);
                echo $this->db->error;
            return $result;
    }

    public function check_credentials($email = '', $password = '') {
        $sql = $this->db->query("SELECT * FROM user WHERE email = '".md5($email)."' AND password = '". md5($password) ."'");
 
        if($sql) {
 
            $result = $sql->fetch_assoc();
            // $result['status'] = 1;
            if ($result) {
                return $result;
            }
 
            return array('status' => 'error', 'message' => 'Email or password is invalid.');
        }
         
        return array('status' => 'error', 'message' => 'Email or password is invalid.');
    }


public function insert_user($arr_data = array()) {
    
    $stmt = $this->db->prepare("INSERT INTO user (email, password, join_date) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $arr_data['email'], $arr_data['password'], $arr_data['join_date']);
    $result = $stmt->execute();

    if($result){ // user has been inserted successfully
        $result=$this->db->query("SELECT * FROM user WHERE email = '".$arr_data['email']."'");
        $row=$result->fetch_array(); // Row which includes the information of the user
        return $row;
    }
    else{
        echo $this->db->error;
        exit();
    }

    return $result;

}

public function email_exists($email = '') {
    $sql = $this->db->query("SELECT id FROM user WHERE email = '".md5($email)."'");

    if($sql->num_rows) {
        return true;
    }

    return false;
}
}