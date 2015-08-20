<?
	$server_conn = mysql_connect('localhost', 'root', '');
	mysql_select_db('tutorial_shoriful', $server_conn); 
	$member_id = $_REQUEST['member_id'];
	if(isset($_POST['btn_save']))
	{
			
			
			$name = $_POST['name'];
			$student_id =implode('-', $_POST[ids]);
			$sex = $_POST['sex'];
			$dob = implode('-', $_POST[dob]);
			$religion = $_POST['religion'];
			$fathers_name = $_POST['fathers_name'];
			$mothers_name = $_POST['mothers_name'];
			$hobby = implode(',', $_POST['hobby']); 
			$contact_no = $_POST['contact_no'];
			$address = $_POST['address'];
			
			if( $_FILES["photo"]["tmp_name"]!='' )
			{
				$old_photo = $_POST['old_photo'];
				unlink($old_photo);
				
				$tmp_name = $_FILES["photo"]["tmp_name"];
				$photo = rand(1,1000). $_FILES["photo"]["name"];
				$new_photo ='photos/'.$photo;
			
				move_uploaded_file($tmp_name,$new_photo);
			}
			else
			{
				$new_photo = $_POST['old_photo'];
			}	
				
			$insert = "UPDATE formation SET
				
				name = '$name',
				student_id = '$student_id',
				sex ='$sex',
				dob = '$dob',
				religion = '$religion',
				fathers_name = '$fathers_name',
				mothers_name = '$mothers_name',
				hobby = '$hobby',
				contact_no = '$contact_no',
				photo = '$new_photo',
				address = '$address'
				
				";
			mysql_query($insert);	
				
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php include('header.php');

	$select ="SELECT*FROM formation WHERE member_id = $member_id";
	$array =mysql_query($select);
	$show =mysql_fetch_array($array);
	$student_ids =explode('-',$show['student_id']);
	$dobs =explode('-',$show['dob']);
	$hobbies =explode(',',$show['hobby']);
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="1">
    <tr>
      <td width="44%"><div align="right">Name</div></td>
      <td width="5%">:</td>
      <td width="51%"><label>
        <input type="text" name="name" value = "<?php echo $show['name'];?>" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Student Id </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="ids[]" size="10" value="<?php echo $student_ids[0];?>" />
		<input type="text" name="ids[]" size="10" value="<?php echo $student_ids[1];?>" />
		<input type="text" name="ids[]" size="10" value="<?php echo $student_ids[2];?>" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Sex</div></td>
      <td>:</td>
      <td><label>
        <input name="sex" type="radio" value="male"<?php if($show['sex']=='male'){echo 'checked';}?> />
      male
      <input name="sex" type="radio" value="female"<?php if($show['sex']=='female'){echo 'checked';}?> />
      female</label></td>
    </tr>
    <tr>
      <td><div align="right">DoB</div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="dob[]" size="8" value="<?php echo $dobs[0];?>" />
		y
		<input type="text" name="dob[]" size="4" value="<?php echo $dobs[1];?>" />
		m
		<input type="text" name="dob[]" size="4" value="<?php echo $dobs[2];?>" />
		d
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Religion</div></td>
      <td>:</td>
      <td><label>
        <select name="religion">
		<option> select religion</option>
		<option <?php if($show['religion']=='islam'){echo 'selected';}?>>islam</option>
		<option <?php if($show['religion']=='christanity'){echo 'selected';}?>>christanity</option>
		<option <?php if($show['religion']=='buddies'){echo 'selected';}?>>buddies</option>
		<option <?php if($show['religion']=='hindusim'){echo 'selected';}?>>hindusim</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Fathers Name </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="fathers_name" value="<?php echo $show['fathers_name'];?>" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Mothers Name </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="mothers_name" value="<?php echo $show['mothers_name'];?>" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Hobby</div></td>
      <td>:</td>
      <td><label>
        <input type="checkbox" name="hobby[]" value="cricket" <?php if( in_array('cricket', $hobbies)) {echo 'checked';} ?>  />
      cricket
      <input type="checkbox" name="hobby[]" value="football" <?php if(in_array('football', $hobbies)){echo 'checked';}?>  />
      football
      <input type="checkbox" name="hobby[]" value="music" <?php if(in_array('music', $hobbies)){echo 'checked';}?> />
      music</label></td>
    </tr>
    <tr>
      <td><div align="right">Contact No </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="contact_no" value="<?php echo $show['$contact_no'];?>" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Address</div></td>
      <td>:</td>
      <td><label>
        <textarea name="address"><?php echo $show['address'];?> </textarea>
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Photo</div></td>
      <td>:</td>
      <td><label><div align="left">
	  <?php
	
	  		$photo =is_file($show['photo'])?$show['photo']:'images/no_photo.jpg';
		?>
		<img src="<?php echo $photo;?>" width ="50" height="60"/>
		</div>	
        <input type="file" name="photo" />
		<input type="hidden" name="old_photo" value="<?php echo $show['photo'];?> " />
      </label></td>
    </tr> 
    <tr>
      <td><div align="right"></div></td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="btn_save" value="save" />
        
      </label></td>
    </tr>
  </table>
</form>	
