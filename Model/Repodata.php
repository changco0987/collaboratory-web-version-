<?php
    class Repodata{

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

        #repositoryName
        private $repositoryName;
        public function getRepositoryName()
        {
            return $this->repositoryName;
        }

        public function setRepositoryName($repositoryName)
        {
            $this->repositoryName = $repositoryName;
        }

        #members
        private $members = array();
        public function getMembers()
        {
            return $this->members;
        }

        public function setMembers($members = array())
        {
            $this->members[] = $members;
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
    }
?>