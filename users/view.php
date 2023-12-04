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

                      
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" readonly name="name" value="<?php echo $data['name']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="tel" name="phone" readonly value="<?php echo $data['phone']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" readonly value="<?php echo $data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require("../include/footer.php"); ?>
