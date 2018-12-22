<?php
session_start();
$_SESSION['message']= '';
require_once 'includes/classes/database.php';
include 'formfunc.php';
    $db = new Database;

//include_once 'includes/classes/partytype.php';


   
    

?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="includes/header.css"/>
<meta charset="UTF-8">
<title>Register</title>

</head>

<script type="text/javascript">
	function val(){
		
		if(register.gender.value ==""){
			alert("Please select your gender.");
			return false;
			
		}
		if(register.country.value ==""){
			alert("Please select your country.");
			return false;
		}
		if(register.title.value ==""){
			alert("Please select your Title.");
			return false;
		}
		return true;
	}
	


</script>
  
<body>
        <div class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 boxStyle" style="padding-right: 0px!important;padding-left: 0px!important;">
		   <div class="panel-body" style="padding-right: 4px!important;padding-left: 4px!important;">
						<h1>Register New Account</h1>
<form class="form" name="register" action="register.php" method="post" enctype="multipart/form-row" autocomplete="off">
<div class="alert alert-error"><? $_SESSION['message']?></div>
<div class="form-group">
			<label for="title">Title*</label>
			<select name="title" id="title" required >
			
			<option value="Mr">Mr</option>
			<option value="Mrs">Mrs</option>
			<option value="Miss">Miss</option>
			
			</select>
      		firstname:*<input type="text" id="firstname" placeholder="first name" name="firstname" required autofocus/>
      		
      		Surname:*<input type="text" id="surname" placeholder="surname" name="surname" required />
      		
     	 	Middlename:<input type="text" id="middlename" placeholder="middle name" name="middlename" />	
     
       Email:*<input type="email" id="email" placeholder="Email Address" name="email"  required/>
      Personal Email:<input type="email" id="pemail" placeholder="Personal Email" name="pemail"  />
     

      <div class="radios">
      <h4>Gender :*</h4>
      <input type="radio" name="gender" value="Male">
      <label for="">Male</label>
      <input type="radio" name="gender" value="Female">
      <label for="">Female</label>
      
  		 <br />Address:*<input type="text" id="address" placeholder="Enter address" name="address" required />
    
   
    Select your country:*<select class="form-control" id="country" name="country" class="form-control select2-default" data-placeholder="Select Your Country" >
    <option value=""> SELECT YOUR COUNTRY</option>
    <?php 
    $sql = "select distinct country, countrycode FROM countries order by countryid";
    
    
    $stmt = $db->connect()->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['country']."'>".$row['country']."</option>";
    }
    
    ?>
    
   </select>

    
    Select your state:* <select class="form-control" id="state" name="state" class="form-control select2-default" data-placeholder="Select Your State" required >
    <option value=""> State/Province</option>
     <?php 
    $sql = "select distinct state_name, state_code FROM states order by state_code";
    
    
    $stmt = $db->connect()->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['state_name']."'>".$row['state_name']."</option>";
    }
    ?>
    
    </select>

    
     Participant type:* <select class="form-control" id="participanttype" name="participanttype" class="form-control select2-default" data-placeholder="Select Your participant type"  required>
    <option value=""> SELECT PARTICIPANT TYPE</option>
    <?php 
    $sql = "select distinct regtype FROM regfees order by id";
    
    
    $stmt = $db->connect()->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['regtype']."'>".$row['regtype']."</option>";
    }
    
    ?>
    
    </select>

    
Phone No:*<input type="tel" id="phoneno" placeholder="Phone no" name="phoneno" required />
Sponsor Information:<input type="text" id="sponsor" placeholder="Sponsor Information" name="sponsor"  />
Enter Your Company Name<input type="text" id="company" placeholder="Institution/Company Name" name="company"  />
</div>

   Enter Company Address: <input type="text" id="companyaddress" placeholder="Institution/Company Address" name="companyaddress"  />
	Dietary Preference:<input type="text" id="dietarypreference" placeholder="Dietary Preference" name="dietarypreference"  />
	Special Needs:<input type="text" id="specialneeds" placeholder="Special Needs" name="specialneeds"  />
    
</div>

      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" onclick="return val();" />
   
    
    </form>
  </div>
</div>
</div>
</div>
    </body>
</html>