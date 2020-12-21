<?php include'includes/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php require('layouts/header2.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate, postImage  FROM blog_posts_seo WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
    header('Location: ./');
    exit;
}

?>

<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(img/news-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1><?php echo $row['postTitle']?></h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>                        
                        <li class="active"><?php echo $row['postTitle']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

   <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
            <?php
                $stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
                $stmt2->execute(array(':postID' => $row['postID']));

                $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $links = array();
                foreach ($catRow as $cat)
                {
                    $links[] = "<a class='event-target' href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
                }
                ?>
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                        <div class="single-item item">

                            <!-- Start Post Thumb -->
                            <div class="thumb">
                                <a href="<?php echo $row['postTitle']?>">
                                    <img src="admin/<?php echo $row['postImage'] ;?>" alt="Thumb">
                                    <div class="post-type">
                                        <i class="ti-image"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info">
                                <div class="meta tags">
                                    <ul>
                                        <li>
                                        <?php echo implode(", ", $links);?>
                                        </li>                                        
                                    </ul>
                                    <div class="date">
                                        <i class="ti-calendar"></i> <?php echo date('jS M Y',strtotime($row['postDate']));?>
                                    </div>
                                </div>
                                <h3>
                                <?php echo $row['postTitle'];?>
                                </h3>
                                <p>
                                <?php echo $row['postCont'];?> 
                                </p>
                                
                            </div>                            
                        </div>
                    </div>
                    <?php require('layouts/sidebar.php')?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <?php require('layouts/footer.php')?>