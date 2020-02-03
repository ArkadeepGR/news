<?php
	if(isset($_GET["topic"]))
	{	$topic=$_GET["topic"];
		$data=file_get_contents("https://gnews.io/api/v3/search?q=".$topic."&token=0765f4a45088e1ca5dc8f8c756366249");
		$dataArray=json_decode($data,true);
	
	}

?>

<html>
	<head>
		<style>
			.box{
				width:50%;
				border:1px solid black;
				padding:15px;
				margin:0px auto;
			}
		</style>
	</head>
	<body>
	<form method="GET">
		<input type="text" name="topic" placeholder="Enter topic">
		<input type="submit" value="Submit">
		</form>	
		<div class="box">
		<?php
			if(isset($_GET["topic"]))
			{
				for($i=0;$i<10;$i++)
				{
					$title=$dataArray['articles'][$i]['title'];
					$at=$dataArray['articles'][$i]['publishedAt'];
					$des=$dataArray['articles'][$i]['description'];
					$url=$dataArray['articles'][$i]['url'];
					$source=$dataArray['articles'][$i]['source']['name'];
					$sourceUrl=$dataArray['articles'][$i]['source']['url'];
					echo "<h1>$title</h1>";
					echo "<h5>$at</h5>";
					echo "<h4>$des<a href='$url'>Read more</a></h4>";
					echo "Source:<a href='$sourceUrl'>$source</a>";
				}
			}
		?>
		</div>
		</body>
	
</html>