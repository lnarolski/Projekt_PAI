<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM products WHERE id = ?";
    
    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: ./index.php?subpage=admin&edit=products");
            exit();
        } else{
            echo "Wystąpił problem. Spróbuj ponownie później.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($db);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        echo("Błąd podczas usuwania");
        exit();
    }
}
?>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Usuń produkt</h1>
                    </div>
                    <form action="./index.php?subpage=admin&edit=products&action=del" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Czy na pewno chcesz usunąć produkt?</p><br>
                            <p>
                                <input type="submit" value="Tak" class="btn btn-danger">
                                <a href="./index.php?subpage=admin&edit=products" class="btn btn-default">Nie</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>