<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php

            $file= 'credentials.txt';
            $cred = file($file, FILE_IGNORE_NEW_LINES);
          
            for ($x = 0; $x < count($cred); $x++) {
                $newarray = explode(":",$cred[$x]);
                $cred[$x] = $newarray;
                
            }        
            
            $flagok=0;

            if(isset($_GET['Username']) AND isset($_GET['Password'])){
                $username = $_GET['Username'];
                $password = $_GET['Password'];
                include "connect.php";
                $sql="SELECT * FROM auth WHERE Username='$username' AND `Password`='$password'";
                $result = $conn->query($sql);
                if($result->rowCount() > 0){
                    $user=$result->fetch();
                    session_start();
                    $_SESSION["username"]=$user["Username"];
                    $_SESSION["password"]=$user["Password"];
                    $_SESSION["id"]=$user["id"];

                    header("Location: Home.php?userid=".$user["id"]."");
                }
            }

            if($flagok ==0){
                echo  "Wrong password";
            }
              


?>
</body>
</html>


