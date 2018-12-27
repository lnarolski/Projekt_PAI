<?php
    error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Sklep komputerowy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <?php
    switch ($_GET["subpage"]) {
        case 'admin':
            break;
        case 'products':
            break;
        case 'contact':
            break;
        default:
            break;
    }
    ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
    include("menu.php");
?>

<div class="jumbotron text-center">
    <h1>Sklep komputerowy</h1> 
    <p>Tylko u nas znajdziesz najnowsze produkty w najniższych cenach!</p>
</div>

<?php
    switch ($_GET["subpage"]) {
        case 'admin':
            if(!isset($_SESSION['login_user'])){
                include('login.php');
            }
            else {
                include('adminPanel.php');
            }
            break;
        case 'products':
            # code...
            break;
        case 'contact':
        # code...
        break;
        default:
            echo "
            ";
            break;
    }
?>



<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
