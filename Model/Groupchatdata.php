<?php
    class Groupchatdata
    {
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
 
         #repositoryid
         private $repositoryId;
         public function getRepositoryId()
         {
             return $this->repositoryId;
         }
 
         public function setRepositoryId($repositoryId)
         {
             $this->repositoryId = $repositoryId;
         }
    }

?>