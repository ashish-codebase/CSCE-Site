<?php
@session_start();

if(!isset($isset['NewUserSuccess']))
{
    $_SESSION['NewUserSuccess']="";
}
if(!isset($_SESSION['logged_in']))
    {
    $_SESSION['logged_in']='false';
    }    
    if(!isset($_SESSION['current_user_mail']))
    {
    $_SESSION['current_user_mail']='';
    }  


// Change defaults using the passed parameters.
if (empty($_GET)) {
    $page_path = './pages/Main.html';
    $page_css = './CSS/Main.css';
}
else{
    $page_path = htmlspecialchars($_GET['page_path']);
    $page_css = htmlspecialchars($_GET['page_css']);
}

?>
<!DOCTYPE html>
<html lang="en-us">

<?php
    include "./pages/head.php";
?>

<body>
    <?php
    include './pages/NavBar.html';
    include $page_path;
    include './pages/Footer.php';
    ?>
</body>

</html>