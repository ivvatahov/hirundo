<?php 
    include('header.php');
    include('menu.php');
    
    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 

<h1>Welcome!<?php echo $username; ?></h1>


<?php include('footer.php');