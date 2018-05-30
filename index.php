<?php  include('server.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$gender = $n['gender'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="/crud/java.js"></script>
</head>
<body>
    
    
    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Gender</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn" onclick="revealMessage2()" >Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
    
<p id="hiddenMessage2" style="display:none">Information has been deleted</p>
    
	<form method="post" action="server.php" >
	    <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Gender</label>
			<input type="text" name="gender" value="<?php echo $gender; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
            	<button class="btn" type="submit" name="update" onclick="revealMessage3()" style="background: #556B2F;" >update</button>
            <?php else: ?>
            	<button id='button1' class="btn" type="submit" name="save" onclick="revealMessage()" >Save</button>
            	
            <?php endif ?>
		</div>
	</form>
	<p id="hiddenMessage" style="display:none">Information has been entered</p>
	<p id="hiddenMessage3" style="display:none">Information has been updated</p>
</body>
	
    <center>
         <img src="https://wheattares.files.wordpress.com/2018/01/faces-of-gender.png?w=816" border="0px" 
               width="400px" height="200px" >
      </center>
</html>

