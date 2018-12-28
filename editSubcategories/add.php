<?php
// Include config file
require_once "config.php";
mysqli_query($db, "SET NAMES utf8");
 
// Define variables and initialize with empty values
$name = "";
$name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Wprowadź nazwę podkategorii.";
    } else{
        $name = $input_name;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO categories (name) VALUES (?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = $name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ./index.php?subpage=admin&edit=subcategories");
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
                    <p>Uzupełnij formularz w celu dodania podkategorii.</p>
                    <form action="./index.php?subpage=admin&edit=subcategories&action=add" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nazwa podkategorii</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <input formmethod="post" type="submit" class="btn btn-primary" value="Dodaj">
                        <a href="./index.php?subpage=admin&edit=subcategories" class="btn btn-default">Anuluj</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>