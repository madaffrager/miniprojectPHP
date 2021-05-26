

<!DOCTYPE html>


<html>
<head>
<title>Admin</title>
<meta charset="utf-8" />
<b>Login Admin</b>

</head>
<body>
<form  action="controller.php"method="post" enctype="multipart/form-data">
<fieldset>
<legend><h3>Vos coordonnées</h3></legend>
<table>
<tr>
  
    <td>Id Admin :</td>
	<td><input type="text" name="username"required ></td>
</tr>
<tr>
    <td>Password :</td>
	<td><input type="password" name="password"required ></td>
</tr>
<tr>
    
<td><input type="reset" name="effacer" value="effacer" /></td>
<td><input type="submit" name="envoyer" value="envoyer" /></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>