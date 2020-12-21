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
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}
		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}
		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
        // location where initial upload will be moved to

        $target ="images/" . $_FILES['postImage']['name'] ;

        // find thevtype of image
        switch ($_FILES["postImage"]["type"]) {
            case $_FILES["postImage"]["type"] == "image/gif":
                move_uploaded_file($_FILES["postImage"]["tmp_name"],$target);
                break;
            case $_FILES["postImage"]["type"] == "image/jpeg":
                move_uploaded_file($_FILES["postImage"]["tmp_name"],$target);
                break;
            case $_FILES["postImage"]["type"] == "image/pjpeg":
                move_uploaded_file($_FILES["postImage"]["tmp_name"],$target);
                break;
            case $_FILES["postImage"]["type"] == "image/png":
                move_uploaded_file($_FILES["postImage"]["tmp_name"],$target);
                break;
            case $_FILES["postImage"]["type"] == "image/x-png":
                move_uploaded_file($_FILES["postImage"]["tmp_name"],$target);
                break;
            default:
                $error[] = 'Wrong image type selected. Only JPG, PNG or GIF accepted!.';
        }

        if(!isset($error)){
			try {

                $postSlug = slug($postTitle);
				//insert into database
				$stmt = $db->prepare("INSERT INTO blog_posts_seo (postTitle,postSlug,postDesc,postCont,postDate,postImage) VALUES (:postTitle, :postSlug, :postDesc, :postCont, :postDate,'$target')") ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s')
				));
				$postID = $db->lastInsertId();
				//add categories

				if(is_array($catID)){
					foreach($_POST['catID'] as $catID){
						$stmt = $db->prepare('INSERT INTO blog_post_cats (postID,catID)VALUES(:postID,:catID)');
						$stmt->execute(array(
							':postID' => $postID,
							':catID' => $catID
						));
					}

                }

				//redirect to index page
				header('Location: index.php?action=added');
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
            Add Post
        </h1>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                    </div>
                    <div class="card-content">
                        <form action='' method='post' enctype="multipart/form-data">

                            <p><label>Title</label><br />
                                <input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

                            <p><label>Image Upload</label><br /><br/>
                                <input type='file' name='postImage' value='<?php if(isset($error)){ echo $_POST['postImage'];}?>'></p>
                            <br/>
                            <p><label>Description</label><br />
                                    <textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>
                            <br/>
                            <p class="tal"><label>Content</label><br />
                                <textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>
                            <br/>
                            <br/>
                            <fieldset>
                                <legend>Categories</legend>
                                <?php
                                $checked = null;
                                $stmt2 = $db->query('SELECT catID, catTitle FROM blog_cats ORDER BY catTitle');
                                while($row2 = $stmt2->fetch()){

                                    if(isset($_POST['catID'])){

                                        if(in_array($row2['catID'], $_POST['catID'])){
                                            $checked="checked='checked'";
                                        }else{
                                            $checked = null;
                                        }
                                    }
                                    echo "<input type='checkbox' name='catID[]' value='".$row2['catID']."' $checked> ".$row2['catTitle']."<br />";
                                }
                                ?>
                            </fieldset>
                            <br><br>
                            <fieldset>
                                <legend>Author</legend>
                                <?php
                                $checked = null;
                                $stmt2 = $db->query('SELECT autID, autName FROM blog_author ORDER BY autName');
                                while($row3 = $stmt2->fetch()){

                                    if(isset($_POST['autID'])){

                                        if(in_array($row3['autID'], $_POST['autID'])){
                                            $checked="checked='checked'";
                                        }else{
                                            $checked = null;
                                        }
                                    }
                                    echo "<input type='checkbox' name='autID[]' value='".$row3['autID']."' $checked> ".$row3['autName']."<br />";
                                }
                                ?>
                            </fieldset>
                            <div class="row">
                                <div class="input-field col s12">
                                    <p><input type='submit' name='submit' class="btn btn-danger " value='Submit'></p>
                                </div>
                            </div>
                        </form>


                    </div>
                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>

            <footer>

            </footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="../admin/assets/js/jquery-1.10.2.js"></script>

<!-- Bootstrap Js -->
<script src="../admin/assets/js/bootstrap.min.js"></script>

<script src="../admin/assets/materialize/js/materialize.min.js"></script>

<!-- Metis Menu Js -->
<script src="../admin/assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="../admin/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="../admin/assets/js/morris/morris.js"></script>


<script src="../admin/assets/js/easypiechart.js"></script>
<script src="../admin/assets/js/easypiechart-data.js"></script>

<script src="../admin/assets/js/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="../admin/assets/js/custom-scripts.js"></script>


</body>

</html>