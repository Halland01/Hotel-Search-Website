<!-- Reference: http://yusi123.com/3313.html-->
<!-- Reference: http://getbootstrap.com/-->
<!-- Reference: http://www.lifefoc.com/travel/dubai-united-arab-emirates/burj-al-arab/-->
<!-- Reference: https://www.stanbrookabbey.com/luxury-hotel-rooms/-->
<!-- Reference: http://www.theresortatpedregal.com/-->
<!-- Reference: https://www.google.ca/img-->


<?php 
	// include PDOHelper class from another php file.
    include ("./PDOHelper.php"); 
	
	// open session
	session_start();

	$_SESSION["HotelName"]  = "";
	$_SESSION["City"]  = "";

	$error_msg ="";
	$name="";
	$isLogin = false;
	
	if(isset($_SESSION['user_id'])){
		if(isset($_SESSION['SecurityLevel'])){
			if($_SESSION['SecurityLevel'] == ""){
				$name="";
				$isLogin = false;
			}
			else if($_SESSION['SecurityLevel'] == "1"){
				$isLogin = true;
				$name = $_SESSION['username'];
			}
			else if($_SESSION['SecurityLevel'] == "2"){
				$isLogin = true;
				$name = $_SESSION['username'];
			}
		}else{
			$isLogin = false;
		}
	}
	else{
		$isLogin = false;
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Search Web</title>

    <!-- Bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />

	
	



	<script type="text/JavaScript">
		var xhr; // create an xmlHttpRequest variable to be used in the communication to the server
		var result;
		var addResult;
		var existFlag = false;

		/*
		* Function : $(id)
		* Description : This function is used to get element value by ID.
		* Parameters : id : element id 
		* Return : element.
		*/
		function $(id) {
			return (document.getElementById) ? document.getElementById(id) : document.all[id];
		}

		
		
		
		
		
		/*
    	* Function : createXhr()
    	* Description : This function is used to return AJAX object that depend on browser.
    	* Parameter : Nothing
    	* Return : AJAX object
    	*/
		function createXhr()
		{			
			try
			{
				// code for IE7+, Firefox, Chrome, Opera, SafariCreate
				return new XMLHttpRequest();
			} catch(e){}
			try
			{
				// code for IE6, IE5
				return new ActiveXObject('Microsoft.XMLHTTP');
			} catch(e){}
		}





		/*
    	* Function : ajaxCheckUserName()
    	* Description : This function is used to check user name whether is exist when user login.
    	* Parameter : Nothing
    	* Return : Noting
    	*/
		function ajaxCheckUserName(){

			error1.innerHTML = "";
		
			// get AJAX object
			xhr = createXhr();

			// initiate AJAX object and set url
        	// using POST method.
			xhr.open('POST', 'Server-Side.php');

			// add head Info
        	xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');			

  			// append which data want to send to server side.
			var name = document.getElementById('userName');
        	var data = 'UserName=' + name.value;
			
			// set callback function.
        	xhr.onreadystatechange = function (){
        		if(xhr.readyState == 4 && xhr.status == 200)
        			{
						error1.innerHTML = xhr.responseText;
        				error1.style.color = "red";
        			}
        	}

			// send data to server side.
        	xhr.send(data);
		}
		
		
		
		
		/*
    	* Function : ajaxCheckUserExist()
    	* Description : This function is used to see user name whether is exist when user add new user account.
    	* Parameter : Nothing
    	* Return : Nothing
    	*/
		function ajaxCheckUserExist(){
			
			existFlag = false;
			// get AJAX object
			xhr = createXhr();

			// initiate AJAX object and set url
        	// using POST method.
			xhr.open('POST', 'Server-Side.php');

			// add head Info
        	xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

  			// append which data want to send to server side.
			var name = document.getElementById('AddUserName');
        	var data = 'AddUserName=' + name.value + "&Exist=" + "1";
			
			// set callback function.
        	xhr.onreadystatechange = function (){
        		if(xhr.readyState == 4 && xhr.status == 200)
        			{						
						if(xhr.responseText == "The user name can Use.")
						{
							error2.innerHTML = xhr.responseText;
							error2.style.color = "green";
						}
						else
						{
							error2.innerHTML = xhr.responseText;
							error2.style.color = "red";
							existFlag = true;
						}
        			}
        	}

			// send data to server side.
        	xhr.send(data);
		}
		
		
		
		
		
		
		/*
    	* Function : ajaxLogin()
    	* Description : this function is used to see whether user login is successfully.
    	* Parameter : Nothing
    	* Return : Nothing
    	*/
		function ajaxLogin(){

			// get AJAX object
			xhr = createXhr();

			// initiate AJAX object and set url
        	// using POST method.
			xhr.open('POST', 'Server-Side.php');

			// add head Info
        	xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
			
  			// append which data want to send to server side.
			var name = document.getElementById('userName');
			var pwd = document.getElementById('pwd');
			
			/*
			if(name === undefined || pwd === undefined){
				name = document.getElementById('AddUserName');
				pwd = document.getElementById('addPwd');
			}
			*/
        	var data2 = 'UserName=' + name.value + "&pwd=" + pwd.value + "&login=" + "1";

			// set callback function.
        	xhr.onreadystatechange = function (){
        		if(xhr.readyState == 4 && xhr.status == 200)
        			{
						result = xhr.responseText;
						check_submit();
        			}
        	}

			// send data to server side.
        	xhr.send(data2);
			
			return false;
		} 
		
		
		
		
		/*
    	* Function : check_submit()
    	* Description : this function is used to check user name and password when user submit.
    	* Parameter : Nothing
    	* Return : Nothing
    	*/
		function check_submit(){
			var name = document.getElementById('userName');
			var pwd = document.getElementById('pwd');
			
			if(name.value == "" || pwd.value == ""){
				document.getElementById('error1').innerHTML = "User name and passwrod can not be blank.";
				error1.style.color = "red";
				return false;
			}
			
			if(result === "Successfully"){
				document.getElementById('error1').innerHTML = "Log in Successfully";
				error1.style.color = "green";
				error1.style.fontSize = "12px";
				
				setTimeout('location.reload()', 1000);
			}
			else{
				document.getElementById('error1').innerHTML = result;
				error1.style.color = "red";
				return false;
			}
		}
		
		
		
		
		/*
    	* Function : ajaxAddUser()
    	* Description : this function is used to add new user account to database.
    	* Parameter : Nothing
    	* Return : Nothing
    	*/
		function ajaxAddUser(){
			
			if(existFlag == true)
			{
				document.getElementById('error2').innerHTML = "Please choose another name(This User Name has exist).";
				error2.style.color = "red";
				return false;
			}

			// get AJAX object
			xhr = createXhr();

			// initiate AJAX object and set url
        	// using POST method.
			xhr.open('POST', 'Server-Side.php');

			// add head Info
        	xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
			
  			// append which data want to send to server side.
			var name = document.getElementById('AddUserName');
			var pwd = document.getElementById('addPwd');
        	var data1 = 'AddUserName=' + name.value + "&addPwd=" + pwd.value + "&add=" + "1";

			// set callback function.
        	xhr.onreadystatechange = function (){
        		if(xhr.readyState == 4 && xhr.status == 200)
        			{
						addResult = xhr.responseText;
						check_addsubmit();
        			}
        	}

			// send data to server side.
        	xhr.send(data1);
			
			return false;
		}
		
		
		
		
		
		/*
    	* Function : check_addsubmit()
    	* Description : this function is used to check user name and password when user submit.
    	* Parameter : Nothing
    	* Return : Nothing
    	*/
		function check_addsubmit(){
			var name = document.getElementById('AddUserName');
			var pwd = document.getElementById('addPwd');
			
			if(name.value == "" || pwd.value == ""){
				document.getElementById('error2').innerHTML = "User name and passwrod can not be blank.";
				error2.style.color = "red";
				return false;
			}
		
			if(addResult === "Successfully"){
				document.getElementById('error2').innerHTML = "Add new User is Successfully";
				error2.style.color = "green";
				error2.style.fontSize = "12px";
				
				setTimeout('location.reload()', 1000);
			}
			else{
				document.getElementById('error2').innerHTML = addResult;
				error2.style.color = "red";
				return false;
			}
		}
		
		
		
		
		/*
    	* Function : ajaxLogOut()
    	* Description : this function is used to clear session when user log-out.
    	* Parameter : Nothing
    	* Return : Nothing
    	*/
		function ajaxLogOut(){
			// get AJAX object
			xhr = createXhr();

			// initiate AJAX object and set url
        	// using POST method.
			xhr.open('POST', 'Server-Side.php');

			// add head Info
        	xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
			
  			// append which data want to send to server side.
        	var data3 = "logout=1";

			// set callback function.
        	xhr.onreadystatechange = function (){
        		if(xhr.readyState == 4 && xhr.status == 200)
        			{
						// do nothing.
						var r = xhr.responseText;
						location.reload();
        			}
        	}

			// send data to server side.
        	xhr.send(data3);
		}
	</script>
  </head>
  <body style="background: url('./img/background.jpg') no-repeat fixed center">
	<!-- Header -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="index.php">Hotel Info</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		   <li class="active"><a href="index.php">Home</a></li>
		   <li class="active"><a href="#">About</a></li>
		   
		   	<?php if($isLogin == false){?>
		   <li><a href="#" data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
		   <?php }
		   else
		   {
			   if($_SESSION['SecurityLevel'] == 2){
				   echo "<li><a class='dropdown-toggle active' data-toggle='dropdown' href='#'>{$_SESSION['username']}
						<span class='caret'></span></a>
						<ul class='dropdown-menu'>
						  <li><a href='AdminModify.php'>Management User</a></li>
						</ul>
					  </li>";
			   }
			   else{
				   echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span>{$_SESSION['username']}</a></li>";
			   }
			   
			   

			   
		   }?>
		   
			<?php if($isLogin == false){?>
		   <li><a href="#" data-toggle="modal" data-target="#divLogin"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
		   <?php }
		   else
		   {
			   echo "<li><a href='#' onclick='ajaxLogOut()'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>";
		   }?>
		</ul>
	  </div>
	</nav>

	<!-- login modal-dialog -->
	<div id="divLogin" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-toggle="modal" data-target="#divLogin">x</button>
					<h1 class="text-center text-primary">Login</h1>
				</div>
				<div class="modal-body">
					<!-- Form -->
					<form name="loginForm" method = "post" class="form col-md-12 center-block" action="index.php" onsubmit="return ajaxLogin()">
						<div class="form-group">
							<input type="text" id="userName" name="UserName" class="form-control input-lg" placeholder="Please Enter User Name" onblur="ajaxCheckUserName()">
						</div>
						
						<div class="form-group">
							<input type="password" id="pwd" name="Pwd" class="form-control input-lg" placeholder="Login Password">
						</div>
						
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Log In">
						</div>
							
						<!-- error message -->
						<span id="error1"></span>
						<span id="error3"><?php echo $name;?></span>
					</form>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>

	<!-- register modal-dialog -->
	<div id="register" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-toggle="modal" data-target="#register">x</button>
					<h1 class="text-center text-primary">Register</h1>
				</div>
				<div class="modal-body">
					<!-- Form -->
					<form name="registerForm" class="form col-md-12 center-block" action="index.php" onsubmit="return ajaxAddUser()">
						<div class="form-group">
							<input type="text" id="AddUserName" class="form-control input-lg" placeholder="Please Enter new User Name" onblur="ajaxCheckUserExist()">
						</div>
						
						<div class="form-group">
							<input type="password" id="addPwd" class="form-control input-lg" placeholder="Login Password">
						</div>
						
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-lg btn-block" name="addsubmit" value="Register">
						</div>
						
						<!-- error message -->
						<span id="error2"></span>
					</form>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>


	<!--Reference: http://getbootstrap.com/-->
	<div class="contrain">     
        <div class="row"> 
		<div class="col-md-1"></div> 
            <div class="col-md-4">
			<div class="col-sm-17">
				<div class="panel" style="background: url('./img/panel-b.jpg') no-repeat;background-size: cover"> <!--style="background: url('./img/panel-b.jpg') no-repeat top right"-->
					<div class="panel-heading"> 
						<h3 class="panel-title" style="color: #2e5d5a"><strong>Inquire Hotel</strong></h3> 
					</div> 
					<div class="panel-body flex-grow"> 
						
					   <form role="form" class="form center-block" name="form1" action="list.php" method="POST"> 
						   <div class="form-group"> 
							   <label for="HotelName"><h4>Hotel Name</h4></label> 
							   <div class="input-group"> 
								   <input type="text" class="form-control" id="HotelName" name="HotelName" placeholder="Hotel Name" >
							   </div> 
						   </div> 
						   <div class="form-group"> 
							   <label for="Checkout"><h4>City</h4></label> 
							   <div class="input-group"> 
								   <input type="text" class="form-control" id="City" name="City" placeholder="City" > 								   
							   </div> 
						   </div> 
						   </br>
						   </br>
							   <span class="input-group-btn"> 
							   <div class="text-center">
								   <button type="submit" class="btn" onClick="form1.submit();" name="HotelSearch">Search</button> 
							   </div>
							   </span> 
					   </form>                      
					</div> 
				</div> 
			</div> 
			</div>
            <div class="col-md-7"> 
			<div class="col-sm-10">

				<div id="carousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <!-- Reference: http://www.lifefoc.com/travel/dubai-united-arab-emirates/burj-al-arab/-->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="./img/BurjAlArabHotel.jpg" alt="...">
					  <div class="carousel-caption">
						<h2>Burj Al Arab Hotel</h2>
					  </div>
					</div>
					<div class="item">
					<!--Reference: https://www.stanbrookabbey.com/luxury-hotel-rooms/-->
					  <img src="./img/StanbrookAbbey.jpg" alt="...">
					  <div class="carousel-caption">
						<h2>Stanbrook Abbey</h2>
					  </div>
					</div>
					<div class="item">
					<!--Reference: http://www.theresortatpedregal.com/-->
					  <img src="./img/TheResortAtPedregal.jpg" alt="...">
					  <div class="carousel-caption">
						<h2>The Resort At Pedregal</h2>
					  </div>
					</div>
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
			</div>

		</div> 
		</br>
		<h2><strong><center>Making your trip more enjoyable!</center></strong></h2>
		</br>


<!--Photo Reference: https://www.google.ca/img-->
<!--CSS Reference: http://yusi123.com/3313.html-->
<div class="contrain">
<div class="row">
<div class="col-md-1"></div> 
<div class="col-md-2">
   <div class="photo">
   <figure class="effect-milo">
		<img src="./img/American.jpg" alt="..." class="img-thumbnail"/>
		<figcaption>
			<h4 style="color:white">American</h4>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;New York City&nbsp;&nbsp;</p>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;Washington, D.C.&nbsp;&nbsp;</p>				
		</figcaption>			
	</figure>
	</div>
</div>

<div class="col-md-2">
   <div class="photo">
   <figure class="effect-milo">
		<img src="./img/England.jpg" alt="..." class="img-thumbnail"/>
		<figcaption>
			<h4 style="color:white">England</h4>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;London&nbsp;&nbsp;</p>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;Manchester&nbsp;&nbsp;</p>	
		</figcaption>			
	</figure>
	</div>
</div>

<div class="col-md-2">
   <div class="photo">
   <figure class="effect-milo">
		<img src="./img/china.jpg" alt="..." class="img-thumbnail"/>
		<figcaption>
			<h4 style="color:white">China</h4>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;Beijing&nbsp;&nbsp;</p>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;Shanghai&nbsp;&nbsp;</p>
		</figcaption>			
	</figure>
	</div>
</div>

<div class="col-md-2">
   <div class="photo">
   <figure class="effect-milo">
		<img src="./img/French.jpg" alt="..." class="img-thumbnail"/>
		<figcaption>
			<h4 style="color:white">French</h4>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;Paries&nbsp;&nbsp;</p>
			<p style="color:white;margin:0;padding:0;">&nbsp;&nbsp;Marseille&nbsp;&nbsp;</p>
		</figcaption>			
	</figure>
	</div>
</div>

<div class="col-md-2">
   <div class="photo">
   <figure class="effect-milo">
		<img src="./img/India.jpg" alt="..." class="img-thumbnail"/>
		<figcaption>
			<h4 style="color:white">India</h4>
			<p style="color:white;margin:0;padding:0;">&nbsp;Mumbai&nbsp;&nbsp;</p>
			<p style="color:white;margin:0;padding:0;">&nbsp;Bengaluru&nbsp;&nbsp;</p>
		</figcaption>			
	</figure>
	</div>
</div>



	<div class="clear"></div>

<br/>
<br/>

</div>
</div>

	<div></br></br></br></br></div>

	<!-- footer -->
  <div class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="contrainer">
		<p class="navbar-text">Site Built By vavaqw</p>	
	<div>
  </div>


	
  </body>
</html>