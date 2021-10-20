<?php
    class data
    {
        public $conn;
        function __construct() 
        {
            $db_url = parse_url("mysql://b5d2c6913e493e:ea6dbeda@eu-cdbr-west-01.cleardb.com/heroku_1832b1002170d0d?reconnect=true");
            $db_server = $db_url["host"];
            $db_username = $db_url["user"];
            $db_password = $db_url["pass"];
            $db = substr($db_url["path"], 1);

            $this->conn = mysqli_connect($db_server, $db_username, $db_password, $db);

            
        }

        public function insert_student($DATA)
        {
            $username = $DATA['name'];
            $password = $DATA['pass'];
            $birth = $DATA['date'];
            $gender = $DATA['gt'];
            $hobby = json_encode($DATA['st']);

            $query = "Insert into sinhvien (username, password, birth, gender, hobby)
                        values ('".$username."', '".$password."', '".$birth."', '".$gender."', '".$hobby."')";
            $run = mysqli_query($this->conn, $query);
            return $run;
        }
    }
?>