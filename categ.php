<?php require('includes/config.php');

$stmt = $db->prepare('SELECT catID,catTitle FROM blog_cats WHERE catSlug = :catSlug');
$stmt->execute(array(':catSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['catID'] == ''){
    header('Location: ./');
    exit;
}
?>

<?php require('layouts/header2.php');?>


<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(img/news-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1><?php echo $row['catTitle'];?>.</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>                        
                        <li class="active"><?php echo $row['catTitle'];?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                    <?php
        try {
    $pages = new Paginator('2','p');

    $stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
    $stmt->execute(array(':catID' => $row['catID']));

    //pass number of records to
    $pages->set_total($stmt->rowCount());

    $stmt = $db->prepare('
					SELECT 
						blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc, blog_posts_seo.postDate,blog_posts_seo.postImage 
					FROM 
						blog_posts_seo,
						blog_post_cats
					WHERE
						 blog_posts_seo.postID = blog_post_cats.postID
						 AND blog_post_cats.catID = :catID
					ORDER BY 
						postID DESC
					'.$pages->get_limit());
    $stmt->execute(array(':catID' => $row['catID']));
while($row = $stmt->fetch()){
    $stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
    $stmt2->execute(array(':postID' => $row['postID']));

    $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $links = array();
    foreach ($catRow as $cat)
    {
        $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
    }

    ?>
                        <!-- Single Item -->

                        <div class="single-item">
                            <div class="thumb">
                                <a href="<?php echo $row['postSlug']?>">
                                    <img src="admin/<?php echo $row['postImage'] ;?>" alt="Thumb">
                                    <div class="post-type">
                                        <i class="ti-image"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="info">
                                <div class="meta tags">
                                    <ul>
                                        <li>
                                            <?php echo implode(" , " , $links);?>
                                        </li>
                                    </ul>
                                    <div class="date">
                                        <i class="ti-calendar"></i> <?php echo date('jS M Y',strtotime($row['postDate']));?>
                                    </div>
                                </div>
                                <h3>
                                    <a href="<?php echo $row['postSlug']?>"><?php echo $row['postTitle'];?></a>
                                </h3>
                                <p>
                                <?php echo $row['postDesc'];?>....
                                </p>
                                <a class="btn circle btn-theme border btn-sm" href="<?php echo $row['postSlug']?>">ReadMore <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <?php
                    }
                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                        
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                    <li><?php echo $pages->page_links();?></li>
                                    </ul>                                    
                                </nav>
                            </div>
                        </div>
                    </div>
                   <?php require('layouts/sidebar.php');?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <?php require('layouts/footer.php')?>