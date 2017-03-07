<?php

class Database {
    public $isConn;
    protected $datab;
//  connect to db
    public function __construct($username ="root", $password = "", $host = "localhost", $dbname = 'company', $options = []){
        $this->isConn = true;
        try{
            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

//  disconnect from db
    public function Disconnect(){
        $this->datab = null;
        $this->isConn = false;
    }

//  get row
public function getRow($query, $params = []){
    try{
        $stmt = $this->datab->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch();
    } catch(PDOException $e){
        throw new Exception($e->getMessage());
    }
}

//  get rows
public function getRows(){
    try{
        $stmt = $this->datab->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch(PDOException $e){
        throw new Exception($e->getMessage());
    }
}

//  insert row
public function insertRow($query, $params = []){
    try{
        $stmt = $this->datab->prepare($query);
        $stmt->execute($params);
        return true;
    } catch(PDOException $e){
        throw new Exception($e->getMessage());
    }
}

//update row
public function updateRow($query, $params = []){
    $this->insertRow($query, $params);
}

//delete row
public function deleteRow($query, $params = []){
    $this->insertRow($query, $params);
}

}