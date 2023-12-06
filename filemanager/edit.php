<?php require("../include/header.php"); ?>

<?php require("../include/navbar.php"); ?>

<section>
    <div class="container py-5">
        <div class="form">
            <div class="card w-50 mx-auto p-5">
                <div class="title d-flex justify-content-between ">
                    <h2>Add User</h2>
                    <p><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage files</a></p>

                </div>
                <div class="card-body">
                    <?php

                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $query = "SELECT * FROM filemanagers WHERE id=$id";
                        $result = mysqli_query($con, $query);
                        $data = $result->fetch_assoc();
                    }

                    ?>

                    <?php

                    if (isset($_POST['save'])) {
                        $title = $_POST['title'];
                        $file = $_FILES['dataFile']['name'];
                        $file_size = $_FILES['dataFile']['size'];

                        // submit previous file
                        if ($title != "" && $file == "") {
                            $querry = "UPDATE  filemanagers  SET  title='$title' WHERE id=' $id'";

                            $result = mysqli_query($con, $querry);
                            if ($result) {
                                echo "You didnot changed any thing ";
                            } else
                                echo "not 1st";
                        }

                        // submit new file & replace old file
                        if ($file != "" && $title != "") {

                            if ($file_size <= 200040) {
                                $explode = explode('.', $file); // explode cuts the name after the dot.
                                $flink = strtolower($explode[0]);
                                $extlink = strtolower($explode[1]);

                                $replace = str_replace(' ', '', $file); //to remove space
                                $finalname = $replace . time() . '.' . $extlink; //concating names with time

                                $targrt_file = '../uploads/' . $finalname;
                                if ($extlink == 'jpg' || $extlink == 'png' || $extlink == 'jpeg') {

                                    // replace old file
                                    $oldfilelink = $data['img_link']; //file link from database
                                    $finallink = '../uploads/' . $oldfilelink;
                                    unlink($finallink);

                                    // if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $targrt_file)) {

                                        $querry = "UPDATE  filemanagers  SET  title='$title', img_link='$finalname', type='$extlink' WHERE id='$id'";
                                        $result = mysqli_query($con, $querry);
                                        if ($result) {
                                            echo "File uploaded";
                                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
                                        } else {
                                            echo "File is not uploaded";
                                        }
                                    // } else {
                                    //     echo "fiels  upload failed";
                                    // }
                                } else {

                                    echo "extension doesno mattch";
                                }
                            } else {
                    ?>
                                <div class="alert alert-primary" role="alert">
                                    file size must be less than 2MB
                                </div>

                            <?php

                            }
                        } else {
                            ?>
                            <div class="alert alert-primary" role="alert">
                                Filed are required
                            </div>

                    <?php
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                        }
                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" value="<?php echo $data['title']; ?>" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <img src="<?php echo "../uploads/" . $data['filelink']; ?>" alt="" srcset="" width="150px" height="140px">
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