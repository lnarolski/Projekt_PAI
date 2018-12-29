<?php
    error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include('header.php'); ?>
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
        include('config.php');
            session_start();
            $user_check = $_SESSION['login_user'];
            $ses_sql = mysqli_query($db,"select login from admins where login = '$user_check' ");
            $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
            $login_session = $row['login'];
            if(!isset($_SESSION['login_user'])){
                include('login.php');
            }
            else {
                include('adminPanel.php');
            }
            break;
        case 'products':
            include('products.php');
            break;
        case 'contact':
            include('contact.php');
        break;
        default:
            include('home.php');
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
