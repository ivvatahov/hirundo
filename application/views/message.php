<?php 
    include('header.php');
    include('menu.php');

    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 
<form action="<?php echo $messageUrl; ?>" method="post" class="bootstrap-frm">
    <h1>Contact Form 
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>Message :</span>
        <textarea id="message" name="message" placeholder="Your Message"></textarea>
    </label> 
   
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="Send" /> 
    </label>    
</form>
<?php include('footer.php');