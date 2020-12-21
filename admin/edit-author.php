<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Edit Category</title>
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

    <?php include('menu.php');?>
    <p><a href="author.php">Author Index</a></p>

    <h2>Edit Category</h2>


    <?php

    //if form has been submitted process it
    if(isset($_POST['submit'])){

        //collect form data
        extract($_POST);

        //very basic validation
        if($autID ==''){
            $error[] = 'This post is missing a valid id!.';
        }

        if($autName ==''){
            $error[] = 'Please enter the Name.';
        }

        if(!isset($error)){

            try {

                $autSlug = slug($autName);

                //insert into database
                $stmt = $db->prepare('UPDATE blog_author SET autName = :autName, autSlug = :autSlug WHERE autID = :autID') ;
                $stmt->execute(array(
                    ':autName' => $autName,
                    ':autSlug' => $autSlug,
                    ':autID' => $autID
                ));

                //redirect to index page
                header('Location: author.php?action=updated');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    ?>


    <?php
    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo $error.'<br />';
        }
    }

    try {

        $stmt = $db->prepare('SELECT autID, autName FROM blog_author WHERE autID = :autID') ;
        $stmt->execute(array(':autID' => $_GET['id']));
        $row = $stmt->fetch();

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    ?>

    <form action='' method='post'>
        <input type='hidden' name='autID' value='<?php echo $row['autID'];?>'>

        <p><label>Title</label><br />
            <input type='text' name='autName' value='<?php echo $row['autName'];?>'></p>

        <p><input type='submit' name='submit' value='Update'></p>

    </form>

</div>

</body>
</html>
