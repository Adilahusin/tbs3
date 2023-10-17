<?php

require_once "../configure/config.php";
//print_r("test");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//print_r("test 1");

    // Get data from the form
    $name = $_POST["a_name"];
    $username = $_POST["a_username"];
    $password = $_POST["a_password"];
    $adminType = $_POST["a_type"] === "Admin" ? 1 : 2;
    //print_r ("123");

    // Insert data into the database

    $sql = $pdo->prepare('SELECT * FROM admin WHERE a_name = ? AND a_username = ?');
			$sql->execute(array($name,$username));
			$sql_count = $sql->rowCount();
				if($sql_count <= 0 ){
					
					$insert = $pdo->prepare('INSERT INTO admin (a_name, a_username, a_password, a_type, a_status) VALUES(?, ?, ?, ?, 1);
						');
					$insert->execute(array($name,$username,$password,$adminType));
					$insert_count = $insert->rowCount();
						
						if($insert_count > 0){
							echo "Data added succesfully";
						}else{
							echo "Data cannot be added";
						}

				}else{
					echo "Data already exists" . $sql . "<br>" . $pdo->errorInfo();
				}


    // Close the database pdoection
    $pdo = null;
}

?>
