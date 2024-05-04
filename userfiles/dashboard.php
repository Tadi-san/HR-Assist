<?php
    session_start();
    require_once "../classes/User.php";
    require_once "userguard.php";
     $user = new User;
     if(isset($_SESSION['user_id'])){
         $id = $_SESSION['user_id'];
         $user_id = $user->get_user_by_id($id);
         echo "<h2 style='color:blue'>Welcome ".$user_id['jobSeeker_firstName']."</h2>";
     }else{
         header("location:../login.php");
         
     }
     require_once "../classes/Employer.php";
     $employer = new Employer;
     $fetchs = $employer->fetch_vacancies_for_users();
     

     $num = 100;
     $numb = 0;
     if(!empty($user_id['jobSeeker_firstName'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_lastName'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_phone'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_email'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_gender'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_qualification'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_experience'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_CV'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     if(!empty($user_id['jobSeeker_Address'])){
        $num =$num-10 ;
        $numb = $numb + 10;
     }
     
     $num = $num/100;

     $calc = 472 * $num;
   
   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My job Solutions web is a website with the sole imterest of helping Nigerians get a job of their choice without the stress of going about with their CVs ">
    <meta name="keywords" content="jobs in lagos">
    <meta property="og:image" content="images/logo">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <style>
        .myoff ul li a{
            
            text-decoration: none;
            color: rgb(95, 89, 89);
            
            
        }
        .myoff ul li{
            list-style-type: none;
            

        }
        #borrow{
        height: 400px;
        width: 500px;
        display: flex;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
      }
     
      circle{
        fill: none;
        stroke: url(#GradientColor);
        stroke-width: 20px;
        stroke-dasharray: 472;
        stroke-dashoffset: 0;
        animation: anim 1s linear forwards;
      }
      @keyframes anim{
        100%{
          stroke-dashoffset: <?php echo $calc ?>;
        }
      }
        
    </style>
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container">
       
        
        <div class="row navigation">
            <div class="col col-md-1">
                <img src="../images/logo.png" alt="my logo" class="img-fluid">
            </div>
           
            <div class="col col-md-3 ff">
                
                <a id="linking1" href="#" class="">Job Seekers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="jobseekdropdown">
                    <a href="login.html" style="border-bottom: 1px solid black;">Create an account</a>
                    <a href="login.html" style="border-top: 1px solid black;border-bottom: 1px solid black">upload CV</a>
                    <a href="#jobcat" style="border-top: 1px solid black">Job Vacancies</a>
                </div>
            </div>
            <div class="col col-md-3 ff">
                <a id="linking2" href="#" class="" >Employers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="employer.html" style="border-bottom: 1px solid black;">Create an employer account</a>
                    <a href="#" style="border-top: 1px solid black;border-bottom: 1px solid black">Post Your Job Vacancies</a>
               </div>
            </div>
            <div class="col col-md-2 ff">
                <a id="linking2" href="#" class="" >Help<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="#" style="border-bottom: 1px solid black;">Faq </a>
                    <a href="#contact" style="border-top: 1px solid black;border-bottom: 1px solid black">Contact Us</a>
               </div>
            </div>
            
            <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
            <div class="col-1 offset-md-2 mt-2">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="fa-regular fa-user"></span>
                  </button>
                
            </div>
        </div>
        <?php
        if(isset($_SESSION['feedback'])){
            echo '<div class="alert alert-success">'.$_SESSION['feedback'].'</div>';
            unset($_SESSION['feedback']);
        }
        if(isset($_SESSION['errormsg'])){
            echo '<div class="alert alert-danger">'.$_SESSION['feedback'].'</div>';
            unset($_SESSION['errormsg']);
        }

        ?>

        <div class="row"></div>
        <div class="row">
            <div class="col-12 col-md-6 col-md-8">
                <h1 style="text-align: center;">Available jobs</h1>
                <?php
                    foreach($fetchs as $fetch){
                ?>
                <div class="col-12 m-2" style="border: 1px solid black;">
                    <form action="../process/processapply.php" method="post" enctype="multipart/form-data">
                    <h3 style="text-align: center;"><?php echo $fetch['employer_companyName'] ?></h3>
                    <input type="hidden" name="employerid" value="<?php echo $fetch['jobVacancy_employerId'] ?>">
                    <input type="hidden" name="jobSeekerid" value="<?php echo $id ?>">
                    <label for="">Role</label>
                    <input type="text" disabled class="form-control" value="<?php echo $fetch['jobVacancy_title'] ?>">
                    <label for="">Qualification</label>
                    <input type="text" disabled class="form-control" value=" <?php echo $fetch['qualification'] ?>">
                    <p>Salary Range= <?php echo $fetch['vacancy_salaryRange'] ?></p>
                    <p><?php echo $fetch['work_type'] ?></p>
                    <p class="card card-body">Job Description: <?php echo $fetch['vacancy_description'] ?></p>
                    <input type="hidden" name="jobVid" value="<?php echo $fetch['jobVacancy_id'] ?>">
                    <input type="hidden" name="jobSid" value="<?php echo $id ?>">
                    <div class="row">
                        <div class="col">
                            <input type="file" name="cv" id="cv" class="form-control my-3">
                            <span class="text-secondary">Choose A file for your CV which must not Be above 10mb. pdf only</span>
                        </div>
                       </div>
                    <button name="button" type="submit" value="btn" class="btn btn-primary mx-5">Apply</button>
                    </form>
                </div> 

                <?php
                    }
                ?>
               
              
            </div>
            <div class="col-12  col-md-4">
                <h1 style="text-align: center;">Status check</h1>
                <div id="borrow">
                 <svg width="160px" height="160px">
                     <defs>
                        <linearGradient id="GradientColor">
                    <stop offset="0%" stop-color="blue"/>
                 <stop offset="100%" stop-color="red"/>
                </linearGradient>
                </defs>
   
                <circle cx="80" cy="80" r="70" stroke-line-cap="round" />

  </svg>

    
 </div>
 <h1 class="text-info"><span id="numb"></span>% Completed</h1>
               <div>
                <p>
                <input <?php
                    echo !empty($user_id['jobSeeker_firstName']) ? "checked" : ""; 
                ?>
                
                type="checkbox" disabled name="firstname" id="first" value="firstname" class="form-check-input">Firstname</p>
                <p>
                <input 
                <?php
                    echo !empty($user_id['jobSeeker_lastName']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="lastname" id="last" value="lastname" class="form-check-input">Lastname</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_phone']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="phone" id="phone" value="phone" class="form-check-input">phone number</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_email']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="email" id="email" value="email" class="form-check-input">Email</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_gender']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="gender" id="gender" value="gender" class="form-check-input">gender</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_qualification']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="qualification" id="qualification" value="qualification" class="form-check-input">Qualification</p>
                <p>
                <input  <?php
                    echo !empty($user_id['jobSeeker_experience']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="exp" id="exp" value="exp" class="form-check-input">Experience</p>
                
                <input  <?php
                    echo !empty($user_id['jobSeeker_CV']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="cvcheck" id="cv" value="cv" class="form-check-input">CV</p>
                <p><input  <?php
                    echo !empty($user_id['jobSeeker_Address']) ? "checked" : ""; 
                ?>  disabled  type="checkbox" name="address" id="address" value="address" class="form-check-input">Address</p>
                

            </div>
            </div>

        </div>












        <div class="row" id="contact" >
            <h3>Other ways to contact us</h3>
            <div class="col-md-6"  style="display: inline;">
             <a href="#"><img src="../icons/facebook.png" alt="facebooklink" class="img-fluid" style="width: 30px;"></a>
             <a href="#"><img src="../icons/instagram.png" alt="instagram link" class="img-fluid"  style="width: 30px;"></a>
             <a href="#"><img src="../icons/whatsapp.png" alt="whatsapp link" class="img-fluid"  style="width: 30px;"></a>
            </div>
           
            <div class="col-12">
             <p class=""> &copy;copyright 2024.All rights Reserved</p>
            </div>
            
            </div>
    </div>






    <div class="offcanvas offcanvas-end myoff" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h3 style="text-align: center;">Account Information</h3>        
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <hr>
        
        <div class="image ml-5 container" style="width: 200px; height: 200px; border: 1px solid burlywood;">
            <img src="../images/profile.jpeg" alt="profile picture" class="container-fluid">

        </div>
        <ul>
            <li><a href="../employeepage.php">Home</a></li>
            <li><a href="usersettings.php">update information</a></li>
            <li><a href="usersettings.php">settings</a></li>
            <li><a href="">Help</a></li>
        </ul>
        <div class="col-6">
                <form action="../process/logout.php" method="post"><button class="btn btn-primary m-3">Log Out</button></form><p class="mx-3"><?php echo $user_id['jobSeeker_email']; ?></p>
            </div>
           
       
      </div>
   

    <script src="../jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ff").hover(function(){
                $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
            })
            var functions = ["Accounting, Auditing & Finance",
                                "Admin & Office",
                                "Creative & Design",
                                "Building & Architecture",
                                "Consulting & Strategy",
                                "Customer Service & Support",
                                "Engineering & Technology",
                                "Farming & Agriculture",
                                "Food Services & Catering",
                                "Hospitality & Leisure",
                                "Software & Data",
                                "Legal Services",
                                "Marketing & Communications",
                                "Medical & Pharmaceutical",
                                "Product & Project Management",
                                "Estate Agents & Property Management",
                                "Quality Control & Assurance",
                                "Human Resources",
                                "Management & Business Development",
                                "Community & Social Services",
                                "Sales",
                                "Supply Chain & Procurement",
                                "Research, Teaching & Training",
                                "Trades & Services",
                                "Driver & Transport Services",
                                "Health & Safety"]
            for (var f = 0;f<26;f++) {
                $("#jobcat").append("<option value='"+f+"'>"+functions[f]+"</option>")
                
            }
            for (var f = 0;f<26;f++) {
                $("#jobind").append("<option value='"+f+"'>"+functions[f]+"</option>")
                
            }
        })
    </script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script>
        // $(function(){
        //     var firstname = $('first').attr();
        //     if(firstname=="checked"){
        //         alert("hello World");
        //     }
        // })
        let numb = document.getElementById("numb");
        let count = 0;
        setInterval(()=>{
           if(count ==<?php echo $numb ?>){
            clearInterval();
           }else{
            count += 1;
            numb.innerHTML = count ;
           }
        }, 30)
    </script>
</body>
</html>   