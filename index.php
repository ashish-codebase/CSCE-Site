<?php
// @session_start();
if(!isset($_SESSION))
{
    @session_start();
    $_SESSION['NewUserSuccess']="";
    $_SESSION['logged_in']='false';
}

// Change defaults using the passed parameters.
if (empty($_GET)) {
    $page_path = './pages/Main.html';
    $page_css = './pages/Main.css';
}
else{
    $page_path = htmlspecialchars($_GET['page_path']);
    $page_css = htmlspecialchars($_GET['page_css']);
}

?>
<!DOCTYPE html>
<html lang="en-us">

<?php
    // Send the page_css (either default for main page or updated values for other pages)
    include "./pages/head.php";
?>

<body>
    <?php
    // echo "PHP query string passed path = " . $page_path;
    include './pages/NavBar.html';
    include $page_path;
    include './pages/Footer.php';
    ?>
</body>

</html>