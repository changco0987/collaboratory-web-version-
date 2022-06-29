<?php
class Updatedata{

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

    #title
    private $title;
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    #filename
    private $filename;
    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    #note
    private $note;
    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    #postDatetime
    private $postDatetime;
    public function getPostDatetime()
    {
        return $this->postDatetime;
    }

    public function setPostDatetime($postDatetime)
    {
        $this->postDatetime = $postDatetime;
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
    

    #repositoryId
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