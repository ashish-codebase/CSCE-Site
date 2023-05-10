<?php
    // session_status() === PHP_SESSION_ACTIVE ?: session_start();
    // echo "Starting Session from index";
    $_SESSION['NewUserSuccess']="";
    $_SESSION['logged_in'] = 'false';
    print_r($_SESSION);
    // Set default page_path and page_css values.
    $page_path = './pages/Main.html';
    $page_css = './pages/Main.css';

// Change defaults using the passed parameters.
if (!empty($_GET)) {
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