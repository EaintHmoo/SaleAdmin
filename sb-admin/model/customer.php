<?php
include_once __DIR__.'/../includes/db.php';

class Customer{
    //class properties
    private $name;//public (in php class, variables have to private or public)
    private $phno;
    private $email;
    private $debt;
    private $address;
    private $shipping_address;
    //constructor function
    /*public function __construct($name,$phno,$email,$debt,$address,$shipping_address)
    {
        $this->name= $name;
        $this->phno=$phno;
        $this->email=$email;
        $this->debt=$debt;
        $this->address=$address;
        $this->shipping_address=$shipping_address;
    }*/
    //class function
    function display()
    {
        echo $this->name.",".$this->phno.",".$this->email.",".$this->debt.",".$this->address.",".$this->shipping_address."<br>";
    }
    function setName($name){
        $this->name=$name;
    }
    function setPhno($phno){
        $this->phno=$phno;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setDebt($debt){
        $this->debt=$debt;
    }
    function setAddress($address){
        $this->address=$address;
    }
    function setShippingAddress($shippingAddress){
        $this->shipping_address=$shippingAddress;
    }
    //get Methods
    function getName(){
        return $this->name;
    }
    function getPhno(){
        return $this->phno;
    }
    function getEmail(){
        return $this->email;
    }
    function getDebt(){
        return $this->debt;
    }
    function getAddress(){
        return $this->address;
    }
    function getShippingAddress(){
        return $this->shipping_address;
    }

    function createCustomer($name,$phno,$email,$debt,$address,$shipping_address){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="insert into customer(name,email,phone,max_debt,address,ship_address)values(:name,:email,:ph,:debt,:addr,:ship_addr)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":ph",$phno);
        $statement->bindParam(":debt",$debt);
        $statement->bindParam(":addr",$address);
        $statement->bindParam(":ship_addr",$shipping_address);
        //5.execute sql
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function getCustomer()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from customer";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getCustomerSingleline($cid)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from customer where id=:cid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":cid",$cid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateCustomer($cid,$name,$phno,$email,$debt,$address,$shipping_address)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update customer set name=:name,email=:email,phone=:ph,max_debt=:debt,address=:addr,ship_address=:ship_addr where id=:cid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":ph",$phno);
        $statement->bindParam(":debt",$debt);
        $statement->bindParam(":addr",$address);
        $statement->bindParam(":ship_addr",$shipping_address);
        $statement->bindParam(":cid",$cid);
        return $statement->execute();
    }
}

//Object Creation
/*
$customer1 = new Customer("khaing","09888","khaing@gmail.com","0","mdy","mdy");
$customer1->display();
$customer1->setShippingAddress("PyiGyiTagon");
$customer1->display();
$customer2 = new Customer("aye","09888","aye@gmail.com","0","ygn","ygn");
$customer2->display();
echo $customer2->getEmail().'<br>';
*/
class Product{
    private $name;
    private $code;
    private $type;
    
    public function __construct($name,$code,$type){
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
    }

    function display(){
        echo $this->name.",".$this->code.",".$this->type."<br>";
    }

    function setName($name){
        $this->name=$name;
    }
    function setCode($code){
        $this->code=$code;
    }
    function setType($type){
        $this->type=$type;
    }
    
}

/*
$p1=new Product("Noodle","0001","food");
$p2=new Product("Rice Cooker","20009","home electroic accessories");

$p1->display();
$p2->display();

$p1->setCode("0002");
$p2->setCode("0008");

$p1->display();
$p2->display();
*/

//Employee class
class Employee{
    protected $eid;
    protected $name;
    protected $salary;

    public function __construct($eid,$name,$salary){
        $this->eid=$eid;
        $this->name=$name;
        $this->salary=$salary;
    }

    function display(){
        echo $this->eid."<br>".$this->name."<br>".$this->salary."<br>";
    }
}

//Sales Class
class Sales extends Employee{
    private $dept;
    private $bonus;
    public function __construct($eid,$name,$salary,$dept,$bonus){
        //parent::__construct($eid,$name,$salary);
        $this->eid=$eid;
        $this->name=$name;
        $this->salary=$salary;
        $this->dept=$dept;
        $this->bonus=$bonus;
    }
    //function display(){
        //parent::display();
        //echo $this->dept."<br>".$this->bonus."<br>";
    //}
}

//HR Class
class HR extends Employee{
    private $dept;
    private $bonus;
    private $regular_fee;

    public function __construct($eid,$name,$salary,$dept,$bonus,$regular_fee){
        $this->eid=$eid;
        $this->name=$name;
        $this->salary=$salary;
        $this->dept=$dept;
        $this->bonus=$bonus;
        $this->regular_fee=$regular_fee;
    }
    function display(){
        parent::display();
        echo $this->dept."<br>".$this->bonus."<br>".$this->regular_fee."<br><br>";
    }
}
/*
$e1 = new Employee("001","aye",30000);
$e1->display();
echo "<br>";

$emp2= new Sales("002","Hla",30000,"sales and marking",0.7);
$emp2->display();
echo "<br>";

$emp3=new HR("003","Aung",40000,"HR",0.5,2000);
$emp3->display();*/
?>

