<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
include ('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    
    $myusername = mysqli_real_escape_string($db,$_POST['login']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

    if(!filter_var($myusername, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9_]+$/")))){
        echo("<center><label><font color=\"red\">Nieprawidłowa nazwa użytkownika</font></label></center>");
    }
    else {
        $sql = "SELECT id FROM admins WHERE login = '$myusername' and pass = '" . md5($mypassword) . "'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
        
        if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        
        header("location: index.php?subpage=admin");
        } else {
        echo("<center><label><font color=\"red\">Nieprawidłowa nazwa użytkownika lub hasło</font></label></center>");
        }
    }
 }
?>

<div align="center">
    <form class="loginForm" action = "" method = "post">
        <label>Login:</label><input type = "text" name = "login" class = "box"/><br /><br />
        <label>Hasło:</label><input type = "password" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " Zaloguj "/><br />
    </form>
</div>