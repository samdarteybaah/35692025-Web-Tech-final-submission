<!DOCTYPE HTML>
<html>
    <head>
        <title>Register | SmartFlash</title>
        <link rel="stylesheet" type="text/css" href="../stylesheet/styleLogin.css">
        <meta charset="UTF-8">
        <meta name="description" content="The best tool for students to learn fast and hard">
        <script src="../js/register.js"></script>
    </head>
    <body>
        <header>
            <a href = "../index.php">
                <h1 class="logo">SmartFlash</h1>
            </a>  
        </header>

        <main>

            <div class="formbox">
                <div class="welcomebox">
                    <h2>Become an academic weapon. <br> Sign Up Today!</h2>
                </div>
                <form action="../action/register_user_action.php" method="POST">
                        <div class="form_cred">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required pattern="[A-Za-z]{1,}">
                        </div>
                        <div class="form_cred">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required pattern="[A-Za-z]{1,}">
                        </div>
                        <div class="form_cred">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        </div>
                        <div class="form_cred" id="password-container">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required pattern="(?=.*[A-Z])(?=.*[0-9]).{8,}">
                            <!-- <p id="password-error" class="error"></p> -->
                        </div>
                        <div class="password-requirements">
                            Password must have:
                            <ul>
                                <li>At least one uppercase letter (A-Z)</li>
                                <li>At least one digit (0-9)</li>
                                <li>Minimum length of 8 characters</li>
                            </ul>
                        </div>
                        <div class="form_cred">
                            <label for="retypePassword">Retype Password:</label>
                            <input type="password" id="retypePassword" name="retypePassword" placeholder="Retype your password" required>
                            <div class="retry_password_requirements">
                                Password must be the same as entered above
                            </div>
                            
                        </div>

                    <div class="form_button">
                        <input type="submit" value="Login" id="login" name="login">
                    </div>
                    <br>
                    <div class="account_message">
                        <a href="../index.php">HOME</a> > SIGN UP
                    <br>
                        Already have an account? <a id="login_message" href="Login_view.php"> SIGN IN HERE</a>  
                    </div>
                </form>
            </div>
        </main>

    </body>

    




</html>