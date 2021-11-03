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
         $imgur = new Imgur();
         echo $imgur->upload_image($_FILES["fileToUpload"]["tmp_name"]);
      }
   ?>
</body>
</html>