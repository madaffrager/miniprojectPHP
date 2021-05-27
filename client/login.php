<!DOCTYPE html>


<html>
<head>
<title>Client</title>
<meta charset="utf-8" />
<b>Login Client</b>

</head>
<body>
<form  action="../admin/controller.php"method="post" enctype="multipart/form-data">
<fieldset>
<legend><h3>Vos coordonnées</h3></legend>
<table>
<tr>
  
    <td>Login :</td>
	<td><input type="text" name="email"required ></td>
</tr>
<tr>
    <td>Password :</td>
	<td><input type="password" name="password"required ></td>
</tr>
<tr>
    

<td><input type="submit" name="loginclient" value="envoyer" /></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>