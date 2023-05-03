<?php
class Database
{
	private $conn;

	public function __construct($serverName, $database, $uid, $pass)
	{
		$connection = array("Database" => $database, "Uid" => $uid, "PWD" => $pass);
		$this->conn = sqlsrv_connect($serverName, $connection);
	}

	public function __destruct()
	{
		sqlsrv_close($this->conn);
	}

	public function getNumberOfCustomers()
	{
		$sql = "SELECT COUNT(*) AS NumberOfCustomers FROM Customers";
		$stmt = sqlsrv_query($this->conn, $sql);
		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $row['NumberOfCustomers'];
	}

	public function getCustomerLastNames()
	{
		$sql = "SELECT ContactName FROM customers";
		$stmt = sqlsrv_query($this->conn, $sql);

		$lastNames = array();
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			$lastNames[] = $row['ContactName'];
		}

		return $lastNames;
	}
}
?>