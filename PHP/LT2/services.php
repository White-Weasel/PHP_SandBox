<?php 
    include "models.php";
    class Service{
        protected mysqli $conn; //protected giống private nhưng dành cho kế thừa
        public function __construct()
        {
            if (isset($_ENV['CLEARDB_DATABASE_URL']))
            {
                $db_url = parse_url($_ENV['CLEARDB_DATABASE_URL']);
                $db_server = $db_url["host"];
                $db_username = $db_url["user"];
                $db_password = $db_url["pass"];
                $db = substr($db_url["path"], 1);

                $this->conn = mysqli_connect($db_server, $db_username, $db_password, $db);
            }
            else{
                $this->conn = mysqli_connect('localhost', 'root', '', 'ltmt');
            }
        }
        public function GetConnection(){
            return $this->conn;
        }
    }
    class AddressService extends Service{
        public function __construct(Service $service=null)
        {
            if(isset($service)){
                $this->conn = $service->GetConnection();
            }
            else parent::__construct();
        }
        public function GetAddress($id){
            if(isset($id)){
                $result = $this->conn->query("SELECT * FROM address WHERE id=$id");
                if($result->num_rows==1){
                    $row=$result->fetch_assoc();
                    $address = new Address($row["province"]);
                    $address->id = $id;
                    return $address;
                }
            }
            return null;
        }
        public function GetAddressAll(){
            $result = $this->conn->query("SELECT id, province FROM address");
            $out = array();
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $address = new Address($row["province"]);
                    $address->id = $row["id"];
                    $out[] = $address;
                }
            }
            return $out;
        }
        public function Create(Address $address){
            if(isset($address)){
                $province = $address->province;
                $result = $this->conn->query("INSERT INTO address(province) VALUES('$province')");
                if($result){
                    $address->id = $this->conn->insert_id;
                    return true;
                }
            }
            return false;
        }
        public function Delete($id){
            if(isset($id)){
                return $this->conn->query("DELETE FROM address WHERE id=$id");
            }
            return false;
        }
        public function Update(Address $address){
            if(isset($address)){
                $id = $address->id;
                $province = $address->province;
                return $this->conn->query("UPDATE address SET province='$province' WHERE id=$id");
            }
            return false;
        }
    }
    class UserService extends Service{
        public function __construct(Service $service=null)
        {
            if(isset($service)){
                $this->conn = $service->GetConnection();
            }
            else parent::__construct();
        }
        public function GetUser($id){
            if(isset($id)){
                $result = $this->conn->query("SELECT * FROM user WHERE id=$id");
                if($result->num_rows==1){
                    $row = $result->fetch_assoc();
                    $user = new User($row["username"],$row["password"],$row["gender"],new Datetime($row["birth"]),explode(",",$row["hobbies"]));
                    $user->id=$id;
                    //Get Address
                    $user->address = (new AddressService($this))->GetAddress($row["address_id"]);
                    return $user;   
                }
            }
            return null;
        }
        public function GetUserAll(){
            $result = $this->conn->query("SELECT * FROM user");
            $out = array();
            while($row = $result->fetch_assoc()){
                $user = new User($row["username"],$row["password"],$row["gender"],new Datetime($row["birth"]),explode(",",$row["hobbies"]));
                $user->id=$row["id"];
                //Get Address
                $user->address = (new AddressService($this))->GetAddress($row["address_id"]);
                $out[] = $user;   
            }
            return $out;
        }
        public function Authenticate(){
            if(session_id()=='')session_start();
            return isset($_SESSION["username"])&&isset($_SESSION["user_id"]);
        }
        public function Login($username, $password){
            if(isset($username)&&isset($password)){
                $result = $this->conn->query("SELECT * FROM user WHERE username='$username' and password='$password'");
                if($result->num_rows==1){
                    session_start();
                    $_SESSION["user_id"] = $result->fetch_assoc()["id"];
                    $_SESSION["username"] = $username;
                    return true;
                }
            }
            return false;
        }
        public function Logout(){
            if(session_id()=='')session_start();
            session_destroy();
        }
        public function AccountExsit($username){
            if(isset($username)){
                $result = $this->conn->query("SELECT * FROM user WHERE username='$username'");
                return $result->num_rows==1;
            }
            throw new Exception("Tham số truyền vào không hợp lệ");
        }
        public function Update($user){
            if(isset($user)){
                $id=$user->id;
                $username = $user->username;
                $password = $user->password;
                $gender = $user->gender;
                $birth =  $user->birth->format('Y-m-d');

                $hobbies = null;
                if(isset($user->hobbies))$hobbies = join(',',$user->hobbies);
                
                $address_id = null;
                if(isset($user->address))$address_id = $user->address->id;
                $result = $this->conn->prepare("UPDATE user SET username=?,password=?, gender=?,birth=?,hobbies=?,address_id=? WHERE id=?");
                $result->bind_param("sssssii",$username,$password,$gender,$birth,$hobbies,$address_id,$id);
                return $result->execute();
            }
            return false;
        }
        public function SignUp($user){
            if(isset($user)){
                $username = $user->username;
                $password = $user->password;
                $gender = $user->gender;
                $birth =  $user->birth->format('Y-m-d');
                $hobbies = isset($user->hobbies)? join(',',$user->hobbies): null;
                $address_id = $user->address->id;
                
                $result = $this->conn->prepare("INSERT INTO user(username,password,gender,birth,hobbies,address_id) VALUES(?,?,?,?,?,?)");
                $result->bind_param("sssssi",$username,$password,$gender,$birth,$hobbies,$address_id);
                if($result->execute()){
                    $user->id = $result->insert_id;
                    return true;
                }
            }
            return false;
        }
        public function Delete($id){
            if(isset($id)){
                return $this->conn->query("DELETE FROM user WHERE id=$id");
            }
            return false;
        }  
    }
?>