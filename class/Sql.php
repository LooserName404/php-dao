<?php

  class Sql extends PDO {

    private $conn;

    public function __construct(){

      $this->conn = new PDO("pgsql:host=localhost;dbname=php", "postgres", "thyago1");

    }

    public function setParameters($statement, $parameters = array()){

      foreach ($parameters as $key => $value) {

        $this->setParameter($key,$value);

      }

    }

    private function setParameter($statement, $key, $value){

      $statement->bindParam($key,$value);

    }

    public function query($rawQuery, $params = array()){

      $stmt = $this->conn->prepare($rawQuery);

      $this->setParameters($stmt,$params);

      $stmt->execute();

      return $stmt;

    }

    public function select($rawQuery, $params = array()):array{

      $stmt = $this->query($rawQuery, $params);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

  }

 ?>
