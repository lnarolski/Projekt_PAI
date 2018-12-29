<?php
// Include config file
require_once "config.php";
mysqli_query($db, "SET NAMES utf8");
$sql_categories = 'SELECT `id`, `name`
            FROM `categories`
            ORDER BY `name`';
$wynik = mysqli_query($db, $sql_categories);

// Define variables and initialize with empty values
$name = $id = "";
$name_err = $id_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Wprowadź nazwę podkategorii.";
    } else{
        $name = $input_name;
    }

    // Validate category id
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Niepawidłowa kategoria (parametr wymagany).";     
    } elseif(!ctype_digit($input_id)){
        $id_err = "Niepawidłowa kategoria (parametr wymagany).";
    } else{
        $id = $input_id;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($category_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO subcategories (name, category) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_name, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_id = $id;
            
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
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Nazwa kategorii</label></br>
                            <select name="id">
                                <?php 
                                    while ($kategoria = @mysqli_fetch_array($wynik)) {
                                        $category = $kategoria['name'];
                                        $id = $kategoria['id'];
                                        echo("<option value=\"$id\">$category</option>");
                                    }
                                ?>
                            </select>
                        </div>
                        <input formmethod="post" type="submit" class="btn btn-primary" value="Dodaj">
                        <a href="./index.php?subpage=admin&edit=subcategories" class="btn btn-default">Anuluj</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>