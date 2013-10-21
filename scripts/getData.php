<?php
require 'connect.php';

function getStudent($con, $UCID) {
	
	$student = mysqli_query($con, 
	"SELECT * 
	FROM volunteer 
	WHERE UC_ID = $UCID");
	
	$studentArray = mysqli_fetch_array($student, MYSQL_NUM);
	
	return json_encode($studentArray);
	
}

function getAllStudents($con) {
	
	$allStudents = mysqli_query($con, 
	"SELECT * 
	FROM volunteer");
	
	$studentArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($allStudents)){ //fetchs associative array
		$studentArray[$index] = $row;
		$index ++;
	}
	
	return json_encode($studentArray);
}

function getRequest($con, $requestID) {
		
	$request = mysqli_query($con,
             "SELECT * 
             FROM requests
             WHERE requestID = $requestID");
             
	$requestArray = mysqli_fetch_array($request);
	
	return json_encode($requestArray);
    
}

function getRequests($con) {
	
	$requests = mysqli_query($con,
		"SELECT * 
		FROM requests");
		
	$requestsArray = mysqli_fetch_array($requests);
	
	return json_encode($requestsArray)

}
//function that takes in a connection and returns a json object of all expired requests 
function getExpiredRequests($con) {
 	$request = mysqli_query($con, "SELECT * FROM requests");

	$requestArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($request)){ //fetchs associative array
		if ($row['expirationDate'] < date('Y-m-d')) {
			$requestArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($requestArray);
}
//function that takes in a connection and returns a json object of all non-expired requests 
function getCurrentRequests($con) {
 	$request = mysqli_query($con, "SELECT * FROM requests");
	
	$requestArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($request)){ //fetchs associative array
		if ($row['expirationDate'] >= date('Y-m-d')) {
			$requestArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($requestArray);
}
//function that takes in a connection and returns a json object of all the archived requests
function getArchivedRequests($con){
  	$request = mysqli_query($con, "SELECT * FROM requests WHERE archived = 1");
	
	$requestArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($request)){ //fetchs associative array
		$requestArray[$index] = $row;
		$index ++;
	}
	return json_encode($requestArray);
}
//function that takes in a connection and assignment ID and returns a json object of that assignment
function getAssignment($con, $assignID) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE assignmentID = $assignID");
	$assignment = mysqli_fetch_array($result);
	return json_encode($assignment);
}
function getAssignments($con){
	$sql="SELECT * FROM assignments"
	$result = mysqli_query($con,$sql);
	//echo $result;

	$assignmnetArray = mysqli_fetch_array($result, MYSQL_NUM);
	return json_encode($assignmnetArray);
		
}
//function that takes in a connection and request ID and returns a json object of all the assignments for that one request
function getRequestAssignments($con, $requestID) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE requestID = $requestID");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		$assignArray[$index] = $row;
		$index ++;
	}
	return json_encode($assignArray);
}
//function that takes in a connection and student ID and returns a json object of all the assignments for that one student
function getStudentAssignments($con, $studentID) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE volunteerID = $studentID");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		$assignArray[$index] = $row;
		$index ++;
	}
	return json_encode($assignArray);
}
//function that takes in a connection and returns a json object of all expired Assignments 
function getExpiredAssignments($con) {
	$result = mysqli_query($con,"SELECT * FROM assignments");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		if ($row['expirationDate'] < date('Y-m-d')) {
			$assignArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($assignArray);
}
//function that takes in a connection and returns a json object of all non-expired assignments
function getCurrentAssignments($con) {
	$result = mysqli_query($con,"SELECT * FROM assignments");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		if ($row['expirationDate'] >= date('Y-m-d')) {
			$assignArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($assignArray);
}
//function that takes in a connection and returns a json object of all archived assignments
function getArchivedAssignments($con) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE archived = 1");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		$assignArray[$index] = $row;
		$index ++;
	}
	return json_encode($assignArray);
}

function getRecommended(){

}

//getAssignment('$_POST[volunteerID]','$_POST[requestID]');

?>
