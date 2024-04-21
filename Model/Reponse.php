<?php
class Reponse
{
    private ?int $idrep = null;
    private ?string $messagerep = null;
    private ?string $emailrep = null;
    private ?string $idrec = null;
    

    
    public function __construct($id = null, $e, $m, $d)
    {
        $this->idrep = $id;
        $this->messagerep = $m;
        $this->emailrep = $e;
        $this->idrec = $d;
        
    }

    /**
     * Get the value of idrep
     */
    public function getidrep()
    {
        return $this->idrep;
    }

    /**
     * Get the value of messagerep
     */
    public function getmessagerep()
    {
        return $this->messagerep;
    }

    /**
     * Set the value of messagerep
     *
     * @return  self
     */
    public function setmessagerep($messagerep)
    {
        $this->messagerep = $messagerep;

        return $this;
    }

    /**
     * Get the value of emailrep
     */
    public function getemailrep()
    {
        return $this->emailrep;
    }

    /**
     * Set the value of emailrep
     *
     * @return  self
     */
    public function setemailrep($emailrep)
    {
        $this->emailrep = $emailrep;

        return $this;
    }

    /**
     * Get the value of idrec
     */
    public function getidrec()
    {
        return $this->idrec;
    }

    /**
     * Set the value of idrec
     *
     * @return  self
     */
    public function setidrec($idrec)
    {
        $this->idrec = $idrec;

        return $this;
    }
    



}
