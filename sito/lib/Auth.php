<?php

class Auth
{
    private $db;
    private $session;
    
    public function __construct($db, $session)
    {
        $this->db = $db;
        $this->session = $session;
        if ($session)
        {
            session_start();
        }
    }
    
    public function __destruct()
    {
		
    }
    
    public function login($email, $password)
    {
        $result = $this->db->select("Email, Pass", "Utenti")->getArray(MYSQL_ASSOC);
        if ($result !== FALSE)
        {
            foreach ($result as $user)
            {
                if ($user["Email"] == $email)
                {
                    if ($user["Pass"] == $password)
                    {
                        echo "Login effettuato";
                        $token = md5($this->db->select("id", "Utenti")->where("Email = '" . $email . '"')->getArray(MYSQLI_NUM)[0] . uniqid() . time());
                        $this->db->update("Utenti", "Token = '". $token . "'")->execute();
                        if ($this->session)
                        {
                            $_SESSION["Token"] = $token;
                        }
                        return;
                    }
                    else
                    {
                        echo "Password errata";
                        return;
                    }
                }
            }
            echo "Utente inesistente";
        }
        else
        {
            echo "Errore nel login";
        }
    }
    
    public function logout()
    {
        if ($this->session)
        {
            session_destroy();
        }
    }
    
    public function register($email, $password)
    {
        $cred = $email . ", " . $password;
        $result = $this->db->insert("Utenti", "Email, Pass", $cred)->execute();
        if ($result !== FALSE)
        {
            echo "Utente registrato";
            $token = md5($this->db->select("id", "Utenti")->where("Email = '" . $email . '"')->getArray(MYSQLI_NUM)[0] . uniqid() . time());
            $this->db->update("Utenti", "Token = '". $token . "'")->execute();
            if ($this->session)
            {
                $_SESSION["Token"] = $token;
            }
            return;
        }
        else
        {
            echo "Si &egrave; verificato un errore durante la registrazione<br />";
            echo $this->db->getDatabase()->error;
        }
    }
}
