<?php
class Database
{
	
//SQL to get the number of customers
	public function getNumberOfCustomers()
	{
		$sql = "SELECT COUNT(*) AS NumberOfCustomers FROM Customers";
		$stmt = sqlsrv_query($this->conn, $sql);
		$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $row['NumberOfCustomers'];
	}
//SQL to get the name of customers
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