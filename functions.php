<?php

	
	//for insert user data

	
	function insert_user($user_id,$name,$access_token,$profile_pic){
		$db_host = 'localhost';
		$db_user = 'root';
		$db_pass = '';
		$db_database = 'phptest';
		$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$data = "SELECT user_id FROM user WHERE user_id=".$user_id;
		//if($conn->query($sql))
			$row = $conn->query($data);
			if($row->num_rows ==0){
				$sql = "INSERT INTO user (user_id,name,access_token,is_active,profile_pic)
				VALUES ($user_id,'".$name."','".$access_token."',1,'".$profile_pic."')";

				if ($conn->query($sql) === TRUE) {
				    //echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			$conn->close();

		
	}
	//for de_auth_callback
	function parse_signed_request($signed_request) {
	  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

	  $secret = "appsecret"; // Use your app secret here

	  // decode the data
	  $sig = base64_url_decode($encoded_sig);
	  $data = json_decode(base64_url_decode($payload), true);

	  // confirm the signature
	  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
	  if ($sig !== $expected_sig) {
	    error_log('Bad Signed JSON signature!');
	    return null;
	  }
	  print_r($data['user_id'])
	  	$db_host = 'localhost';
		$db_user = 'root';
		$db_pass = '';
		$db_database = 'phptest';
		$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$data1 = "UPDATE user SET is_active='0' WHERE user_id=".$data['user_id'];
		//if($conn->query($sql))
			$row = $conn->query($data1);
			
			$conn->close();
	  return $data;
	}

	function base64_url_decode($input) {
	  return base64_decode(strtr($input, '-_', '+/'));
	}



?>