<?php
    @session_start();
?>
<style>
    .Register {
        /* padding: 20px; */
        background-color: #bdca99;
    }

    .td-1 {
        width: 500px;
    }

    .col,
    .col-lg {
        /* border-style: solid; */
        border-width: 1px;
    }
</style>
<main class="Register">
    <div class="container">
        <div class="row">
            <div class="col col-5 me-3 mt-3 mb-3 bg60-1 p-3">
                <h2>Register</h2>
                <p><strong>Register to save your preferences.</strong></p>
                <form method="post" action="register_new.php">
                    <div class="container">
                        <div class="row">
                            <label class="col-3">Email Address:</label>
                            <input class="col-7" type="text" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email not matching abc.xyz@efg.com patern." /></input>
                        </div>

                        <div class="row ">
                            <label class="col-3">Passowrd:</label>
                            <input class="col-7 " type="password" name="Password" /></input>
                        </div>

                        <div class="row">
                            <label class="col-3 ">First Name:</label>
                            <input class="col-7" type="text" name="FName" /></input>
                        </div>

                        <div class="row">
                            <label class="col-3">Last Name:</label>
                            <input class="col-7" type="text" name="LName" /></input>
                        </div>

                        <div class="row">
                            <label class="col-3">Phone Number:</label>
                            <input class="col-7" type="text" name="Phone" pattern="[0-9]{10,13}" title="Phone no. must have 10-13 digits." /></input>
                        </div>

                    </div>
                    <br>
                    <input class="btn-lg btn btn-info" type="submit" value="Register" />
                </form>

                <br>
            </div>
            <?php
                // echo "<div>You already have an account: ".$_SESSION['current_user_mail']."</div>";
            if ($_SESSION['logged_in'] === "false") {    
                echo "<div>".$_SESSION['NewUserSuccess']."</div>";
            }
            ?>
            <div class="col col-5 mt-3 mb-3 me-3 bg60-1 p-3">
                <h2>Login</h2>
                <p><strong>Login to load your preferences.</strong></p>

                <form method="post" action="login_user.php">
                    <div class="flex-container">
                        <div class="container">
                            <div class="row">
                                <label class="col-3" for="username">Email:</label>
                                <input class="col-7" type="text" id="username" name="Email" required>
                            </div>
                            <div class="row">
                                <label class="col-3" for="password">Password:</label>
                                <input class="col-7" type="password" id="password" name="Password" required>
                            </div>
                        </div>
                    </div>

                    <br>
                    <input class="btn-3 btn btn-info m-2" type="submit" value="Login">
                    <input class="btn-7 btn btn-info m-2" type="submit" value="Logout">
                </form>
            </div>
            <?php
            if ($_SESSION['logged_in'] === 'true') {
                include "./pages/user_table.php";
            }
            ?>
        </div>
    </div>
</main>
</div>