<?php 
    class User{
        public int $id;
        public string $username, $password, $gender;
        public DateTime $birth;
        public array $hobbies;
    }
    class UserService{

        private mysqli $conn;
        public function __construct()
        {
            $this->conn = mysqli_connect("localhost","root","","ltmt");
        }
        public function GetUser(int $id){
            $result = $this->conn->query("SELECT username,password,gender,birth,hobbies FROM user WHERE id=$id");
            if($result->num_rows==1){
                $result->fetch_assoc();
                $user = new User();
                $user->id=$id;
                $user->username = $result["username"];
                $user->password = $result["password"];
                $user->gender = $result["gender"];
                $user->birth = new Datetime($result["birth"]);
                $user->hobbies = explode(",",$result["hobbies"]);
                return $user;   
            }
            return null;
        }
        public function GetUserAll(){
            $result = $this->conn->query("SELECT id, username,password,gender,birth,hobbies FROM user");
            $out = array();
            while($row = $result->fetch_assoc()){
                $user = new User();
                $user->id=$row["id"];
                $user->username = $row["username"];
                $user->password = $row["password"];
                $user->gender = $row["gender"];
                $user->birth = new Datetime($row["birth"]);
                $user->hobbies = explode(",",$row["hobbies"]);
                $out[] = $user;   
            }
            return $out;
        }
        public function Authenticate(){
            if(session_id()=='')session_start();
            return isset($_SESSION["username"])&&isset($_SESSION["user_id"]);
        }
        public function Login($username, $password){
            $result = $this->conn->query("SELECT * FROM user WHERE username='$username' and password='$password'");
            if($result->num_rows==1){
                session_start();
                $_SESSION["user_id"] = $result->fetch_assoc()["id"];
                $_SESSION["username"] = $username;
                return true;
            }
            return false;
        }
        public function Logout(){
            if(session_id()=='')session_start();
            session_destroy();
        }
        public function AccountExsit(string $username){
            if(isset($username)){
                $result = $this->conn->query("SELECT * FROM user WHERE username='$username'");
                return $result->num_rows==1;
            }
            return true;
        }
        public function SignUp(User $user){
            if(isset($user)){
                $username = $user->username;
                $password = $user->password;
                $gender = $user->gender; 
                $birth = $user->birth->format('Y-m-d');
                $hobbies = "";
                if(isset($user->hobbies)){
                    //Hàm join nối chuỗi từ một mảng ngăn cách bởi một kí tự hoặc chuỗi kí tự
                    $hobbies = join(",",$user->hobbies);
                }
                $result = $this->conn->query("INSERT INTO user(username,password,gender,birth,hobbies) VALUES('$username','$password','$gender','$birth','$hobbies')");
                if($result){
                    $user->id = $this->conn->insert_id;
                    return true;
                }
            }
            return false;
        }
        public function Delete(int $id){
            if(isset($id)){
                return $this->conn->query("DELETE FROM user WHERE id=$id");
            }
            return false;
        }  
    }
?>