<?php
	$server_conn = mysql_connect('localhost', 'root', '');
	mysql_select_db('tutorial_shoriful', $server_conn);

?>
<table width="100%" border="1">
	<tr>
		<td><div align="center"><a href="index.php">Home</a></div></td>
		<td><div align="center"><a href="registration.php">Registration</a></div></td>
   
   <!-- <td><div align="center"><a href="list.php">Student List</a> </div></td>
    	<td><div align="center"><a href="sign_up.php">Student Entry</a> </div></td>-->
  </tr>
</table>
