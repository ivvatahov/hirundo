<?php 
    include('header.php');
    include('menu.php');

    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 
<!-- The Timeline -->
<ul class="timeline">
<?php foreach ($messages as $message) { ?>
	<!-- Item 1 -->
	<li>
		<div class="direction-r">
			<div class="flag-wrapper">
				<span class="flag"><?php echo $username; ?></span>
				<span class="time-wrapper"><span class="time">TODO: add date</span></span>
			</div>
			<div class="desc"><?php echo $message->getContent(); ?></div>
		</div>
	</li>
<?php } ?>
</ul>
<?php include('footer.php');