<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
       <script type="text/JavaScript" src="/www/public/js/sha512.js"></script> 
        <script type="text/JavaScript" src="/www/public/js/forms.js"></script>
    </head>
    <body>
        <?php
            if (!empty($error_msg)) {
                echo $error_msg;
            }
        ?> 
        <form action="<?php echo $loginUrl; ?>" method="post" name="login_form">                      
            Username: <input type="text" name="username" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>     
    </body>
</html>