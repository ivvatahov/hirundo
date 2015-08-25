<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="/www/public/js/sha512.js"></script> 
        <script type="text/JavaScript" src="/www/public/js/forms.js"></script>
        <script type="text/JavaScript" src="/www/public/js/placeholder.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="/www/public/css/main.css" />
        <link rel="stylesheet" href="/www/public/css/auth.css" />
        <link rel="stylesheet" href="/www/public/css/timeline.css" />
        <link rel="stylesheet" href="/www/public/css/form_style.css" />

   		  <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
		    <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
		    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">


        <script type="text/javascript">
        var lastDate = "<?php echo current($messages)->getPublicationDate()->format($dataTimeFormat); ?>"; 

        $(document).ready(function worker(){
                $.ajax({
                  url: "latestMessages",
                  type: 'GET',
                  data: { date: lastDate,
                          rt: "latestMessages"},
                  beforeSend: function(x) {
                    if(x && x.overrideMimeType) {
                      x.overrideMimeType("application/j-son;charset=UTF-8");
                    }
                  },
                  dataType: "json",
                  success: function(data){
                    alert(lastDate);
                    lastDate = data[0].publicationDate.date;
                    $.each(data, function(i, message) {
                      $("#timeline").prepend( 
                        '<li> '+
                        '<div class="direction-r" id="div1">' +
                        '<div class="flag-wrapper">' +
                        '<span class="flag">'+ message.publisher + '</span>' +
                        '<span class="time-wrapper"><span class="time">' + message.publicationDate.date + '</span></span>' +
                        '</div>' +
                        '<div class="desc">'+ message.content + '</div>' +
                        '</div>' +
                        '</li>'
                      );
                    });
                  },
                  complete: function() {
                    // Schedule the next request when the current one's complete
                    setTimeout(worker, 5000);
                  }
              });
        });        

        </script>
    </head>
    <body>