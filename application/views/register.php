<?php 
    include('header.php');
    
    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 

<div id="slick-login">
    <h1><a href="<?php echo $loginUrl;?>">Login</a></h1>
    <form action="<?php echo $registerUrl; ?>" method="post" name="registration_form"> 
        <input type="text" name="username" placeholder="Username" id="username" required="required"/>
        <input type="text" name="email" placeholder="Email" id="email" required="required" />
        <input type="password" name="password" placeholder="Password" id="password" required="required" />
        <input type="password" name="confirmpwd" placeholder="Confirm password" id="confirmpwd" required="required" />
        <input type="button" 
               value="Become a member"
               class="btn btn-primary btn-block btn-large" 
               onclick="return regformhash(this.form,
                           this.form.username,
                           this.form.email,
                           this.form.password,
                           this.form.confirmpwd);"  />
    </form>
</div>

<?php include('footer.php');