<?php
require 'connect.php';

//adds a request into the database
function addRequest($con, $firstName, $lastName, $street, $city, $state, $zip, $email, $phone, $category, $description) {
	$sql ="INSERT INTO requests (firstName, lastName, street, city, state, zip, email, phone, category, description)
				VALUES ('$firstName', '$lastName', '$street', '$city', '$state', '$zip', '$email', '$phone', '$category', '$description')";
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	//echo "1 record added\n";
	//echo "submit the data\n";
}

//adds a student into the database
function addStudent($con, $firstName, $lastName, $ucID, $email, $phone, $password) {
	$sql ="INSERT INTO volunteer (firstName, lastName, ucID, email, phone, password)
				VALUES ('$firstName', '$lastName', '$ucID', '$email', '$phone', '$password')";
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
}
/**
*Function that takes in $requestID and volunteerID and returns a single assignmentID.
*/
function addAssignment($con, $requestID, $volunteerID) {
	$date = mysqli_query($con,"SELECT * FROM requests");
	while($row = mysqli_fetch_array($date)) {
 		if ($requestID == $row['requestID']) {
 		$date = $row['expirationDate'];
  		break;
  		}
	}  
	mysqli_query($con, "INSERT INTO assignments (requestID, volunteerID, expirationDate)
		VALUES ('$requestID', '$volunteerID', '$date')");
}
/**
*Function that takes in a connection and a assignmentID and removes an assignment.
*/
function removeAssignment($con, $assignID) {
	mysqli_query($con,"DELETE FROM assignments WHERE assignmentID ='$assignID'");
}
function archive() {

}

//removes a request from the database based on the request ID
function removeRequest($con,$requestID) {
	$request = mysquli_query($con, "DELETE FROM requests WHERE RequestID ='$requestID'");
	return $request;
}
function archiveRequest() {

}
function unArchiveRequest() {

}

$con = connect();
addRequest($con, "Nathan", "Bland", "3800 s. 48th str.", "Lincoln", "NE", 68506, "nathan.bland@gmail.com", 7203417006, 1, "Basic request for category one work, no idea what that is yet.");
disconnect($con);
?>
