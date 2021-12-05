<?php
include ('init.php');
if (count($_POST) > 0){
// something was posted
$User = new  User();
$errors = $User->create($_POST);
if (is_array($errors) &&  count($errors) ==0)
{
header("location: login.php");
die;
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>signup page </title>
</head>
<body>
<?php
include('header.php');
 ?>
 <br>
<h1> Signup </h1> <br>
<form method="post" >
<?php
if (isset($errors) && count($errors) 	> 0){
            foreach ($errors as $error )
            {
            echo $error. "<br>";
            }
}
?>
<hr>
<input type="text" name="username"  placeholder="Username" value="<?=isset($_POST['username']) ? $_POST['username']: '';  ?>" > <br>
<input type="email"  name="email" placeholder="Email"  value="<?=isset($_POST['email']) ? $_POST['email']: '';  ?>" > <br>
<input type="text"  name="password" placeholder="password"  value="<?=isset($_POST['password']) ? $_POST['password']: '';  ?>">  <br>
<input type="submit"  value="Signup" >
</form>
</body>
</html>