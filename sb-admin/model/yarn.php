<?php
include_once __DIR__.'/../includes/db.php';

class Yarn{
    //class properties
    private $yarn_name;
    private $yarn_type;
    function display()
    {
        echo $this->yarn_name.",".$this->yarn_type."<br>";
    }
    function setYarnName($yarn_name){
        $this->yarn_name=$yarn_name;
    }
    function setYarnType($yarn_type){
        $this->yarn_type=$yarn_type;
    }
    //get Methods
    function getYarnName(){
        return $this->yarn_name;
    }
    function getYarnType(){
        return $this->yarn_type;
    }

    function createYarn($yarn_name,$yarn_type){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="insert into yarn(yarn_name,yarn_type)values(:name,:type)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$yarn_name);
        $statement->bindParam(":type",$yarn_type);
        //5.execute sql
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function getYarn()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from yarn";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    function getYarnSingleLine($yid)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from yarn where id=:yid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":yid",$yid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function updateYarn($yid,$yarn_name,$yarn_type)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update yarn set yarn_name=:name,yarn_type=:type where id=:yid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$yarn_name);
        $statement->bindParam(":type",$yarn_type);
        $statement->bindParam(":yid",$yid);
        return $statement->execute();
    }
}
