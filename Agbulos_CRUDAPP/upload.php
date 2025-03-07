<html>
<head>
<title>PHP File type check example</title>
</head>
<body>

<form action="fileupload.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submit1">

</form>

<?php

if(isset($_POST['Submit1']))
{ 

$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif')
{
echo "File is image <br/>";
echo "File type = " . $extension;

}
else
{
echo "File is not image";
}
}


?>
</body>
</html>