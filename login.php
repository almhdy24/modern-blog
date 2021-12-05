<?php
include ('init.php');
if (count($_POST) > 0){
$User = new  User();
$errors = $User->login($_POST);
if (is_array($errors) &&  count($errors) ==0)
{
header("location: index.php");
die;
    }

?>
<!DOCTYPE html>
<html>
<head>
<title>login page </title>
</head>
<body>
<?php
include('header.php');
 ?>
 <br>
<h1> login</h1>
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
<br>
<input type="email"  name="email" placeholder="Email"  value="<?=isset($_POST['email']) ? $_POST['email']: '';  ?>" > <br>
<input type="password"  name="password" placeholder="password"  value="<?=isset($_POST['password']) ? $_POST['password']: '';  ?>">  <br>
<input type="submit"  value="login"> 
</form>

</body>
</html>