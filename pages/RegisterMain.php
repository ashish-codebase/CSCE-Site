<style>
    .Feedback {
        padding: 20px;
        background-color: #bdca99;
    }
    .td-1{
        max-width: 200px;
    }
    .feedback-div{
        margin: 0 auto;
        max-width: 800px;
    }
</style>
<main class="Feedback">
    <div class="feedback-div">
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
                    <td class="td-1">First Name:</td>
                    <td><input class="reg-width" type="text" name="firstName"></td>
                </tr>
                <tr>
                    <td class="td-1">Last Name:</td>
                    <td><input class="reg-width" type="text" name="lastName"></td>
                </tr>
                <tr>
                    <td class="td-1">E-mail Address:</td>
                    <td><input class="reg-width" type="text" name="email"></td>
                </tr>
                <tr>
                    <td class="td-1">Phone Number:</td>
                    <td><input class="reg-width" type="text" name="phone"></td>
                </tr>
                <tr>
                    <td class="td-1">Subject:</td>
                    <td><input class="reg-width" type="text" name="subject"></td>
                </tr>
                <tr>
                    <td class="td-1">Comments:</td>
                    <td><textarea class="reg-width" name="message" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">Please check here if you wish to receive a reply:
                        <input type="checkbox" name="reply" value="yes">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Send Feedback"></td>
                    <td><input type="reset" value="Reset Form"></td>
                </tr>
            </table>
        </form>
        <br>
        <h2 ><a href=".\Login.php">Login</a></h2>
</main>
</div>
<script>
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
