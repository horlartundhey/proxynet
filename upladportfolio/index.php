<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    type="text/javascript"></script>
<script type="text/javascript" src="jquery.form.min.js"></script>

</head>
<body>
    <h1>Upload Images for Portfolio</h1>
    <div class="form-container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
         Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>    
    </div>

    <?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" style="width:100px; height:100px;" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

</body>
</html>