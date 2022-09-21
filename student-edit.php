<?php

session_start();
require "dbcon.php";

?>

<?php include "includes/header.php"?>

  
  <div class="container mt-5">

    <?php include('message.php'); ?>

  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Student
                    <a href="index.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>

            <div class="card-body">

            <?php 
            if(isset($_GET["id"]))
            {
                $student_id = mysqli_real_escape_string($con, $_GET["id"]);
                $query = "SELECT * FROM students WHERE id='$student_id'";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run) > 0)
                {
                    $student = mysqli_fetch_array($query_run);
                    ?>
                    <form action="code.php" method="post">
                        <input type="hidden" name="student_id" value="<?php echo $student["id"] ?>">

                        <div class="mb-3">
                            <label>Student Name</label>
                            <input type="text" name="name" value="<?php echo $student["name"] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Student Email</label>
                            <input type="email" name="email" value="<?php echo $student["email"] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Student Phone</label>
                            <input type="text" name="phone" value="<?php echo $student["phone"] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Student Course</label>
                            <input type="text" name="course" value="<?php echo $student["course"] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="edit_student" class="btn btn-primary">Edit Student</button>
                        </div>


                    </form>
                    <?php
                }
                else
                {
                    echo "No record found for the ID";
                }
            }
            ?>
                    
            </div>
        </div>
    
    </div>
    
  </div>
  </div>
    
  <?php include "includes/footer.php"?>
