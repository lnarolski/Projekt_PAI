<?php
// Include config file
require_once "config.php";
mysqli_query($db, "SET NAMES utf8");
 
// Define variables and initialize with empty values
$login = $pass = "";
$login_err = $pass_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate login
    $input_login = trim($_POST["login"]);
    if(empty($input_login)){
        $login_err = "Wprowadź login administratora.";
    }
    elseif (!filter_var($input_login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z_]+$/")))) {
        $login_err = "Nieprawidłowy login (tylko litery i cyfry).";
    }
    else{
        $login = $input_login;
    }

    // Validate pass
    $input_pass = trim($_POST["pass"]);
    if(empty($input_pass)){
        $pass_err = "Wprowadź hasło administratora.";
    }
    else{
        $pass = $input_pass;
    }
    
    // Check input errors before inserting in database
    if(empty($login_err) && empty($pass_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO admins (login, pass) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_login, $param_pass);
            
            // Set parameters
            $param_login = $login;
            $param_pass = md5($pass);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ./index.php?subpage=admin&edit=admins");
                exit();
            } else{
                echo "Wystąpił błąd. Spróbuj ponownie później.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($db);
}
?>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Utwórz rekord</h2>
                    </div>
                    <p>Uzupełnij formularz w celu dodania administratora.</p>
                    <form action="./index.php?subpage=admin&edit=admins&action=add" method="post">
                        <div class="form-group <?php echo (!empty($login_err)) ? 'has-error' : ''; ?>">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" value="<?php echo $login; ?>">
                            <span class="help-block"><?php echo $login_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label>Hasło</label>
                            <input type="password" name="pass" class="form-control" value="<?php echo $pass; ?>">
                            <span class="help-block"><?php echo $pass_err;?></span>
                        </div>
                        <input formmethod="post" type="submit" class="btn btn-primary" value="Dodaj">
                        <a href="./index.php?subpage=admin&edit=admins" class="btn btn-default">Anuluj</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>