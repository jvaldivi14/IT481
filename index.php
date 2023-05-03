<?php
include_once 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Customers</title>
  <meta charset="UTF-8">
</head>
<body>
  <h1>Customers</h1>
<?php
$serverName = "PurdueGlobal-jv\SQLEXPRESS";
$database = "Northwind";
$uid = "";
$pass = "";

$db = new Database($serverName, $database, $uid, $pass);

$numberOfCustomers = $db->getNumberOfCustomers();
$customerLastNames = $db->getCustomerLastNames();

        if(isset($_POST['button1'])) {
            echo "Number of customers: " . $numberOfCustomers . "<br><br>";
        }
        if(isset($_POST['button2'])) {
            echo "Customer names: <br>" . implode(", ", $customerLastNames);
        }
?>
     
    <form method="post">
        <input type="submit" name="button1"
                value="How many customers are there"/>
         
        <input type="submit" name="button2"
                value="Display names of customers"/>
    </form>
</body>
</html>