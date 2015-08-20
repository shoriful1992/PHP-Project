<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php include('header.php');?>
<table width="100%" border="1">;
	<tr>
		<td width="6%"><div align="center">ser</div></td>
		<td width = "6%"><div align="center">Photo</div></td>
		<td width = "6%"><div align="center">Name</div></td>
		<td width = "6%"><div align="center">Fathers Name</div></td>
		<td width = "6%"><div align="center">Student Id</div></td>
		<td width = "6%"><div align="center">Mothers Name</div></td>
		<td width = "6%"><div align="center">Contact No</div></td>
		<td width = "6%"><div align="center">Address</div></td>
		<td width = "6%"><div align="center">Action</div></td>
	</tr>
<?php
	$delete_member_id = $_REQUEST['delete_member_id'];
	$photo = $_REQUEST['photo'];
	if( !empty($delete_member_id) )
	{
		$select = "DELETE FROM formation WHERE member_id=$delete_member_id ";
		mysql_query($select);
		
	}
	$select = "SELECT *FROM formation ";
	$array = mysql_query($select);
	$ser = 1;
	while($show=mysql_fetch_array($array))
	{
?>
	<tr>
		<td><div align="center"> <?php echo $ser++;?></div></td>	  		
		<td><div align="center">
		<?php
			$photo = is_file($show['photo'])?$show['photo']:'photo/no_photo.jpg';
		?>
		<img src="<?php echo $photo;?>" width ="50" height="60"/>
		</div></td>
		<td><div align="center"><?php echo $show['name'];?></div></td>
		<td> <div align="center"><?php echo $show['fathers_name']; ?> </div></td>
		<td> <div align="center"><?php echo $show['student_id']; ?> </div></td>
		<td> <div align="center"><?php echo $show['mothers_name']; ?> </div></td>
		<td> <div align="center"><?php echo $show['contact_no']; ?> </div></td>
		<td><div align="center"><?php echo $show['address']; ?></div></td>
		<td> <div align="center"><a href="edit1.php?member_id=<?php echo $show['member_id'];?>">Edit</a> | 
		<a href="index.php?delete_member_id=<?php echo $show['member_id']; ?>&photo=<?php echo $show['photo']; ?>">Delete</a></div>
		
		</td>
	</tr>
<?php } ?>
</table>
<p> &nbsp;</p>		   
		 


