<?php
	$server_conn = mysql_connect('localhost', 'root', '');
	mysql_select_db('tutorial_shoriful', $server_conn); 
	
	if(isset($_POST['btn_save']))
	{
			$tmp_name = $_FILES["photo"]["tmp_name"];
			$photo = rand(1,1000).$_FILES["photo"]["name"];
			$folder_destination = 'photos/'.$photo;
			
			move_uploaded_file($tmp_name,$folder_destination);
			
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
			
			$insert = "INSERT INTO formation SET
				
				name = '$name',
				student_id = '$student_id',
				sex ='$sex',
				dob = '$dob',
				religion = '$religion',
				fathers_name = '$fathers_name',
				mothers_name = '$mothers_name',
				hobby = '$hobby',
				contact_no = '$contact_no',
				address = '$address',
				photo = '$folder_destination'
				
				";
			mysql_query($insert);	
				
				
				  
	}
	else if(isset($_POST['btn_remove']))
	{
			$path = 'photos/'.$_FILES["photo"]["name"];
			unlink($path);
	}
	
?>


<body>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="1">
    <tr>
      <td width="44%"><div align="right">Name</div></td>
      <td width="5%">:</td>
      <td width="51%"><label>
        <input type="text" name="name" value = "" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Student Id </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="ids[]" size="10" value="" />
		<input type="text" name="ids[]" size="10" value="" />
		<input type="text" name="ids[]" size="10" value="" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Sex</div></td>
      <td>:</td>
      <td><label>
        <input name="sex" type="radio" value="male" />
      male
      <input name="sex" type="radio" value="female" />
      female</label></td>
    </tr>
    <tr>
      <td><div align="right">DoB</div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="dob[]" size="8" value="" />
		y
		<input type="text" name="dob[]" size="4" value="" />
		m
		<input type="text" name="dob[]" size="4" value="" />
		d
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Religion</div></td>
      <td>:</td>
      <td><label>
        <select name="religion">
		<option> select religion</option>
		<option>islam</option>
		<option>christanity</option>
		<option>buddies</option>
		<option>hindusim</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Fathers Name </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="fathers_name" value="" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Mothers Name </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="mothers_name" value="" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Hobby</div></td>
      <td>:</td>
      <td><label>
        <input type="checkbox" name="hobby[]" value="cricket" />
      cricket
      <input type="checkbox" name="hobby[]" value="football"  />
      football
      <input type="checkbox" name="hobby[]" value="music"/>
      music</label></td>
    </tr>
    <tr>
      <td><div align="right">Contact No </div></td>
      <td>:</td>
      <td><label>
        <input type="text" name="contact_no" value="" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Address</div></td>
      <td>:</td>
      <td><label>
        <textarea name="address"> </textarea>
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Photo</div></td>
      <td>:</td>
      <td><label>
        <input type="file" name="photo" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="btn_save" value="save" />
        <input type="submit" name="btn_remove" value="remove" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>

