<style>
    .login-box {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #000;
        background: orange;
        padding: 10px;
        border: 2px solid transparent;
        border-radius: 10px;
    }

    .login-box h1 {
        text-align: center;
        font-size: 40px;
        margin-bottom: 50px;
    }

    .login-box label {
        font-size: 20px;
        display: block;
        margin-bottom: 10px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
        border: none;
        border-bottom: 1px solid #fff;
        /* background: transparent; */
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
    }

    .login-box input[type="submit"] {
        border: none;
        outline: none;
        height: 40px;
        background: #1c8adb;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
    }

    .login-box input[type="submit"]:hover {
        background: #39ace7;
        transition: 0.5s;
    }
</style>
<div class="login-box">
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>
<script src="script.js"></script>