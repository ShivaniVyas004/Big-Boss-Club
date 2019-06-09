<!DOCTYPE html>
<html>
<head>
<title>
Edit Student 
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: Black;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
}
</style>
</head>


<body onload = "document.getElementById('signupid').style.display='block'" >

<?php
			$connection = mysqli_connect("localhost", "root", "", "bbc");
			$s_id = mysqli_real_escape_string($connection, $_POST['s_id']);
			$sql = "SELECT * FROM student WHERE s_id = '$s_id'";
			$result = $connection->query($sql);
			
			if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
					$s_f_name = $row["s_f_name"];
					$s_l_name = $row["s_l_name"];
					$gender = $row["Gender"];
					$email = $row["email"];
					$dob = $row["dob"];
					$s_mobile = $row["s_mobile"];
					$address = $row["address"];
				
				}
				
				
			}
			
			$sql = "SELECT * FROM parent WHERE s_id = '$s_id'";
			$result = $connection->query($sql);
			
			if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
					$parent_name = $row["parent_name"];
					$parent_mobile = $row["parent_mobile"];
					$parent_email = $row["parent_email"];
				
				}
				
				
			}
			
		$connection->close();
		?>

<div id="signupid" class="modal">
  <span onclick="window.location.href='C:/xampp/phpMyAdmin/twist/index.html'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="http://localhost/phpmyadmin/updateinsert.php" method="get">
    <div class="container">
      <h1>Update details</h1>
      <h3><u><p>Personal Details</p></u></h3>
      <hr style ="margin-top:-1em;border-width: 2px">
	  
	  <label for="f_name"><b>First Name</b></label>
      <input type="text" placeholder="Ente Your First Name" name="f_name" value = <?php echo"$s_f_name"; ?> required>
	  
	  <label for="l_name"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Your Last Name" name="l_name" value = <?php echo"$s_l_name"; ?> required>
	  

	  
	  <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value = <?php echo"$email"; ?> required>

	  <label for="dob"><b>Date of Birth</b></label>
      <input type="date" placeholder="Enter Your date of birth" name="dob" value = <?php echo"$dob"; ?> required><br/><br/>
	  
       <label for="contact"><b>Contact Number</b></label>
      <input type="tel" placeholder="Enter Contact number" name="contact" value = <?php echo"$s_mobile"; ?> required><br/><br/>
	   
	  <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="address" value = <?php echo"$address"; ?> required><br/>
	 
	  
	  <h3><u><p>Parent Details</p></u></h3>
      <hr style ="margin-top:-1em;border-width: 2px">
	  
	  <label for="parent_name"><b>Name</b></label>
      <input type="text" placeholder="Ente Your Parant Name" name="parent_name" value = <?php echo"$parent_name"; ?> required>
	  
	  <label for="parent_mobile"><b>Parent Contact Number</b></label>
      <input type="tel" placeholder="Enter Parent Contact number" name="parent_mobile" value = <?php echo"$parent_mobile"; ?> required><br/><br/>
	  
	  <label for="parent_email"><b>Parent Email</b></label>
      <input type="text" placeholder="Enter Parent Email" name="parent_email" value = <?php echo"$parent_email"; ?> required>
	  
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="window.location.href='C:/xampp/phpMyAdmin/twist/index.html'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Update</button>
      </div>
    </div>
  </form>
</div>

<div class="main">
<p> background page</p>
</div>


<script>

// Get the modal
var modal1 = document.getElementById('signupid');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
		window.location.href = "C:/xampp/phpMyAdmin/twist/index.html"
    }
}

</script>

</body>
</html>
