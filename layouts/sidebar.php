 <!-- Start Sidebar -->
 <div class="sidebar col-md-4">
                        <aside>
                            <!-- <div class="sidebar-item search">
                                <div class="title">
                                    <h4>Search</h4>
                                </div>
                                <div class="sidebar-info">
                                    <form>
                                        <input type="text" class="form-control">
                                        <button type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div> -->
                            <div class="sidebar-item category">
                                <div class="title">
                                    <h4>category list</h4>
                                </div>
                                <div class="sidebar-info">
                                    
                                    <ul>
                                    <?php
                $stmt = $db->query('SELECT catTitle, catSlug FROM blog_cats ORDER BY catID DESC');
                while($row = $stmt->fetch()){
                    ?>
                                      <?php
                    echo '<li>
                                            <a href="c-'.$row['catSlug'].'">'.$row['catTitle'].'</a>
                                        </li>';
                                    }
                                    ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Recent Post</h4>
                                </div>
                                <ul>
                                <?php
                $stmt = $db->query('SELECT postTitle, postSlug, postDate, postImage FROM blog_posts_seo ORDER BY rand() asc  limit 5');
                while($row = $stmt->fetch()) {
                    echo '
                                    <li>
                                        <div class="info">
                                            <a href="'.$row['postSlug'].'">'. $row['postTitle'] .'</a>
                                            <div class="meta-title">
                                                <span class="post-date">'.date('M jS  Y ', strtotime($row['postDate'])).'</span>
                                            </a>
                                            </div>
                                        </div>
                                    </li>';

                                }
                                ?>
                                </ul>
                            </div>
                            <div class="sidebar-item archives">
                                <div class="title">
                                    <h4>Archives</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                    <?php
                $stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM blog_posts_seo GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
                while($row = $stmt->fetch()){
                    $monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
                    $slug = 'a-'.$row['Month'].'-'.$row['Year'];
                    echo "
                                        <li><a href='$slug'>$monthName</a></li>";   
                                    }
                                    ?>                                     
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="sidebar-item social-sidebar">
                                <div class="title">
                                    <h4>follow us</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>                                                                               
                                        <li class="linkedin">
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="sidebar-item tags">
                                <div class="title">
                                    <h4>tags</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li><a href="#">Fashion</a>
                                        </li>
                                        <li><a href="#">Education</a>
                                        </li>
                                        <li><a href="#">nation</a>
                                        </li>
                                        <li><a href="#">study</a>
                                        </li>
                                        <li><a href="#">health</a>
                                        </li>
                                        <li><a href="#">food</a>
                                        </li>
                                        <li><a href="#">travel</a>
                                        </li>
                                        <li><a href="#">science</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </aside>
                    </div>
                    <!-- End Start Sidebar -->