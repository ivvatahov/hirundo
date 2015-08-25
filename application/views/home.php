<?php 
    include('homeHeader.php');
    include('menu.php');

    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 
<!-- The Timeline -->
<ul class="timeline" id="timeline">
<?php foreach ($messages as $message) { ?>
	<!-- Item 1 -->
	<li>
		<div class="direction-r" id="div1">
			<div class="flag-wrapper">
				<span class="flag"><?php echo $message->getPublisher()->getUsername(); ?></span>
				<span class="time-wrapper"><span class="time"><?php echo $message->getPublicationDate()->format($dataTimeFormat); ?></span></span>
			</div>
			<div class="desc"><?php echo $message->getContent(); ?></div>
		</div>
	</li>
<?php } ?>
</ul>
<?php include('footer.php');