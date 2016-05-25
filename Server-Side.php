<?php
	// include PDOHelper class from another php file.
    include ("./PDOHelper.php");
	
		// open session
	session_start();
    
    // if user want to add new account.
    if (isset($_POST['add'])) {
        // get user name.
        $userName = $_POST['AddUserName'];
		// get password.
        $pwd = $_POST['addPwd'];
		
		// using md5 to encrypt password.
		$pswd1=md5($pwd); 
        
        // using PDOHelper to connect database.
        $pdo = new PDOHelper(array('charset' => 'utf8'));
        
		// build query sting.
        $sql = "INSERT INTO users values(null, '$userName', '$pswd1', 1)";
		
		//call pdoHelper method Insert() and get result.
		$res = $pdo->Insert($sql);
		
		// check result.
        if ($res > 0) {
			unset($pdo);
            echo("Successfully");
        }
        else //otherwise.
        {
            unset($pdo);
            echo("fail");
        }
    }
	// if the user name is exist.
	else if (isset($_POST['Exist'])) {        
        
        // get user name.
        $userName = $_POST['AddUserName'];
        
        // using PDOHelper to connect database.
        $pdo = new PDOHelper(array('charset' => 'utf8'));
        
		// build query sting.
        $sql = "SELECT * FROM users WHERE User_Name = '$userName'";
		
		//call pdoHelper method getRow() and get result.
		$res = $pdo->getRow($sql);
		
		// check result.
        if ($res['User_Name'] == $userName) {
            unset($pdo);
            echo("The user name can not be Blank or This User Name has exist.");
        }
		else{
			unset($pdo);
			echo("The user name can Use.");
		}		
    }
	// when user login.
	else if (isset($_POST['login'])) {
        // get user name.
        $userName = $_POST['UserName'];
		// get password.
        $pwd = $_POST['pwd'];
		// using md5 to encrypt password.
		$pswd1=md5($pwd); 
        
        // using PDOHelper to connect database.
        $pdo = new PDOHelper(array('charset' => 'utf8'));
		
        // build query sting.
        $sql = "select * from users WHERE User_Name = '$userName' AND Pass_Word = '$pswd1'";

		//call pdoHelper method getRow() and get result.
		$res = $pdo->getRow($sql);
		
		// check result.
        if ($res["Pass_Word"] == $pswd1 && $res["User_Name"] == $userName) {	

			$_SESSION['user_id']=$res['User_ID'];
			$_SESSION['username']=$res['User_Name'];
			$_SESSION['SecurityLevel']=$res['SecurityLevel_ID'];
			
			unset($pdo);
            echo("Successfully");
        }
        else // otherwise.
        {
            unset($pdo);
            echo("The password is wrong.");
        }
    }
	// when user log-out.
	else if (isset($_POST['logout'])) {
		
		// clear session.
		$_SESSION['user_id'] = "";
		$_SESSION['username'] = "";
		$_SESSION['SecurityLevel']= "";
		
		echo("clear");
    }
	// check user name whether is exist.
    else if (isset($_POST['UserName'])) {        
        
        // get user name.
        $userName = $_POST['UserName'];
        
        // using PDOHelper to connect database.
        $pdo = new PDOHelper(array('charset' => 'utf8'));
        // build query sting.
        $sql = "select * from users WHERE User_Name = '$userName'";
		
		//call pdoHelper method getRow() and get result.
		$res = $pdo->getRow($sql);
		
		// check result.
        if ($res["User_Name"] == "" || $res["User_Name"] != $userName) {
            unset($pdo);
            echo("The user name can not be Blank or This User Name has not exist.");
        }     
    }
	// when administrator user delete General User.
	else if(isset($_POST['delete']))
	{
		// get General user ID
		$userID = $_POST['delete'];
		
		// using PDOHelper to connect database.
        $pdo = new PDOHelper(array('charset' => 'utf8'));
        // build query sting.
        $sql = "DELETE FROM Users WHERE User_ID = {$userID}";
		
		// check result.
		$res = $pdo->delete($sql);
		var_dump($res);
	}
	// when administrator user modify General User.
	else if(isset($_POST['modify']))
	{
		// get user ID.
		$userID = $_POST['modify'];
		// get user security level.
		$level = $_POST['level'];
		// get user name.
		$usernName = $_POST['name'];
		
		// using PDOHelper to connect database.
        $pdo = new PDOHelper(array('charset' => 'utf8'));
        // build query sting.
        $sql = "UPDATE Users SET SecurityLevel_ID = {$level}, User_Name = '{$usernName}' WHERE User_Id = {$userID}";
		
		// check result.
		$res = $pdo->modify($sql);
		if($res > 0){
			echo("Modify Successfully");
		}
		else{
			echo("Modify Fail");
		}
		//var_dump($res);
		//
	}
?>