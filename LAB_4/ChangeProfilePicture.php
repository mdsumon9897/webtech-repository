<!DOCTYPE html>
<html>
<body style="width:800px;">
  <?php include('./header2.php');?>
  



    <?php include ('./account.php'); ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend><h2>PROFILE PICTURE</h2></legend>
    <img src="1.png" style="width:150px; height:150px;"><br>

    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <span class="underline">_________________________________</span><br>
    <input type="submit" value="Submit" name="submit">

    
  </fieldset>

</form>
<?php include ('./footer.php'); ?>   
</body>
</html>