<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Two Owls Cafe</title>
<style type='text/css'>
	html,body,select {
		font-size: 25px;
		text-align: center;
	}
	table {
		 margin-left: auto;
		 margin-right: auto;
	}
	td, th {
			border: 1px #6e8fbd solid;
		}
	body {
		background: #465259;
		color: #aeb766;
	}
	select, input {
		background:#6e8fbd;
		color: #CAD570;
	}
	#submitButton {
		border: 1px #CAD570 solid;
		height: 30px;
		width: 75px;
		transition: .3s ease all;

	}
	#submitButton:hover {
		border: 1px #6e8fbd solid;
		color: #6e8fbd;
		background-color: #CAD570;
		height: 30px;
		width: 75px;
		transition: .3s ease all;
		cursor: pointer;
	}
</style>
</head>

<body>
	<h1>Two Owls Cafe</h1>
	<h2>Open From 7:00 PM to 2:00AM</h2>
<br/>
<?php
//establish connection info
$server = "127.0.0.1";
$userid = "ugcswqkogyj4z";
$pw = "HelloThereKenobi";
$db= "dbkprn8xpp9cyo";

// Create connection
$conn = new mysqli($server, $userid, $pw);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
	//Grab the menu
	$conn->select_db($db);
	$sql = "SELECT * FROM `menu_items`";
	$result = $conn->query($sql);
	echo "<form onsubmit='return validateForm()' action = 'OrderConfirmation.php' method = 'get'><table><tr><th>Select Item</th><th>Item Name</th><th>Cost Each</th></tr>";
	if ($result->num_rows > 0) {
		$i = 1;
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr><td><select name='quan$i' id='select$i'>
				<option value='0'>0</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
				<option value='7'>7</option>
				<option value='8'>8</option>
				<option value='9'>9</option>
				<option value='10'>10</option>
			</select></td>";
			echo "<td>" . $row["name"]. "</td><td>" . "$" . $row["cost"]. "</td></tr>";
			$i++;
		}
	}
	//output Non menu information
	echo "</table>";
	echo "First Name*: <input type='text'  name='firstName' id='firstName'/> <br>";
	echo "Last Name*:  <input type='text'  name='lastName' id='lastName'/><br>";
	echo "Special Instructions:  <input type='text'  name='special' id='special'/> <br>";

	echo "<input type='submit' id = 'submitButton'> </form>";
	//close the connection
	$conn->close();
	
?>
	<script>
		//validates the form
		function validateForm() {
			var valid = false;;
			var value;
			//make sure an item was ordered
			for (var i = 1; i <= 5; i++) {
				value = document.getElementById("select" + i).value;
				if (value != 0) {
					valid = true;
				}
			}
			//LEt the User know why their order is invalid
			if (valid == false) {
				alert("You must order at least one item.");
				return false;
			}
			if (document.getElementById("firstName").value == "") {
				alert("Please input your first name.");
				return false;
			}
			if (document.getElementById("lastName").value == "") {
				alert("Please input your last name.")
				return false;
			}
			//get the date and make sure its within bounds
			const currentDate = new Date();
			const currentHours = currentDate.getHours();
			const currentMinutes = currentDate.getMinutes();
			//they can order at 6:45 and later
			if (currentHours == 18) {
				if (currentMinutes >= 45 ) {
					
				} else {
					alert("Please wait until 6:45 PM to place your order");
					return false;
				}
				//they can also order between 18 and 1:45
			} else if ((currentHours > 18  && currentHours <= 23) || (currentHours == 0)) {
					   
			} else if (currentHours == 1) {
				if (currentMinutes <= 45) {
					
				} else {
					alert("The cafe is closing down. We can not take your order at this time");
					return false;
				}
			} else {
				alert("The cafe is not open. Please wait until 6:45 PM to order");
				return false;
			}
			return valid;
		}
	</script>
	
	
</body>
</html>