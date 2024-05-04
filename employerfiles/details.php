
<?php
    session_start();
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    require_once "../classes/User.php";
    $employer = new Employer;
    $user3 = new User;
    $user = $employer->get_user_by_id($_SESSION['useronline']);  
    if($_POST['details']){
        $id = $_POST['id'];
    }
    $cv = $employer->fetch_applications_by_userid($id);
  
    $fetch = $user3->get_user_by_id($id);
 
   // $fetchapplications = $employer->fetch_applications($_SESSION['useronline']);
    
    require_once "partials/header.php";


?>

        <div class="row"> 
            <div class="col mt-5 card">
                <div class="card-header">
                    <i class="fa fa-user"></i>
                    <h3 class="text-primary">
                         Details
                    </h3>
                </div>
                <div class="card-body">
                    <h3 class="text-success">
                        Full Name: <?php echo $fetch['jobSeeker_firstName']." ". $fetch['jobSeeker_lastName'] ?>
                    </h3>
                    <h3 class="text-success">
                        Email: <?php echo $fetch['jobSeeker_email'] ?>
                    </h3>
                    <h3 class="text-success">
                        Phone Number:  <?php echo $fetch['jobSeeker_phone'] ?>
                    </h3>
                    <h3 class="text-success">
                        Address:  <?php echo $fetch['jobSeeker_Address'] ?>
                    </h3>
                    <h3 class="text-success">
                        Qualification: <?php echo $fetch['jobSeeker_qualification'] ?>
                    </h3>
                    <h3 class="text-success">
                        Experience: <?php echo $fetch['jobSeeker_experience'] ?>
                    </h3>
                    
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" name="application" value="application" class="btn btn-warning noround">View CV</button>
                      
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src='../applicationfiles/<?php echo $cv['application_CV'] ?>' alt="">
      </div>
      
      <div class="modal-footer">
      <button type="button" class="btn btn-warning"><span class="fa fa-arrow-down"></span>Download</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

    


<?php
    require_once "partials/footer.php";

?>





