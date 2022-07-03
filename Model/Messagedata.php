<?php
    class Messagedata{

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

        #message
        private $message;
        public function getMessage()
        {
            return $this->message;
        }

        public function setMessage($message)
        {
            $this->message = $message;
        }

        #sent date
        private $sentDate;
        public function getSentDate()
        {
            return $this->sentDate;
        }

        public function setSentDate($sentDate)
        {
            $this->sentDate = $sentDate;
        }
        
        #accountId
        private $accountId;
        public function getAccountId()
        {
            return $this->accountId;
        }

        public function setAccountId($accountId)
        {
            $this->accountId = $accountId;
        }
        

        #groupchatId
        private $groupchatId;
        public function getGroupchatId()
        {
            return $this->groupchatId;
        }

        public function setGroupchatId($groupchatId)
        {
            $this->groupchatId = $groupchatId;
        }
    }
?>