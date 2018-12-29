<?php
// Include config file
require_once "config.php";
mysqli_query($db, "SET NAMES utf8");
 
// Define variables and initialize with empty values
$login = $pass = "";
$login_err = $pass_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
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
        // Prepare an update statement
        $sql = "UPDATE admins SET login=?, pass=? WHERE id=?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_login, $param_pass, $param_id);
            
            // Set parameters
            $param_login = $login;
            $param_pass = md5($pass);
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM admins WHERE id = ?";
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $login = $row["login"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    echo("Wystąpił błąd.");
                    exit();
                }
                
            } else{
                echo "Wystąpił błąd. Spróbuj ponownie później.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($db);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        echo("Wystąpił błąd.");
        exit();
    }
}
?>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Edytuj administratora</h2>
                    </div>
                    <p>Uzupełnij formularz w celu edycji administratora.</p>
                    <form action="./index.php?subpage=admin&edit=admins&action=edit" method="post">
                        <div class="form-group <?php echo (!empty($login_err)) ? 'has-error' : ''; ?>">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" value="<?php echo $login; ?>">
                            <span class="help-block"><?php echo $login_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label>Hasło</label>
                            <input type="password" name="pass" class="form-control" value="">
                            <span class="help-block"><?php echo $pass_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Wyślij">
                        <a href="./index.php?subpage=admin&edit=admins" class="btn btn-default">Anuluj</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>