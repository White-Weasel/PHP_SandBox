<?php 
   include "imgurAPI.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
   <form method="POST" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input name="submited" type="submit" value="upload">
   </form>
   <?php
      if (isset($_POST['submited']) && isset($_FILES))
      {
         $target_dir = $_SERVER['DOCUMENT_ROOT']."/src/img/";
         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
         move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
         echo $imgur->upload_image($file);
      }
   ?>
</body>
</html>