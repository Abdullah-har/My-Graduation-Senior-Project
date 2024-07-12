<?php 


	require_once 'includes/constants.php';
	$errors = array(); 


	$first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
	if(!empty($first_name) && (preg_match('/[a-z\s]/i', $first_name)) && (strlen($first_name) <= 30)){
		$first_name = $first_name;
	}else{
		$errors[] = "First name missing or not alphabetic and space characters. Max 30";
	}

	$last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
	if(!empty($last_name) && (preg_match('/[a-z\s]/i', $last_name)) && (strlen($last_name) <= 40)){
		$last_name = $last_name;
	}else{
		$errors[] = "Last name missing or not alphabetic and space characters. Max 40";
	}

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if(empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL)) || (strlen($email)>60)){
		$errors[] = "You forgot to enter your email address";
		$errors[]='or the email format is incorrect.';
		}
	

	if(isset($_FILES['profile-pic'])){
		$profile_image = $_FILES['profile-pic']['name'];
		$profile_image_size = $_FILES['profile-pic']['size'];
		if($profile_image_size > 5120000){
			$errors[] = 'Image must be no more than 5MB';
		}
		$allowed_types = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
		$detected_type = exif_imagetype($_FILES['profile-pic']['tmp_name']);
	
		if(!in_array($detected_type, $allowed_types)){
			$errors[] = 'The image type must be a GIF, PNG,JPG, JPEG or PJPEG';
		}
	}else{
		$errors[] = 'You forgot to upload your profile picture';
	}
	


	

	$date_of_birth = $_POST['date_of_birth'];
	if(empty($date_of_birth)){
		$errors[] = "You forgi to enter your date of birth";
	}
	$password1 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
	$string_length = strlen($password1);
	if(empty($password1))
	{
		$errors[]='Please enter a valid password';
	}
	else
	{
		if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/' , $password1))
		{
			$errors[] = 'Invalid password ,8 to12 chars,1 upper,1 lower, 1 number,1 special.';
		}
	else
	{
		$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
		if($password1 === $password2)
		{
			$password2 = $password1;
		}
		else{
			$errors[] = 'Your two passwords do not match.';
			$errors[] = 'Please try again';
		}
	}
	}
	
	
	$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
	if(!(empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) && (strlen($address1) <=30)){
		$address1 = $address1;
	}else
	{
		$errors[] = 'missing address.Numeric, alphabetic , period ,comma,dash and space. Max 30.';
	}
	$address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
	if(!empty($address2) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) && (strlen($address2) <=30))
	{
		$address2 = $address2;
	}
	else
	{
		$address2 = NULL;
	}

	$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
	if((!empty($city)) && (preg_match('/[a-z\.\s]/i',$city)) && (strlen($city) <=30))
	{
		$city = $city;
	}
	else
	{
		$errors[]= 'Missing city.Only alphabetic ,peeriod and space.max30';
	}

	$state_country = filter_var($_POST["state_country"], FILTER_SANITIZE_STRING);
	if(!empty($state_country)  && (preg_match('/[a-z\.\s]/i',$state_country)) && (strlen($state_country) <=30))
	{
		$state_country = $state_country;
	}
	else
	{
		$errors[] = 'Missing state/country.';
	}
	$zcode_pcode = filter_var($_POST["zcode_pcode"], FILTER_SANITIZE_STRING);
	$string_length = strlen($zcode_pcode);
	if(!empty($zcode_pcode) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode)) && (strlen($zcode_pcode) <=30) && (strlen($zcode_pcode) >=5))
	{
		$zcode_pcode = $zcode_pcode;
	}
	else
	{
		$errors[] = 'Missing zip code or post code';
	}
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	if(!empty($phone) && (strlen($phone) <= 30))
	{
		$phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
		$phone = preg_replace('/[^0-9]/', '', $phone);
	}else{
		$phone = NULL;
	}


	$secret = filter_var( $_POST['secret'], FILTER_SANITIZE_STRING);		
	if ((!empty($secret)) && (preg_match('/[a-z\.\s\,\-]/i', $secret)) &&(strlen($secret) <= 30)) {					
		$secret = $secret;					
	}else{	
		$errors[] = 'Missing secret answer. Only alphabetic, period, comma, dash and space. Max 30.';
	}

	if(empty($errors)){ 
		if($_FILES['profile-pic']['error'] == 0){
			$unique = time() . '_' . $profile_image;
			$target = IMAGES . 'profile/'. $unique;
			if(move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target)){
				try{
					require 'includes/mysqli_connect.php'; 
					
		
					$query = "SELECT user_id  FROM users WHERE email = ?";
					$q = mysqli_stmt_init($dbcon);
					mysqli_stmt_prepare($q, $query);
					mysqli_stmt_bind_param($q, 's', $email);
					mysqli_stmt_execute($q);
					$result = mysqli_stmt_get_result($q);
					if(mysqli_num_rows($result) ==  0){
						
						$hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
					
						$query = "INSERT INTO users (user_id, first_name, last_name, email, profile_pic, date_of_birth, password, address1, address2, city, state_country, zcode_pcode, phone, secret, registration_date) VALUES(' ',?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW()) ";
		
		
						$q = mysqli_stmt_init($dbcon);
						mysqli_stmt_prepare($q, $query);
						
						mysqli_stmt_bind_param($q, 'sssssssssssss', $first_name, $last_name, $email, $target, $date_of_birth, $hashed_passcode, $address1, $address2, $city, $state_country, $zcode_pcode, $phone, $secret);
		
						mysqli_stmt_execute($q);
						if(mysqli_stmt_affected_rows($q) ==1){
							header("Location: login.php");
							exit();
						}else{ 
							$errorstring ='System Error<br />You could not be registered due to a system error. We apologize for any incovinience';
							echo '<p class="text-center col-sm-2" style="color: red;">' . $errorstring . '</p>'; 
		
						
							mysqli_close($dbcon);
		
						
							exit();
						}
					}else{
						$errorstring = "The email address is already registered.";
						echo '<p class="text-center col-sm-2" style="color:red;">' . $errorstring;
		
					}
				}
				catch(Exception $e) 
				{
					print "An Exception occurred. Message: " . $e->getMessage() . '<br>';//for debugging purposes only
					print "The system is busy please try again later";
				}
				catch(Error $e)
				{
					print "An error occured. Message: " .$e->getMessage() . '<br>'; 
					print "The system is busy please try again later.";
				}

			}else{
				echo '<p class="text-center col-sm-2" style="color: red">There was a problem uploding your file.</p>'; 
			}
		}else{
			echo '<p class="text-center col-sm-2" style="color: red">There was a problem uploding your file.</p>';
		}
		
	}
	else{
		$errorstring = "Error! The following error(s) occured: <br>";
		foreach ($errors as $msg) {
			$errorstring .= " - $msg<br>";
		}
		$errorstring .= "Please try again.<br>";
		echo '<p class="text-center col-sm-2" style="color: red">' . $errorstring . '</p>';
	}

 ?>