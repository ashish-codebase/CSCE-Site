<?php

// session_status() === PHP_SESSION_ACTIVE ?: session_start();
// @session_start();
// if(session_status() !== PHP_SESSION_ACTIVE)
// {
//     @session_start();
//     $_SESSION['NewUserSuccess']="";
//     $_SESSION['logged_in']='false';
// }

// if(session_status() !== PHP_SESSION_NONE) 
// {
//     @session_start();
//     $_SESSION['NewUserSuccess']="";
//     $_SESSION['logged_in']='false';
// }

    // echo "Starting Session form register main";
    // $_SESSION['NewUserSuccess']="";
    // $_SESSION['logged_in']='false';
    // print_r($_SESSION);
    
?>
<style>
    .Register {
        padding: 20px;
        background-color: #bdca99;
    }

    .td-1 {
        width: 500px;
    }
</style>
<main class="Register">
    <div class="container">
        <div class="row">
            <div class="col  bg60-2 m-3 p-3">
                <h2>Register</h2>
                <p><strong>Login / Register to select your favourite station.</strong></p>
                <form method="post" action="register_new.php" >
                    <div class="container">
                        <div class="row">
                            <label class="col-lg">Email Address:</label>
                            <input class="col-lg" type="text" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email not matching abc.xyz@efg.com patern." /></input>
                        </div>

                        <div class="row">
                            <label class="col-lg">Passowrd:</label>
                            <input class="col-lg" type="password" name="Password" /></input>
                        </div>

                        <div class="row">
                            <label class="col-lg">First Name:</label>
                            <input class="col-lg" type="text" name="FName" /></input>
                        </div>

                        <div class="row">
                            <label class="col-lg">Last Name:</label>
                            <input class="col-lg" type="text" name="LName" /></input>
                        </div>

                        <div class="row">
                            <label class="col-lg">Phone Number:</label>
                            <input class="col-lg" type="text" name="Phone" pattern="[0-9]{10,13}" title="Phone no. must have 10-13 digits." /></input>
                        </div>

                    </div>
                    <br>
                    <input class="btn-lg btn btn-info" type="submit" value="Register" />
                </form>
                <?php
                echo $_SESSION['NewUserSuccess'];
                ?>
                <br>
            </div>
            <div class="login-box col-md bg60-2 m-3 p-3">
                <h2>Login</h2>
                <form method="post" action="login_user.php">
                    <div class="container">
                        <div class="row">
                            <label class="col-lg" for="username">Email:</label>
                            <input class="col-lg" type="text" id="username" name="Email" required>
                        </div>
                        <div class="row">
                            <label class="col-lg" for="password">Password:</label>
                            <input class="col-lg" type="password" id="password" name="Password" required>
                        </div>
                    </div>
                    <br>
                    <input class="btn-lg btn btn-info m-2" type="submit" value="Login">
                    <input class="btn-lg btn btn-info m-2" type="submit" value="Logout">

                </form>
            </div>
            <?php
        if ($_SESSION['logged_in']=='true')
        {
         include "./pages/user_table.php";
        }
          ?>
        </div>

    </div>
</main>
</div>