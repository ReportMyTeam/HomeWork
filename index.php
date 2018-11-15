<head>
</head>
<form action="index.php" method="get">
name: <input type="text" name="name">
<input type="submit">
</form>

<?php
		$filename = 'friends.txt';
	$file = fopen("$filename", "a");
	if(isset($_GET['name']))
	{
		$name = $_GET['name'];
		fwrite($file, "$name \n" );
		fclose($file);
		$file = fopen("friends.txt","r");
		
		while(!feof($file))	
			{
				?><li><?php echo fgets($file);?></li><?php
			}
			fclose($file);
	}
?>
	
	<?php
	if(isset($_POST['filter'])){
		$filter = $_POST['filter'];
		$file = fopen("friends.txt","r");

		while(!feof($file))	
		{
			$line = fgets($file);
			if(strstr($line,$filter))
			{
					?><li><?php echo $line; ?></li><?php
			}
		}
		fclose($file);	
		?> </ul> <?php
	}
	/*	else{
		if(isset($_GET['nameFilter'])){
					echo "hello world";
					echo $name;
					$nameFilter = $_GET['nameFilter'];
					echo $nameFilter;
					echo strstr($name,"tho");//after
		//echo strstr($name,$nameFilter,true);//before
		echo strstr($name,$nameFilter);//after
		}
	}*/
?>
</body>
<form action="index.php" method="post">
filter: <input type="text" name="filter">
<input type="submit">
</form>
