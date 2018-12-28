<?php
// Include config file
require_once "config.php";
mysqli_query($db, "SET NAMES utf8");
 
// Define variables and initialize with empty values
$name = "";
$name_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Podaj nazwę podkategorii.";
    } else{
        $name = $input_name;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err)){
        // Prepare an update statement
        $sql = "UPDATE categories SET name=? WHERE id=?";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_name, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM categories WHERE id = ?";
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
                    $name = $row["name"];
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
                        <h2>Edytuj kategorię</h2>
                    </div>
                    <p>Uzupełnij formularz w celu edycji kategorii.</p>
                    <form action="./index.php?subpage=admin&edit=categories&action=edit" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nazwa kategorii</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Wyślij">
                        <a href="./index.php?subpage=admin&edit=subcategories" class="btn btn-default">Anuluj</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>