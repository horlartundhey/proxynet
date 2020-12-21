<?php require('includes/config.php');
?>

<?php require('layouts/header2.php');?>


<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(img/news-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Posts For this Month</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>                        
                        <li class="active">Archive</li>
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

            //collect month and year data
            $month = $_GET['month'];
            $year = $_GET['year'];

            //set from and to dates
            $from = date('Y-m-01 00:00:00', strtotime("$year-$month"));
            $to = date('Y-m-31 23:59:59', strtotime("$year-$month"));


            $pages = new Paginator('4','p');

            $stmt = $db->prepare('SELECT postID FROM blog_posts_seo WHERE postDate >= :from AND postDate <= :to');
            $stmt->execute(array(
                ':from' => $from,
                ':to' => $to
            ));

            //pass number of records to
            $pages->set_total($stmt->rowCount());

            $stmt = $db->prepare('SELECT postID, postTitle, postSlug, postDesc, postDate, postImage FROM blog_posts_seo WHERE postDate >= :from AND postDate <= :to ORDER BY postID DESC '.$pages->get_limit());
            $stmt->execute(array(
                ':from' => $from,
                ':to' => $to
            ));
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