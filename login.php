
<?php
if (isset($_POST['cancel'])){
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = 'a8609e8d62c043243c4e201cbb342862'; // Pw is meow123

$result = false;

if(isset($_POST['login'])){
    $who = htmlentities($_POST['who']);
    $pass = htmlentities($_POST['pass']);
}
if(isset($who) && isset($pass)){
    if(strlen($who)<1 || strlen($pass)<1){
        $result = "User name and password are required.";
    }else{
        $check = hash('md5',$salt.$pass);
        if($check == $stored_hash){
            header("Location: game.php?name=".urlencode($who));
            return;
        }else{
            $result = "Incorrect password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shin Min - Login Page</title>
    <?php require_once "bootstrap.php"?>
</head>
<body>
   <div class="container">
   <h1>Please Log In</h1>
    <div class="row">
        
             <form action="" method="post" class="form-group"> 
               <div class="col-lg-6">
               <label for="name">Username</label>
                 <input type="text" name="who" id="name" class="form-control"><br>
               </div>

               <div class="col-lg-6">
               <label for="password">Password</label>
                 <input type="text" name="pass" id="password" class="form-control"><br>
               </div>

 

                 <input type="submit" name="login" id="" value="Log In">
                 <input type="submit" value="Cancel" name="cancel">
             </form>
        
    </div>
   </div>
    <?php
     if ($result !== false){
        echo('<p style="color: red;">'.htmlentities($result)."</p>\n");
     } 
     ?>
    <p>For a password hint,view source and find a password hint in the HTML comments.</p>

</body>
</html>