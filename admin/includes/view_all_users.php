 
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>first name </th>
                                    <th>last name</th>
                                    <th>username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    
                    if (isset($_GET["delete_user"])) {
                        $get_id = $_GET["delete_user"] ;
                    $query = "DELETE FROM users WHERE user_id='$get_id'" ;
                    mysqli_query($connection,$query) ;     
                           }
                    
                    ?>
                                                       <?php
                    if (isset($_GET["subscriber_role"])) {
                        $get_id = $_GET["subscriber_role"] ;
                    $query = "UPDATE users SET user_role='Subscriber' WHERE user_id='$get_id'" ;
                    mysqli_query($connection,$query)    ;     
                           }
                    
                    ?>
                                                       <?php
                    if (isset($_GET["admin_role"])) {
                        $get_id = $_GET["admin_role"] ;
                        $query = "UPDATE users SET user_role='Admin' WHERE user_id='$get_id'" ;
                        mysqli_query($connection,$query)    ;     
                           }
                    
                    ?>
                                <?php
                    $all_users = mysqli_query($connection,'SELECT * FROM users');
                    while ($row = mysqli_fetch_assoc($all_users)) {
                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_name = $row['user_name'];
                        $user_email = $row['user_email'];
                        $user_role = $row['user_role'];
                        echo "<tr>";
                       echo "<td>{$user_id}</td>";
                       echo "<td>{$user_firstname}</td>";
                       echo "<td>{$user_lastname}</td>";
                       echo "<td>{$user_name}</td>";
                       echo "<td>{$user_email}</td>"; 
                       echo "<td>{$user_role}</td>";
                       echo "<td><a href='users.php?admin_role={$user_id}' >is Admin</a></td>";
                       echo "<td><a href='users.php?subscriber_role={$user_id}' >is Subscriber</a></td>";
                       echo "<td><a href='users.php?source=edit_user&theId={$user_id}' >Edit</a></td>";
                       echo "<td><a href='users.php?delete_user={$user_id}' >Delete</a></td>";
                        echo "</tr>";
                   
                                }
                   

                    ?>
                    
                                    
                                   
                                </tr>
                            </tbody>
                        </table>
                    