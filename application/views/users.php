<?php 
    include('header.php');
    include('menu.php');

    if (!empty($error_msg)) {
        echo $error_msg;
    }
?> 
<!-- The Timeline -->
<ul class="timeline">
<?php foreach ($users as $currentUser) { ?>
	<!-- Item 1 -->
	<li>
		<div class="direction-r">
			<div class="flag-wrapper">
				<span class="flag"><?php echo $currentUser->getUsername(); ?></span>
				<span class="time-wrapper"><span class="time"><?php echo $currentUser->getRegistrationDate()->format($dataTimeFormat); ?></span></span>
			</div>
			<!-- <div class="desc"><?php echo $currentUser->getUsername(); ?></div> -->
			
			<?php
				if($currentUser->getFollowers() != null && array_key_exists($username, $currentUser->getFollowers())) {
			?>
					<form action="<?php echo $unfollowUrl; ?>" method="post">
						<input type="hidden" value="<?php echo $currentUser->getUsername(); ?>" name="followed" />
					    <label>
					        <span>&nbsp;</span> 
					        <input type="submit" class="button" value="Unfollow" /> 
					    </label>    
					</form>						
			<?php
				} else {
			?>
					<form action="<?php echo $followUrl; ?>" method="post">
						<input type="hidden" value="<?php echo $currentUser->getUsername(); ?>" name="followed" />
					    <label>
					        <span>&nbsp;</span> 
					        <input type="submit" class="button" value="Follow" /> 
					    </label>    
					</form>
					<?php
				}
				?>
		</div>
	</li>
<?php } ?>
</ul>
<?php include('footer.php');