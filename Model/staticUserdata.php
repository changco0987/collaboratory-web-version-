<?php


    Class UserLoginData
    {
        public static $id;
        public static $firstName;
        public static $lastName;
        public static $userId = '';
        public static $password;
        public static $birthday;
        public static $gender;
        public static $profilePicName;
        public static $uak;
        public static $email;

        public static function setuserId($data)
        {
            self::$userId = $data;
        }
        public function getuserId()
        {
            return self::$userId;
        }


    }

?>