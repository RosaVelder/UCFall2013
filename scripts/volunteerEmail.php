<?php

try
{
	require 'connect.php';
	$con = connect();
		//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysqli_query("SELECT * FROM volunteerEmail WHERE studentID".$_GET["StudentId"].";");
		
		//Add all records to an array
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO volunteerPhone(volunteerID, email) VALUES('" . $_POST["volunteerID"] . "', " . $_POST["email"] . ");");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM volunteerEmail WHERE volunteerID = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE volunteerEmail SET email = " . $_POST["email"] . " WHERE volunteerID = " . $_POST["volunteerID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM volunteerEmail WHERE volunteerID = " . $_POST["volunteerID"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>
