<?php
//include config
require_once('../includes/config.php');
include 'header.php';


//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){ 

	//if user id is 1 ignore
	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM blog_members WHERE memberID = :memberID') ;
		$stmt->execute(array(':memberID' => $_GET['deluser']));

		header('Location: users.php?action=deleted');
		exit;
	}
} 
?>
  <script language="JavaScript" type="text/javascript">
  function deluser(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'users.php?deluser=' + id;
	  }
  }
  </script>
    <div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            Tables Page
        </h1>

        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>        </ol>
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
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <?php
                                    try {

                                        $stmt = $db->query('SELECT memberID, username, email FROM blog_members ORDER BY username');
                                        while($row = $stmt->fetch()){

                                            echo '<tr>';
                                            echo '<td>'.$row['username'].'</td>';
                                            echo '<td>'.$row['email'].'</td>';
                                            ?>

                                            <td>
                                                <a class="btn btn-primary" href="edit-user.php?id=<?php echo $row['memberID'];?>">Edit</a>
                                                <?php if($row['memberID'] != 1){?>
                                                    | <a class="btn btn-danger" href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
                                                <?php } ?>
                                            </td>

                                            <?php
                                            echo '</tr>';

                                        }

                                    } catch(PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <p><a class="btn btn-success" href='add-user.php'>Add User</a></p>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>

        </div>
    </div>
<?php include 'footer.php';?>