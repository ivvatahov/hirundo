<!-- <h1><?php echo $msg; ?></h1> -->
<h1>Welcome!<?php echo $username; ?></h1>
<table>
	<tr>
		<th>N</th>
		<th>Date Added</th>
		<th>Comments</th>
	</tr>
	<?php
		$i = 1;
		foreach ($submissions as $value) {
			echo "<tr>";
			echo "<td>" . $i . "</td>";
		 	echo "<td>" . $value->getDate()->format('Y/m/d H:i:s') . "</td>";
		 	echo "<td>" . $value->getComment() . "</td>";
		 	echo "</tr>";

		 	$i++;
		} 
	?>
</table>

<form action="<?php echo $fileUrl; ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="upload">
</form>

