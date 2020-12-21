<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Proxynet Communications</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../admin/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../admin/assets/js/Lightweight-Chart/cssCharts.css">

    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link rel="stylesheet" href="../css/theme.css">
    

    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand waves-effect waves-dark" href="index.php"><i class="small material-icons">insert_chart</i></a>

            <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>


    </nav>
    <!-- Dropdown Structure -->

    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li><a class="waves-effect waves-dark" href='index.php'><i class="fa fa-home"></i>Blog</a></li>
                <li><a class=" waves-effect waves-dark" href='../admin/categories.php'><i class="fa fa-table"></i>Categories</a></li>
                <li><a class=" waves-effect waves-dark" href='../admin/users.php'><i class="fa fa-edit"></i>Users</a></li>
                <li><a class=" waves-effect waves-dark" href='../admin/author.php'><i class="fa fa-edit"></i>Author</a></li>
                <li><a class=" waves-effect waves-dark" href="../" target="_blank"><i class="fa fa-pencil"></i>View Website</a></li>
                <li><a class="waves-effect waves-dark" href='logout.php'><i class="fa fa-power-off"></i>Logout</a></li>
                <li><a class=" waves-effect waves-dark" href='add-post.php'><i class="fa fa-book"></i>Add Post</a></li>

            </ul>
        </div>
        <?php
        //show message from add / edit page
        if(isset($_GET['action'])){
            echo '<h3>Post '.$_GET['action'].'.</h3>';
        }
        ?>
    </nav>
