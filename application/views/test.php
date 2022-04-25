<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>test</title>
</head>
<body>
	<?php foreach ($artikel as $row ) {  ?>
		<?php  echo substr($row['content'], 0,200);	?>
		<a href="<?php echo base_url('home/read/'.$row['ID']."/".$this->seo_url->create_slug($row['title'])) ?>">Baca Selanjutnya</a>
		<?php } ?>
</body>
</html>