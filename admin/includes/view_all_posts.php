 
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><?php
                    if (isset($_GET["post_id"])) {
                        $get_id = $_GET["post_id"] ;
                    $query = "DELETE FROM posts WHERE post_id='$get_id'" ;
                    mysqli_query($connection,$query)    ;     
                           }
                    
                    ?>
                                <?php
                                       $all_posts = mysqli_query($connection,'SELECT * FROM posts');
                    while ($row = mysqli_fetch_assoc($all_posts)) {
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_category_id = $row['post_category_id'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];
                        echo "<tr>";
                       echo "<td>{$post_id}</td>";
                       echo "<td>{$post_author}</td>";
                       echo "<td>{$post_title}</td>";
                       $all_categories = mysqli_query($connection,"SELECT * FROM categories WHERE cat_id='$post_category_id'");
                       while ($row = mysqli_fetch_assoc($all_categories)) {
                         $category_title = $row['cat_title'];                        

                       echo "<td>{$category_title}</td>";
                       } 
                          


                       echo "<td>{$post_status}</td>";
                       echo "<td><img width=60px src=../images/$post_image  ></td>";
                       echo "<td>{$post_tags}</td>";
                       echo "<td>{$post_comment_count}</td>";
                       echo "<td>{$post_date}</td>";
                       echo "<td><a href='posts.php?post_id={$post_id}' >Delete</a></td>";
                       echo "<td><a href='posts.php?source=edit_post&&post_id={$post_id}' >edit</a></td>";
                       echo "</tr>";
                   
                                }
                   

                    ?>
                    
                                    
                                   
                                </tr>
                            </tbody>
                        </table>
                    