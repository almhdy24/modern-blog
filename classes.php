<?php
class DB {
             protected $conn;
          public     function __construct() {
$sring =  "mysql:host=localhost;dbname=db";
$this->conn=  new PDO ($sring, "root","");
} 
         public function write($query, $data = array()) {
       $stm =  $this->conn->prepare($query);
       $check = $stm->execute($data);
              
              if ($check) {
              return true;
              }
              return false
              }    
           public function   read($query, $data = array()) {
              $stm =  $this->conn->prepare($query);
              $check = $stm->execute($data);
              
              if ($check) {
              $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
              if (is_array($rows) && count($rows) >0) {
                return $rows;
        }
              return false
     }
               }
                    }
class User {
protected $errors = array();
    public function create($POST) {
    $this->errors = array();
$username = $POST['username'];
$email = $POST['email'];
$password = $POST['password'];
// validateion
if (empty($username)) {
$this->errors[] = "Please enter valid username";
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL )) {
  $this->errors[] = "Please enter valid email";
  }
  if (strlen($password) < 6) {
  $this->errors[] = "Password must be at least 6 characters";
  }
// data saving
    if (count($this->errors) == 0)
    {
    $POST['date']  = date ("Y-m-d H:i:s");
    $POST['password'] = hash("sha1, $POST['password']");  
    $query = "INSERT INST users (username,password,email,date) VALUES (:username, :password , :email , :date)";
    $db = new DB();
    $db->write($query, $POST);
    }
   return $this->errors;
   }
   public function login($POST){
   $POST['password'] = hash ("sha1", $POST['password']);
   $query= "SELECT * FROM users  where email =:email && password =:password limit 1";
   $db = new DB();
   $data=$db->read($query, $POST);
   if (is_array($data)){
   $_SESSION['user'] =$data['username'];
   }else{
   $this->errors[] = "Wrong user name or password ";
   }
   return $this->errors;
   }
   }
   
?>