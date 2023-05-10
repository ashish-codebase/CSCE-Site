<?php
        echo "calling user_table";
?>
<style>
    .Register {
        padding: 20px;
        background-color: #bdca99;
    }

    .td-1 {
        max-width: 200px;
    }
</style>
<main class="Register">
    <div class="container">
        <div class="row">
            <div class="col  bg60-2 m-2">
                <h2>Register</h2>
                <p><strong>Login / Register to select your favourite station.</strong></p>
                <form id="contactForm" onsubmit="feedbackFormValidate()">
                    <table style="width:50%;">
                        <tr>
                            <td class="td-1">Salutation:</td>
                            <td><select name="salute">
                                    <option>&nbsp;</option>
                                    <option>Mrs.</option>
                                    <option>Ms.</option>
                                    <option>Mr.</option>
                                    <option>Dr.</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="td-1">E-mail Address:</td>
                            <td><input class="reg-width" type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td class="td-1">Password:</td>
                            <td><input class="reg-width" type="password" name="email"></td>
                        </tr>
                        <tr>
                            <td class="td-1">First Name:</td>
                            <td><input class="reg-width" type="text" name="firstName"></td>
                        </tr>
                        <tr>
                            <td class="td-1">Last Name:</td>
                            <td><input class="reg-width" type="text" name="lastName"></td>
                        </tr>
                        <tr>
                            <td class="td-1">Phone Number123:</td>
                            <td><input class="reg-width" type="text" name="phone"></td>
                        </tr>
                        <tr>
                            <td><input class="btn-lg btn btn-info" type="submit" value="Submit"></td>
                            <td><input class="btn btn-danger btn-lg" type="reset" value="Reset Form"></td>
                        </tr>
                    </table>
                </form>
                <br>
                <!-- <button type="button" class="btn btn-success btn-lg" id="login-button">Login</button> -->
                <!-- <h2><a href="./index.php?page_path=./pages/LoginMain.php&page_css=./CSS/LoginMain.css">Login</a></h2> -->
            </div>
            <div class="login-box col bg60-2 m-2">
                <h2 style="text-align: left; padding:20px 0;">Login</h2>
                <form class="login-form" method="post" action="login.php">
                    <div style="padding:10px 0;">
                        <label style="width:80px;" for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div style="padding:10px 0;">
                        <label style="width:80px;" for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <input class="btn-lg btn btn-info" type="submit" value="Login">
                </form>
            </div>
        </div>
        <?php
        echo "calling user_table";
        include "./user_table.php";
        ?>
    </div>

</main>
<script>
    // const updateButton = document.getElementById("login-button");
    // updateButton.addEventListener("click", () => {
    //     console.log("button clicked");
    //     // dialog.showModal();
    //     // openCheck(dialog);
    // });

    function feedbackFormValidate() {
        var contactFormObj = document.getElementById("contactForm");
        var firstName = contactFormObj.firstName.value;
        var lastName = contactFormObj.lastName.value;
        var phone = contactFormObj.phone.value;
        var email = contactFormObj.email.value;
        var everythingOK = true;

        if (!validateName(firstName)) {
            alert("Error: Invalid first name.");
            everythingOK = false;
        }

        if (!validateName(lastName)) {
            alert("Error: Invalid last name.");
            everythingOK = false;
        }

        if (!validatePhone(phone)) {
            alert("Error: Invalid phone number.");
            everythingOK = false;
        }

        if (!validateEmail(email)) {
            alert("Error: Invalid e-mail address.");
            everythingOK = false;
        }

        if (everythingOK) {
            if (contactFormObj.reply.checked)
                alert("Warning: The e-mail feature is currently not supported.");
            alert("All the information looks good./nThank you!");
            return true;
        } else
            return false;
    }

    function validateName(name) {
        var p = name.search(/^[-'\w\s]+$/);
        if (p == 0)
            return true;
        else
            return false;
    }

    function validatePhone(phone) {
        var p1 = phone.search(/^\d{3}[-\s]{0,1}\d{3}[-\s]{0,1}\d{4}$/);
        var p2 = phone.search(/^\d{3}[-\s]{0,1}\d{4}$/);
        if (p1 == 0 || p2 == 0)
            return true;
        else
            return false;
    }

    function validateEmail(address) {
        var p = address.search(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/);
        if (p == 0)
            return true;
        else
            return false;
    }
</script>
</div>