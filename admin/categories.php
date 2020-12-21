<?php
//include config
require_once('../includes/config.php')
;
include 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delcat'])){ 

	$stmt = $db->prepare('DELETE FROM blog_cats WHERE catID = :catID') ;
	$stmt->execute(array(':catID' => $_GET['delcat']));

	header('Location: categories.php?action=deleted');
	exit;
} 

?>
  <script language="JavaScript" type="text/javascript">
  function delcat(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'categories.php?delcat=' + id;
	  }
  }
  </script>
	<?php
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>Category '.$_GET['action'].'.</h3>'; 
	} 
	?>
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
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="odd gradeX">
                                        <?php
                                        try {

                                        $stmt = $db->query('SELECT catID, catTitle, catSlug FROM blog_cats ORDER BY catTitle DESC');
                                        while($row = $stmt->fetch()){
                                        ?>


                                        <td><?php echo $row['catID'];?></td>
                                        <td><?php echo $row['catTitle'];?></td>
                                        <td>
                                            <a class="btn-success btn" href="edit-category.php?id=<?php echo $row['catID'];?>">Edit</a> |
                                            <a class="btn btn-danger" href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')">Delete</a>
                                        </td>
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

                            <p><a class="btn-warning btn" href='add-category.php'>Add Category</a></p>


                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

            </div>
        </div>
        <?php include 'footer.php';?>
