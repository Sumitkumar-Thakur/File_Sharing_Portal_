<?php
include_once 'header.php'
?>
<?php
$cat = str_split($_GET['cat']);
$branch = array('', 'Civil', 'Electronics', 'Computer', 'Mechanical', 'Chemical', 'IT');
$sem = array('First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth');
$i = 1
?>

<!-- // files uploaded are displayed here!! -->
<div id="downloadSection">
	<center>
		<h1 class="heading"><?php echo $sem[(int)$cat[1] - 1]; ?> SEMESTER</h1>
		<!-----------------------------------Notes and References-------------------------------------->
		<table class="notes">
			<caption class="capnotes">NOTES AND FILES</caption>
			<tr>
				<th>Sr No.</th>
				<th>File Name</th>
				<th>Uploaded By</th>
				<th>Action</th>
				<th>Upload date</th>
			</tr>
			<?php
			include_once 'includes/dbh.inc.php';

			$query = "SELECT path, name, uploader_id, upload_date FROM files WHERE branch='$cat[0]' AND sem='$cat[1]' AND subject='$cat[2]'";
			$result = mysqli_query($connect, $query);
			while (list($path, $name, $uploader_id, $date) = mysqli_fetch_array($result)) {
				$query = "SELECT firstname, lastname FROM users WHERE user_id='$uploader_id'";
				$row = mysqli_query($connect, $query);
				while ($uploader = $row->fetch_assoc()) {
					$uploadedby =  $uploader['firstname'] . " " . $uploader['lastname'];
				}
			?>
				<!-- // Add styles afterwards -->
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $uploadedby ?></td>
					<td>
						<a href="download.php?path=<?php echo $path; ?>">click to download</a>
						<?php
						if (isset($_SESSION['u_id'])) {
						?>
							<a href="delete.php?path=<?php echo $path; ?>&cat=<?php echo $_GET['cat'] ?>">Click to Delete</a>
						<?php
						}
						?>
					</td>
					<td>
						<?php echo $date ?>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
		<br><br><br>
</div>
<?php include_once 'footer.php' ?>