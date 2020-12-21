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
		if($catTitle ==''){
			$error[] = 'Please enter the Category.';
		}

		if(!isset($error)){

			try {

				$catSlug = slug($catTitle);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_cats (catTitle,catSlug) VALUES (:catTitle, :catSlug)') ;
				$stmt->execute(array(
					':catTitle' => $catTitle,
					':catSlug' => $catSlug
				));

				//redirect to index page
				header('Location: categories.php?action=added');
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
                                                            <input type='text' class="validate"  name='catTitle' value='<?php if(isset($error)){ echo $_POST['catTitle'];}?>'></p>
                                                            <label for="catTitle">Please put in the name </label>
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