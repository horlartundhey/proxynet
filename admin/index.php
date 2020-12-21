<?php
//include config
require_once('../includes/config.php');
 include 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM blog_posts_seo WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	//delete post categories. 
	$stmt = $db->prepare('DELETE FROM blog_post_cats WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            Tables Page
        </h1>

        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-action">
                        View Post
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>POST Title:</th>
                                    <th>Date</th>
<!--                                    <th>Article Image</th>-->
                                    <th>Delete Post</th>
<!--                                    <th>Read More</th>-->
                                    <th>Edit Post</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <?php
                                    try {

                                    $stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts_seo ORDER BY postID DESC');
                                    while($row = $stmt->fetch()){
                                    ?>

                                    <td><?php echo $row['postTitle'];?></td>
                                    <td><?php echo date('jS M Y', strtotime($row['postDate']));?></td>
<!--                                    <td><img src="../images/--><?php //echo $post_image; ?><!--" width="100" height="100"></td>-->
                                    <td><a class="btn btn-danger"href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a></td>
<!--                                    <td><a class="btn btn-warning" href="view_more.php?id=--><?php //echo  $row['post_id']; ?><!--">Read</a></td>-->
                                    <td><a class="btn-success btn" href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a></td>
                                </tr>

                                <?php
                                }

                                } catch(PDOException $e) {
                                    echo $e->getMessage();
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <p><a class="btn-success btn" href='add-post.php'>Add Post</a></p>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>

        </div>
    </div>
<?php include 'footer.php';?>