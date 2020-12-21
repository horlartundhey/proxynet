<?php
//include config
require_once('../includes/config.php')
;
include 'header.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delcat'])){

    $stmt = $db->prepare('DELETE FROM blog_author WHERE autID = :autID') ;
    $stmt->execute(array(':autID' => $_GET['delcat']));

    header('Location: author.php?action=deleted');
    exit;
}

?>
<script language="JavaScript" type="text/javascript">
    function delcat(id, title)
    {
        if (confirm("Are you sure you want to delete '" + title + "'"))
        {
            window.location.href = 'author.php?delcat=' + id;
        }
    }
</script>
<?php
//show message from add / edit page
if(isset($_GET['action'])){
    echo '<h3>Author'.$_GET['action'].'.</h3>';
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
                        View Author
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <?php
                                    try {

                                    $stmt = $db->query('SELECT autID, autName, autSlug FROM blog_author ORDER BY autName DESC');
                                    while($row = $stmt->fetch()){
                                    ?>


                                    <td><?php echo $row['autID'];?></td>
                                    <td><?php echo $row['autName'];?></td>
                                    <td>
                                        <a class="btn-success btn" href="edit-author.php?id=<?php echo $row['autID'];?>">Edit</a> |
                                        <a class="btn btn-danger" href="javascript:delcat('<?php echo $row['autID'];?>','<?php echo $row['autSlug'];?>')">Delete</a>
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

                        <p><a class="btn-warning btn" href='add-author.php'>Add Author</a></p>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>

        </div>
    </div>
    <?php include 'footer.php';?>
