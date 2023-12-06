<?php require("../include/header.php"); ?>

<?php require("../include/navbar.php"); ?>

<section>
    <div class="container py-5">
        <div class="form">
            <div class="card w-50 mx-auto p-5">
                <div class="title d-flex justify-content-between ">
                    <h2>Add User</h2>
                    <p><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage users</a></p>

                </div>
                <div class="card-body">
                    <?php
                    if (isset($_POST['save'])) {
                        $title = $_POST['title'];

                        $filename = $_FILES['dataFile']['name'];
                        $filesize = $_FILES['dataFile']['size'];

                        $explode = explode('.', $filename);
                        $firstname = strtolower($explode[0]);
                        $ext = strtolower($explode[1]);
                        $rep = str_replace(' ', '', $filename);

                        $finalfilename = $rep . time() . '.' . $ext;

                        if ($filesize <= 20000) {
                            if ($ext == "jpg" || $ext == "png") {
                                // if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalfilename)) {
                                    $query = "INSERT INTO filemanagers (title, img_link, type) 
          VALUES ('$title','$finalfilename', '$ext')"; // variable

                                    $result = mysqli_query($con, $query); // connect to database
                                    if ($result) {
                                        echo "file is submitted";
                                        echo header("location: index.php");
                                    } else {
                                        echo "file is not submitted ";
                                    } 
                                }
                            // } else {
                            //     echo "File extension is not match ";
                            // }
                        } else {
                            echo "file size must me less 2MB";
                        }


                        // validation to input field

                    }
                    ?>


                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" name="dataFile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="save" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require("../include/footer.php"); ?>