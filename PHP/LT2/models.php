<?php
    class Address{
        public $id;
        public $province;//Tỉnh
        public function __construct($id=null,$province=null)
        {
            $this->id=$id;
            $this->province=$province;
        }
    }
    class User{
        public $id, $username, $password, $gender, $birth,$hobbies,$address;
        public function __construct($id=null,$username=null,$password=null,$gender=null,$birth=null,$hobbies=null,$address=null)
        {
            $this->id=$id;
            $this->username=$username;
            $this->password=$password;
            $this->gender=$gender;
            $this->birth=$birth;
            $this->hobbies=$hobbies;
            $this->address=$address;
        }
    }
?>