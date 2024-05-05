<?php
class Reclamation
{
    private ?int $idrec = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $message = null;
    private ?string $subject = null;
    private ?int $idclient = null;

    
    public function __construct($id = null, $e, $m, $d, $s, $idclient)
    {
        $this->idrec = $id;
        $this->name = $e;
        $this->email = $m;
        $this->message = $d;
        $this->subject = $s;
        $this->idclient = $idclient;
    }

    /**
     * Get the value of idrec
     */
    public function getidrec()
    {
        return $this->idrec;
    }

    /**
     * Get the value of name
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setname($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getmessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setmessage($message)
    {
        $this->message = $message;

        return $this;
    }
    public function getsubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setsubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
    public function getidclient()
    {
        return $this->idclient;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setidclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }


}
class ReclamationN
{
    private ?int $idrec = null;
    private ?string $message = null;
    private ?string $subject = null;
    private ?int $idclient = null;

    
    public function __construct($id = null, $d, $s, $idclient)
    {
        $this->idrec = $id;
        $this->message = $d;
        $this->subject = $s;
        $this->idclient = $idclient;
    }

    /**
     * Get the value of idrec
     */
    public function getidrec()
    {
        return $this->idrec;
    }

   
    /**
     * Get the value of message
     */
    public function getmessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setmessage($message)
    {
        $this->message = $message;

        return $this;
    }
    public function getsubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setsubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
    public function getidclient()
    {
        return $this->idclient;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setidclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }


}

class infoclient
{
    private ?string $idclient = null;
    private ?string $name = null;
    private ?string $email = null;
   

    
    public function __construct($id = null, $e, $m)
    {
        $this->idclient = $id;
        $this->name = $e;
        $this->email = $m;
       
    }

    /**
     * Get the value of idrec
     */
    public function getid()
    {
        return $this->idclient;
    }

    /**
     * Get the value of name
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setname($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

}