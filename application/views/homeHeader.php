<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/JavaScript" src="/www/public/js/sha512.js"></script> 
        <script type="text/JavaScript" src="/www/public/js/forms.js"></script>
        <script type="text/JavaScript" src="/www/public/js/placeholder.js"></script>
        <script type="text/JavaScript" src="/www/public/js/ajax.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="/www/public/css/main.css" />
        <link rel="stylesheet" href="/www/public/css/auth.css" />
        <link rel="stylesheet" href="/www/public/css/timeline.css" />
        <link rel="stylesheet" href="/www/public/css/form_style.css" />

   		<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

        <script type="text/javascript">  
          $(document).ready(function() {
            var lastDate = "<?php echo $lastDate; ?>"; 
            getLatestMessages(lastDate);
          });

          $(document).ready(function() {
            var firstDate = "<?php echo $firstDate; ?>";
            getPreviewsMessages(firstDate);
          });
        </script>
    </head>
    <body>