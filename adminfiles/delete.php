<?php
session_start();
require_once "classes/Admin.php";
$admin = new Admin;
if($_POST['delete']){
$id = $_POST['id'];
$result = $admin->delete_jobseekers($id);
if($result){
    $_SESSION['feedback'] = 'Job Seeker Deleted Successfully';
    header('location:dashboard.php');
}else{
    $_SESSION['errormsg'] = 'Unable to delete';
    header('location:dashboard.php');
}

}elseif($_POST['deleteemp']){
    $id = $_POST['id'];
$result = $admin->delete_employer($id);
if($result){
    $_SESSION['feedback'] = 'Employer Deleted Successfully';
    header('location:dashboard.php');
}else{
    $_SESSION['errormsg'] = 'Unable to delete';
    header('location:dashboard.php');
}
    
}elseif($_POST['deleteadmin']){
    
    $id = $_POST['id'];
$result = $admin->delete_admin($id);
if($result){
    $_SESSION['feedback'] = 'Admin Deleted Successfully';
    header('location:dashboard.php');
}else{
    $_SESSION['errormsg'] = 'Unable to delete';
    header('location:dashboard.php');
}
}else{
    header('location:dashboard.php');

}
