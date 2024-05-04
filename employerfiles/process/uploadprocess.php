<?php
session_start();
    if($_POST['submit']){
        $userid = $_SESSION["useronline"];
        require_once "../../classes/Sanitizer.php";
        require_once "../../classes/Employer.php";
        $role = sanitizer($_POST["role"]);
        $qualification = sanitizer($_POST["qualification"]);
        $range = sanitizer($_POST["low"])."-".sanitizer($_POST['high']);
        $type = sanitizer($_POST['type']);
        $date = sanitizer($_POST['closingdate']);
        $description = sanitizer($_POST['desc']);
        $cat = $_POST['cat'];
        $employer1 = new Employer;
        $post = $employer1->post_job($role, $qualification, $userid, $date, $description, $range, $cat, $type);
        if($post){
            $_SESSION['feedback'] = "Job Posted Successfully";
            header("location:../employerdashboard.php");
        }else{
            $_SESSION["errormsg"] = "Unable to upload";
            header("location../uploadjob.php");
        }





    }else{



    }


























?>