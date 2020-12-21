<?php //include config
require_once('../includes/config.php');
include 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<?php

//if form has been submitted process it
if(isset($_POST['submit'])){

    //collect form data
    extract($_POST);

    //very basic validation
    if($autName ==''){
        $error[] = 'Please enter the Name.';
    }

    if(!isset($error)){

        try {

            $autSlug = slug($autName);

            //insert into database
            $stmt = $db->prepare('INSERT INTO blog_author (autName,autSlug) VALUES (:autName, :autSlug)') ;
            $stmt->execute(array(
                ':autName' => $autName,
                ':autSlug' => $autSlug
            ));

            //redirect to index page
            header('Location: author.php?action=added');
            exit;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    }

}

//check for any errors
if(isset($error)){
    foreach($error as $error){
        echo '<p class="error">'.$error.'</p>';
    }
}
?>
    <div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Add Category
        </h1>
    </div>
    <div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-action">
                </div>
                <div class="card-content">
                    <form class="col s12" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col 12">
                                <input type='text' class="validate"  name='autName' value='<?php if(isset($error)){ echo $_POST['autName'];}?>'></p>
                                <label for="autName">Please put in the name </label>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <p><input type='submit' name='submit' class="btn btn-danger " value='Submit'></p>
                    </div>
                </div>
                </form>

                <div class="clearBoth"></div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>