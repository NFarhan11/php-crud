<?php

session_start();
require 'dbcon.php';

if(isset($_POST["delete_student"]))
{
    $student_id = mysqli_real_escape_string($con, $_POST["delete_student"]);

    $query = "DELETE FROM students WHERE id='$student_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        # IF Success
        $_SESSION['message'] = "Student DELETED successfully.";
        header("Location: index.php"); 
        exit();
    }
    else
    {
        #IF Fail
        $_SESSION['message'] = "Student NOT DELETED.";
        header("Location: index.php"); 
        exit();
    }
}

if(isset($_POST['edit_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' 
    WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        # IF Success
        $_SESSION['message'] = "Student Info updated successfully.";
        header("Location: index.php"); 
        exit();
    }
    else
    {
        #IF Fail
        $_SESSION['message'] = "Student Info NOT Updated.";
        header("Location: index.php"); 
        exit();
    }
}

if(isset($_POST['submit_student']))
{
    #variables from $_POST of submit_student form
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students (name, email, phone, course) 
            VALUES ('$name', '$email', '$phone', '$course')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        # IF Success
        $_SESSION['message'] = "Student Info created successfully.";
        header("Location: student-create.php"); 
        exit();
    }
    else
    {
        #IF Fail
        $_SESSION['message'] = "Student Info NOT Created.";
        header("Location: student-create.php"); 
        exit();
    }
}

?>