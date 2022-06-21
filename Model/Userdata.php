<?php
    class Userdata{

        #id
        private $id;
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        #firstname
        private $firstName;
        public function getFirstName()
        {
            return $this->firstName;
        }

        public function setFirstName($firstName)
        {
            $this->firstName = strtolower($firstName);
        }

        #lastname
        private $lastName;
        public function getLastName()
        {
            return $this->lastName;
        }

        public function setLastName($lastName)
        {
            $this->lastName = strtolower($lastName);
        }

        #userId
        private $userId;
        public function getUserId()
        {
            return $this->userId;
        }

        public function setUserId($userId)
        {
            $this->userId = strtolower($userId);
        }

        #password
        private $password;
        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            //This will hash the string to SHA256 
            $this->password = strtoupper(hash('sha256',$password));
        }

        #birthday
        private $birthday;
        public function getBirthday()
        {
            return $this->birthday;
        }

        public function setBirthday($birthday)
        {
            $this->birthday = $birthday;
        }

        #gender
        private $gender;
        public function getGender()
        {
            return $this->gender;
        }

        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        #profilePicName
        private $profilePicName;
        public function getProfilePicName()
        {
            return $this->profilePicName;
        }

        public function setProfilePicName($profilePicName)
        {
            $this->profilePicName = $profilePicName;
        }

        #uak
        private $uak;
        public function getUak()
        {
            return $this->uak;
        }

        public function setUak($uak)
        {
            $this->uak = $uak;
        }

        #email
        private $email;
        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

    }


   

?>