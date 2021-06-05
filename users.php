            <?php 

                include "inc/header.php";
                include "inc/menubar.php";

            ?>

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">All Users Information</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- main content -->

                <?php 

                $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

                // Manage all users
                if($do == 'Manage'){
                 ?>

                 <div class="row justify-content-center">
                     <div class="col-lg-12 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">All Category List</h3>
                            <ul class="mt-3">
                                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Thumbnail</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">DOB</th>
                                            <!-- <th class="border-top-0">Biodata</th>
                                            <th class="border-top-0">Education</th> -->
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $query = "SELECT * FROM users";
                                        $all_users = mysqli_query($db,$query);
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($all_users)) {
                                            $u_id        = $row['u_id'];
                                            $u_name      = $row['u_name'];
                                            $u_image     = $row['u_image'];
                                            $u_email     = $row['u_email'];
                                            $u_password  = $row['u_password'];
                                            $u_address   = $row['u_address'];
                                            $u_phone     = $row['u_phone'];
                                            $u_dob       = $row['u_dob'];
                                            $u_gender    = $row['u_gender'];
                                            $u_bio       = $row['u_bio'];
                                            $u_education = $row['u_education'];
                                            $u_role      = $row['u_role'];
                                            $u_status    = $row['u_status'];
                                            $count++;
                                            ?>

                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td>
                                                    <img src="image/users/<?php echo $u_image;?>" width="75">
                                                </td>
                                                <td><?php echo $u_name;?></td>
                                                <td><?php echo $u_gender;?></td>
                                                <td><?php echo $u_email?></td>
                                                <td><?php echo $u_address;?></td>
                                                <td><?php echo $u_phone;?></td>
                                                <td><?php echo $u_dob;?></td>
                                                <td>

                                                <?php

                                                if($u_role == 0){
                                                    echo "<span class='badge bg-success'>Subscriber</span>";
                                                }
                                                if($u_role == 1){
                                                    echo "<span class='badge bg-info'>Editor</span>";
                                                }
                                                if($u_role == 2){
                                                    echo "<span class='badge bg-danger'>Admin</span>";
                                                }

                                                ?>
                                                            
                                                </td>
                                                <td>

                                                <?php

                                                if($u_status == 0){
                                                    echo "<span class='badge bg-danger'>Inactive</span>";
                                                }
                                                if($u_status == 1){
                                                    echo "<span class='badge bg-success'>Active</span>";
                                                } 


                                                ?>
                                                    
                                                </td>
                                                <td>
                                                    <a href=""data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
                                                    <i class="fas fa-eye text-warning"></i>
                                                </a>
                                                    <a href=""data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="ms-3" data-bs-toggle="modal" data-bs-target="#delete<?php echo $u_id;?>">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </a>
                                                </a>
                                                </td>
                                                
                                            </tr>

                                            <div class="modal fade" id="delete<?php echo $u_id;?>" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content modal-filled bg-warning">
                                                    <div class="modal-body p-4">
                                                        <div class="text-center text-light">
                                                            <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                            <h2 class="mt-2">Are You Sure!</h2>
                                                            <a type="button" class="btn btn-light my-2"
                                                                data-bs-dismiss="modal">Cancel</a>
                                                            <a href="users.php?do=delete&delete_id=<?php echo $u_id;?>" type="button" class="btn btn-light my-2 bg-danger text-light">Confirm?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <?php

                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>

                 <?php
                }
                // Add new 
                if($do == 'add'){
                 ?>

                 <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Add New User</h3>
                            <ul class="mt-3">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                           <div class="mb-3">
                                                <label for="exampleInputName" class="form-label">User Name*</label>
                                                <input type="text" class="form-control" id="exampleInputName" aria-describedby="userName" name="user_name" required="required">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail" class="form-label">User Email*</label>
                                                <input type="email" class="form-control" id="exampleInputamail" aria-describedby="emailHelp" name="user_email" required="required">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword" class="form-label">Password*</label>
                                                <input type="Password" class="form-control" id="exampleInputPassword" name="user_password" required="required">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputAddress" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="exampleInputAddress" name="user_address">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPhone" class="form-label">Phone</label>
                                                <input type="number" class="form-control" id="exampleInputPhone" name="user_phone">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                                <div class="col-10">
                                                <input class="form-control" type="date" value="0000-00-00" id="example-date-input" name="user_dob">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleSelect1">Select Your Gender</label>
                                                    <select class="form-control" id="exampleSelect1" name="user_gender">
                                                    <option> Select Gender</option>
                                                    <option value= "Male">Male</option>
                                                    <option value= "Female">Female</option>
                                                    <option value= "Others">Others</option> 
                                                    </select>
                                                 </div>
                                                <div class="mb-3">
                                                     <label for="exampleInputBiodata" class="form-label">Biodata</label>
                                                     <textarea rows="5" class="form-control" id="exampleInputBiodata" name="user_biodata"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                     <label for="exampleInputEducation" class="form-label">Education</label>
                                                     <textarea rows="3" class="form-control" id="exampleInputEducation" name="user_education"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Profile Picture</label>
                                                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
                                                    <br>
                                                    <small id="fileHelp" class="form-text text-muted">Select Photo Only.Do not upload a photo more than 1mb filesize. Also try to upload jpg,png,jpeg format</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleSelect1">User Role</label>
                                                    <select class="form-control" id="exampleSelect1" name="user_role">
                                                    <option> Select Role</option>
                                                    <option value= "2">Admin</option>
                                                    <option value= "1">Editor</option>
                                                    <option value= "0">Subscriber</option> 
                                                    </select>
                                                 </div>
                                                 <div class="mb-3">
                                                    <label for="exampleSelect1">User Status</label>
                                                    <select class="form-control" id="exampleSelect1" name="user_status">
                                                    <option> Select Status</option>
                                                    <option value= "1">Active</option>
                                                    <option value= "0">Inactive</option>
                                                    </select>
                                                 </div>

                                                <button type="submit" class="btn btn-primary" name="user_submit">Add New User</button>   
                                        </div>
                                        
                                    </div>
                                </form>


                                <!-- add new user -->
                                <?php

                                if(isset($_POST['user_submit'])){
                                    $user_name          = $_POST['user_name'];
                                    $user_email         = $_POST['user_email'];
                                    $user_password      = $_POST['user_password'];
                                    $user_address       = $_POST['user_address'];
                                    $user_phone         = $_POST['user_phone'];
                                    $user_dob           = $_POST['user_dob'];
                                    $user_gender        = $_POST['user_gender'];
                                    $user_biodata       = $_POST['user_biodata'];
                                    $user_education     = $_POST['user_education'];
                                    $user_role          = $_POST['user_role'];
                                    $user_status        = $_POST['user_status'];
                                    $image_name         = $_FILES['image']['name'];
                                    $tmp_name         = $_FILES['image']['tmp_name'];
                                    //$image_size         = $_FILES['image']['size'];



                                    if(empty($user_name) || empty($user_email) || empty($user_password) || empty($image_name)){
                                        echo "<span class='alert bg-danger'>Please fill the all required options.</span>";
                                    }else{

                                        // split file
                                    $split = explode('.', $_FILES['image']['name']);
                                    // take the last part or extentions
                                    $extn = strtolower(end($split));
                                    //store some extention or compose
                                    $extentions = array('jpeg', 'jpg', 'png');
                                    //check the file type
                                    if(in_array($extn, $extentions) === true){

                                        $random = rand();
                                        $updated_name = $random.$image_name;

                                        move_uploaded_file($tmp_name, 'image/users/'.$updated_name);


                                    $encrypt_pass = sha1($user_password);

                                    $sql = "INSERT INTO users (u_name, u_image, u_email, u_password, u_address, u_phone, u_dob, u_gender, u_bio, u_education, u_role, u_status) VALUES ('$user_name', '$updated_name', '$user_email', '$user_password', '$user_address', '$user_phone', '$user_dob', '$user_gender', '$user_biodata', '$user_education', '$user_role', '$user_status')";
                                    $add_user = mysqli_query($db,$sql);

                                       
                                    if($add_user){
                                           header('Location: users.php');
                                    }else{
                                           echo "New User insert error!";
                                    }

   
                                    }else{
                                        echo "<span class='alert bg-danger'>File type is not an image.</span>";
                                    }

                                    }


                                }

                                ?>
                            </ul>
                        </div>
                    </div>
                     
                 </div>


                 <?php   
                }
                // Update user
                if($do == 'update'){
                    
                }
                // Delete user
                if($do == 'delete'){
                  if(isset($_GET['delete_id'])){
                    $d_id = $_GET['delete_id'];
                    

                    // find the file name
                    $image_name = "SELECT u_image from users WHERE u_id='$d_id'";
                    $result = mysqli_query($db,$image_name);

                    while($row = mysqli_fetch_assoc($result)){
                        $img_name = $row['u_image'];
                    }

                    // delete the file from project folder
                    unlink('image/users/'.$img_name);


                    // delete all
                    $sql3 = "DELETE FROM users WHERE u_id='$d_id'";
                    $delete_res = mysqli_query($db,$sql3);

                                            
                    if($delete_res){
                    header('Location: users.php');
                    }else{
                        die('Users Delete Error!'.error($db));
                }

                } 
                }

                ?>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <?php 

                include "inc/footer.php";

            ?>

 