 
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                    if (isset($_GET["delete_comment"])) {
                        $get_id = $_GET["delete_comment"] ;
                    $query = "DELETE FROM comments WHERE comment_id='$get_id'" ;
                    mysqli_query($connection,$query)    ;     
                           }
                    
                    ?>
                                                       <?php
                    if (isset($_GET["unapprove_comment"])) {
                        $get_id = $_GET["unapprove_comment"] ;
                    $query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id='$get_id'" ;
                    mysqli_query($connection,$query)    ;     
                           }
                    
                    ?>
                                                       <?php
                    if (isset($_GET["approve_comment"])) {
                        $get_id = $_GET["approve_comment"] ;
                        $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id='$get_id'" ;
                        mysqli_query($connection,$query)    ;     
                           }
                    
                    ?>
                                <?php
                    $all_comments = mysqli_query($connection,'SELECT * FROM comments');
                    while ($row = mysqli_fetch_assoc($all_comments)) {
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                        echo "<tr>";
                       echo "<td>{$comment_id}</td>";
                       echo "<td>{$comment_author}</td>";
                       echo "<td>{$comment_content}</td>";
                       echo "<td>{$comment_email}</td>";
                       echo "<td>{$comment_status}</td>";
                          $related_post = mysqli_query($connection,"SELECT * FROM posts WHERE post_id='$comment_post_id'");
                          while ($row = mysqli_fetch_assoc($related_post)) {
                                $post_title = $row['post_title'];       
                                $post_id = $row['post_id']  ;      
                           
                           echo "<td><a href='../post.php?post_id=$post_id'>$post_title</a> </td>";
                        } 
                          

                       echo "<td>{$comment_date}</td>";
                       echo "<td><a href='comments.php?approve_comment={$comment_id}' >Approve</a></td>";
                       echo "<td><a href='comments.php?unapprove_comment={$comment_id}' >Unapprove</a></td>";
                       echo "<td><a href='comments.php?delete_comment={$comment_id}' >Delete</a></td>";
                        echo "</tr>";
                   
                                }
                   

                    ?>
                    
                                    
                                   
                                </tr>
                            </tbody>
                        </table>
                    