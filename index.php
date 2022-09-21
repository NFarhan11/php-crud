<?php

    require "dbcon.php";
    session_start();

?>

<?php include "includes/header.php"?>

    <div class="container mt-4">
    <?php
        include "message.php";
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="student-create.php" class="btn btn-primary float-end">Create Student</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0) # There exists at least 1 record.
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $student["id"]; ?></td>
                                                <td><?php echo $student["name"]; ?></td>
                                                <td><?php echo $student["email"]; ?></td>
                                                <td><?php echo $student["phone"]; ?></td>
                                                <td><?php echo $student["course"]; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?php echo $student["id"];?>" class="btn btn-secondary">Info</a>
                                                    <a href="student-edit.php?id=<?php echo $student["id"];?>" class="btn btn-success">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?php echo $student["id"]; ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"?>
        