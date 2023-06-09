
<?php 
if( ! isset($_GET['name']) || strlen($_GET['name']) <1 ){
    die('Name parameter missing');
}

if (isset($_POST['logout'])){
    header('Location: ./index.php');
    return;
}

$name = ['Rock','Paper','Scissors'];
$human = isset($_POST["human"]) ? $_POST["human"]+0 : -1;
$computer = 0;

function check($computer,$human){
    if ($human == 0){
        return "Tie";
    }else if ($human == 1){
        return "You Win";
    }else if ($human == 2){
        return "You Lose";
    }
    return false;
}

$result = check($computer,$human);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shin Min _ Game Page</title>
    <?php require_once "bootstrap.php"; ?>
</head>
<body>
    <div class="container">
        <h1>Rock Paper Scissors</h1>
        <?php
        if(isset($_REQUEST['name'])){
            echo "<p>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }

     
        ?>

        <form action="" method="post">
            <select name="human" id="">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play">
            <input type="submit" name="logout" id="" value = "Logout">
        </form>
    
    <pre>
        <?php
        if($human == -1){
            print "Please select a strategy and press Play.\n";
        }else if ($human == 3){
            for($c=0;$c<3;$c++){
                for($h=0;$h<3;$h++){
                $r = check($c,$h);
                print "Human=$name[$h] Computer=$name[$c] Result=$r\n";
                }
            }
        }else{
            print "You Play=$name[$human] Computer Play=$name[$computer] Result=$result\n";
        }
        ?>
    </pre>
    </div>
    
</body>
</html>