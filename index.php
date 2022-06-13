<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>	
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
// define variables and set to empty values
$name =$email= $message = $mobile = $id= "";
$nameErr =$emailErr= $messageErr = $mobileErr =  "";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(empty($_POST['name']))
{
	$nameErr="name is required";
}
else
{
$name=test_input($_POST['name']);
 if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
$nameErr = "Only letters and white space allowed";
}
if(empty($_POST['email']))
{
	$emailErr="email is required";
}
else{
$email=test_input($_POST['email']);
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$emailErr="Invalid email format";
}
}
}
if(empty($_POST['message']))
{
$messageErr="message is required";
}
else{
$message=test_input($_POST['message']);
}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$conn= new mysqli('localhost','Anu','a1n2u3$$','getintouch');
if($conn->connect_error){
die('connection failed:' .$conn->connect_error);	
}else{
$stmt=$conn->prepare("insert into writeus(name,email,message,mobile)values(?,?,?,?)");
$stmt->bind_param("sssi",$name,$email,$message,$mobile);
$stmt->execute();
echo "sucess";
$stmt->close();
$conn->close();
}
?>
<div class="text-center">
<h1>Get in touch</h1>
</div>
<div class="container">
<div class="row">
<div class="col-md-8" style="background-color:white;border-radius:30px;box-shadow:2px 2px 2px 2px grey;width:700px;min-height:400px">
 <form method="post" id="A">
	<div class="text-center">
	   <font color="grey"><h2 >write us</h2></font>
	</div><span style="color:red">* Required field</span>
	<div class="form-group">
	   <input type="text" name="id" class="form-control mt-3"  placeholder="Id" value="<?php echo $id ?>" >
	</div>	
	<div class="form-group">
	   <input type="text" name="name" class="form-control mt-3"  placeholder="Full Name" value="<?php echo $name ?>" ><span  style="color:red">*<?php echo $nameErr;?></span>
	</div>
	<div class="form-group">
	   <input type="email" name="email" placeholder="Email" class="form-control mt-3" value="<?php echo $email ?>"><span  style="color:red">*<?php echo $emailErr;?></span><br>
	</div>
	<div class="form-group">
	   <input type="mobile" name="mobile" class="form-control mt-3"  placeholder="telxxxxxxxxx" value="<?php echo $mobile ?>"><span  style="color:red">*<?php echo $mobileErr;?></span>
	</div>
	<div class="form-group">
	   <textarea name="message" rows="5" cols="10" placeholder="your message here..............." class="form-control mt-3" value="<?php echo $message ?>"></textarea><span  style="color:red">*<?php echo $messageErr;?></span>
	</div>
	<div>
	   <input type="submit" name="submit" id ="C" value="send" class=" btn btn-primary btn-lg mt-3"> 
	</div>
 </form>
</div>
  <div class="col-md-4" style="background-color:dodgerblue;color: white;border-radius:30px;box-shadow:2px 2px 2px 2px lightblue;height:530px;">
	<div class="text-center">
	   <h1>contact us</h1>
	</div>
    <br><br><br>
   <div style="font-size: 20px"> 
	<div style="display:flex";>
		<div>
		  <i style='font-size:24px' class='fas'>&#xf041;</i>
		</div>
		<div>
		  <strong>Adreess:</strong><font size="5px">Your address here</font><br><br>
		</div>
	</div>
    <div style="display:flex";>
		<div>
		  <i style='font-size:24px' class='fas'>&#xf2a0;</i>
		</div>
		<div>
		  <strong>Phone:</strong><font size="5px">+1-000-000-000</font><br><br>
		</div>
   </div>
   <div style="display:flex";>
		<div>
		  <strong>@</strong>
		</div>
		<div>
		  <strong>Email:</strong><font size="5px"><u>example@gmail.com</u></font><br><br>
		</div>
   </div>
	<div style="display:flex";>
		<div>
		<i style='font-size:24px' class='fas'>&#xf0ac;</i>
		</div>
		<div>
		<strong>Website:</strong><font size="5px"><u>www.yourcompany.com</u></font>
		</div>
   </div>
</div>
</div>		
</div>
</div>
</body>
</html>