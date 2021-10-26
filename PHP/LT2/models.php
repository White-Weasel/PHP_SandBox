<?php
    class Address{
        public ?int $id;
        public ?string $province;//Tỉnh
        public function __construct(?string $province=null)
        {
            $this->id=null;
            $this->province=$province;
        }
    }
    class User{
        public ?int $id;
        public ?string $username, $password, $gender;
        public ?DateTime $birth;
        public ?array $hobbies;
        public ?Address $address;
        public function __construct(?string $username=null,?string $password=null,?string $gender=null,?Datetime $birth=null,?array $hobbies=null,?Address $address=null)
        {
            $this->id=null;
            $this->username=$username;
            $this->password=$password;
            $this->gender=$gender;
            $this->birth=$birth;
            $this->hobbies=$hobbies;
            $this->address=$address;
        }
    }
?>