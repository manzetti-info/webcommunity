<?php

class Database
{
    private $db;
    private $raw_query;
    
    public function __construct()
    {
        require "config.php";
        $this->db = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($this->db->errno)
        {
            echo "Errore di connessione: " . $this->db->error;
            $this->db = null;
        }
        $this->raw_query = "";
    }
    
    public function __destruct()
    {
        $this->db->close();
    }
    
    public function execute()
    {
        return $this->db->query($this->raw_query);
    }
    
    public function getArray($fetch_type)
    {
        $buffer = array();
        $result = $this->execute();
        if (!$result)
            return null;
        while ($row = $result->fetch_array($fetch_type))
        {
            array_push($buffer, $row);
        }
        return $buffer;
    }
    
    public function o($condition)
    {
        $this->raw_query .= " OR " . $condition;
        return $this;
    }
    
    public function a($condition)
    {
        $this->raw_query .= " AND " . $condition;
        return $this;
    }
    
    public function where($condition)
    {
        $this->raw_query .= " WHERE " . $condition;
        return $this;
    }
    
    public function select($fields, $tables)
    {
        $this->raw_query = "SELECT " . $fields . " FROM " . $tables;
        return $this;
    }
    
    public function insert($table, $fields, $values)
    {
        $this->raw_query = "INSERT INTO " . $table . " (" . $fields . ") VALUES (" . $this->stringify($values) . ")";
        return $this;
    }
    
    public function update($table, $values)
    {
        $this->raw_query = "UPDATE " . $table . " SET " . $values;
        return $this;
    }
    
    public function getDatabase()
    {
        return $this->db;
    }
    
    public function setRawQuery($query)
    {
        $this->raw_query = $query;
    }
    
    public function getRawQuery()
    {
        return $this->raw_query;
    }
    
    private function stringify($arg)
    {
        $arg = explode(",", $arg);
        for ($i = 0; $i < count($arg); $i++)
        {
            $arg[$i] = "'" . trim($arg[$i]) . "'";
        }
        return implode(", ", $arg);
    }
}