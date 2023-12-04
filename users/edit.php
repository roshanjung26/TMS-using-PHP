<?php require("../include/header.php"); ?>

<?php require("../include/navbar.php"); ?>

    <section>
        <div class="container py-5">
            <div class="form">
                <div class="card w-50 mx-auto p-5" >
                <div class="title d-flex justify-content-between ">
                        <h2>Add User</h2>
                        <p><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage users</a></p>
                        
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $id= $_GET['id'];

                            $select="SELECT *FROM users WHERE id=$id";
                            $select_result=mysqli_query($con, $select);
                            $data=mysqli_fetch_assoc($select_result);
                        }

                        if(isset($_POST['save'])){
                            $name= $_POST['name'];
                            $phone= $_POST['phone'];
                            $email= $_POST['email'];

                            if($name!="" && $phone!="" && $email!=""){
                                $update= "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id";
                                $result=mysqli_query($con, $update);

                                if($result){
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Data is updated successfully</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php 
                                 echo header("Refresh:1; url=index.php");
                                }
                                else{
                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Data is not updated successfully</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php 
                                 echo header("Refresh:1");
                                }
                            }
                            else{
                                echo header("Refresh:1");
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>All fields are required</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                            }
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="tel" name="phone" value="<?php echo $data['phone']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" name="save" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require("../include/footer.php"); ?>
