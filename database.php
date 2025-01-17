<?php
// To save some time we are going to create a class to hold the database connection information.
// As mentioned in the PDF we will define our class using the class keyword followed by the name of our class.
class Database
{
  // A private keyword, as the name suggests is the one that can only be accessed from within the class in which it is defined. All the keywords are by default under the public category unless they are specified as private or protected.
  private $connection;
  function __construct()
  {
    // In PHP, $this keyword references the current object of the class. The $this keyword allows you to access the properties and methods of the current object within the class using the object operator
    $this->connect_db();
  }
  // The public access modifier allows you to access properties and methods from both inside and outside of the class.
  public function connect_db()
  {
    $this->connection = mysqli_connect('localhost', 'root', '', 'mydb');
  }
  public function getData()
  {
    $query = 'SELECT * FROM phpusers';
    $result = $this->connection->query($query);
    return $result;
  }
  public function execute($name, $age, $email)
  {
    $sql = "INSERT INTO phpusers(name,age,email) VALUES('$name','$age','$email')";
    $result = $this->connection->query($sql);
    if ($result == true) {
      return true;
    }
  }

}
$database = new Database();
?>