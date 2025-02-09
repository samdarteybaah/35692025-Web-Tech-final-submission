<!DOCTYPE HTML>
<html>
    <head>
        <title>Login | SmartFlash</title>
        <link rel="stylesheet" type="text/css" href="../stylesheet/styleLogin.css">
        <meta charset="UTF-8">
        <meta name="description" content="The best tool for students to learn fast and hard">
    </head>
    <body>
        <header>
            <a href = "../index.php">
                <h1 class="logo">SmartFlash</h1>
            </a>  
        </header>

        <main>
            <svg id="visual" viewBox="0 0 900 600" width="900" height="600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><path d="M0 61L37.5 57C75 53 150 45 225 44C300 43 375 49 450 52C525 55 600 55 675 56C750 57 825 59 862.5 60L900 61L900 0L862.5 0C825 0 750 0 675 0C600 0 525 0 450 0C375 0 300 0 225 0C150 0 75 0 37.5 0L0 0Z" fill="#837cff"></path><path d="M0 91L37.5 94C75 97 150 103 225 107C300 111 375 113 450 116C525 119 600 123 675 121C750 119 825 111 862.5 107L900 103L900 59L862.5 58C825 57 750 55 675 54C600 53 525 53 450 50C375 47 300 41 225 42C150 43 75 51 37.5 55L0 59Z" fill="#7068ff"></path><path d="M0 289L37.5 293C75 297 150 305 225 306C300 307 375 301 450 288C525 275 600 255 675 259C750 263 825 291 862.5 305L900 319L900 101L862.5 105C825 109 750 117 675 119C600 121 525 117 450 114C375 111 300 109 225 105C150 101 75 95 37.5 92L0 89Z" fill="#5b52ff"></path><path d="M0 349L37.5 354C75 359 150 369 225 367C300 365 375 351 450 333C525 315 600 293 675 294C750 295 825 319 862.5 331L900 343L900 317L862.5 303C825 289 750 261 675 257C600 253 525 273 450 286C375 299 300 305 225 304C150 303 75 295 37.5 291L0 287Z" fill="#433bff"></path><path d="M0 427L37.5 427C75 427 150 427 225 418C300 409 375 391 450 381C525 371 600 369 675 370C750 371 825 375 862.5 377L900 379L900 341L862.5 329C825 317 750 293 675 292C600 291 525 313 450 331C375 349 300 363 225 365C150 367 75 357 37.5 352L0 347Z" fill="#3c33ea"></path><path d="M0 559L37.5 551C75 543 150 527 225 518C300 509 375 507 450 505C525 503 600 501 675 504C750 507 825 515 862.5 519L900 523L900 377L862.5 375C825 373 750 369 675 368C600 367 525 369 450 379C375 389 300 407 225 416C150 425 75 425 37.5 425L0 425Z" fill="#352cd5"></path><path d="M0 601L37.5 601C75 601 150 601 225 601C300 601 375 601 450 601C525 601 600 601 675 601C750 601 825 601 862.5 601L900 601L900 521L862.5 517C825 513 750 505 675 502C600 499 525 501 450 503C375 505 300 507 225 516C150 525 75 541 37.5 549L0 557Z" fill="#2e25c0"></path></svg>

            <div class="formbox">
                <div class="welcomebox">
                    <h2>Heya! <br> welcome back</h2>
                </div>
                <form action="../action/login_user_action.php" method="POST">
                    <div class="form_cred">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" required>
                    </div>
                    <br>

                    <div class="form_cred">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form_button">
                        <input type="submit" value="Login" id="login" name="login">
                    </div>
                    <br>
                    <div class="account_message">
                        <a href="../index.php">HOME</a> > SIGN IN
                    <br>
                        Don't have an account? <a id="login_message" href="Register_view.php"> SIGN UP HERE</a>  
                    </div>
                </form>
            </div>
        </main>




    </body>




</html>