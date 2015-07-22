<?php 
    include('header.php');
    
    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 

<div id="slick-login">
    <h1>Login / <a href="<?php echo $registerUrl;?>">Register</a> </h1>
    <form action="<?php echo $loginUrl; ?>" method="post" name="login_form">  
        <label for="username">username</label> 
        <input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <input type="button" 
               value="Let me in." 
               onclick="formhash(this.form, this.form.password);" 
               class="btn btn-primary btn-block btn-large" /> 
    </form>
</div>

<?php include('footer.php');