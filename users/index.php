<?php require("../include/header.php"); ?>

<?php require("../include/navbar.php"); ?>

    <section>
        <div class="container py-5">
            <div class="form">
                <div class="card  mx-auto p-5">
                    <div class="title d-flex justify-content-between ">
                        <h2>Manage Users</h2>
                        <p><a class="btn btn-primary btn-sm " href="create.php" role="button"> Add User</a></p>
                        
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = "SELECT *FROM users";
                                $result = mysqli_query($con, $select);
                                $i=1;
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++;?></th>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['phone']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit </a>
                                            <a class="btn btn-info btn-sm " href="view.php?id=<?php echo $data['id']; ?>" role="button">View </a>
                                            <a class="btn btn-danger btn-sm " onclick="return confirm('Do you want to delete this data???');" href="delete.php?id=<?php echo $data['id']; ?>" role="button">Delete </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require("../include/footer.php"); ?>
