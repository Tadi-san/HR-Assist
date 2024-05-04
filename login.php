<?php
    session_start();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My job Solutions web is a website with the sole imterest of helping Nigerians get a job of their choice without the stress of going about with their CVs ">
    <meta name="keywords" content="jobs in lagos">
    <meta property="og:image" content="images/logo">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <style>



    </style>
    
    <title>My Job Solutions</title>
   
</head>
<body>
    <div class="container">
        <div class="row navigation">
            <div class="col col-md-1">
                <img src="images/logo.png" alt="my logo" class="img-fluid"><span><h4>Job Solutions</h1></span>
            </div>
            <div class="col col-md-3 ff">
                
                <a id="linking1" href="#" class="">Job Seekers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="jobseekdropdown">                 <a href="#"border-bottom: 1px solid black">upload CV</a>
                    <a href="#" style="border-top: 1px solid black">Job Vacancies</a>
                </div>
            </div>
            <div class="col col-md-3 ff">
                <a id="linking2" href="#" class="" >Employers<span class='fa fa-chevron-down' style="margin-left: 5px;"></span></a>
                <div class="employerdropdown">
                    <a href="employer.php" style="border-bottom: 1px solid black;">Create an employer account</a>
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
            <div class="col col-md-3 lagin"><a href="index.php" style="color: rgb(32, 30, 30); text-decoration: none;">Home page</a></div>
            <div class="col-2 buttonspan"><button class="mt-2"><span class="fa fa-bars "></span></button></div>
        </div>
        <div style="border: 0.1px solid black; background-color: rgb(250, 251, 251); border-radius: 30px;">
        <?php if(isset($_SESSION['errormsg'])){
    echo '<div class="col-6 offset-3 alert alert-danger">'.$_SESSION['errormsg'].'</div>';
    unset($_SESSION['errormsg']);
} ?>
        <div class="col-12  login" >
            <div class="row">
                <div class="col-8 offset-2">
                   <span>New Member</span> <button id="btnnnn" class="btn btn-success" style="border: none; color: blue;background: transparent;">Sign Up</button>
                    <form action="process/login_process.php" method="post" >
                        <label for="username">Email</label>
                        <input type="email" name="email" id="username" class="form-control m-2" placeholder="Email" >
                        <p style="color: red;display: none;" id="para1" >Enter Email</p>

                        <div class="input-group mb-3">
                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter Your Password"  aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                            <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                          </div>
                          <p style="color: red;display: none;" id="paratwo" >Enter password</p>

                          <button name="login" value="login" type="button" class="btn btn-primary m-2" id="looginbtn">Login</button>
                    </form>
                </div>
            </div>
           </div>

           <div class="col-12  signup">
                <div class="row">
                    <div class="col-8 offset-2">
                       <span>Already Have An Account ?</span> <button id="btnnnn1"  class="" style="border: none; color: blue; background: transparent;">Login</button>
                        <form action="process/signup_process.php" method="post">
                           <div class="firstform">
                            <h2>Your Personal Information</h2>
                            <label for="fname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter Your FirstName" class="form-control m-2">
                            <p style="color: red;display: none;" id="paraone">please input your firstname</p>
                            <label for="lname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter Your LastName" class="form-control m-2">
                            <p style="color: red;display: none;" id="para2">please input your lastname</p>
                            <label for="number">Phone Number</label>
                            <input type="text" name="number" id="number" placeholder="Enter Your Phone Number" class="form-control m-2">
                            <p style="color: red;display: none;" id="para3">Enter a valid number</p>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="enter Your Email" class="form-control m-2" >
                            <p style="color: red;display: none;" id="para4">Enter Your Email</p>
                            <label for="pass1">Choose Password</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" id="pass1" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>
                              <p style="color: red;display: none;" id="para5" >Enter password</p>
                              <label for="pass2">Confirm Password</label>
                              <div class="input-group mb-3">
                                <input type="password" name="cpassword" class="form-control" id="pass2" placeholder="Enter Your Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary passbtn" type="button" id="button-addon2"><span class="fa-regular fa-eye"></span></button>
                                <button class="btn btn-outline-secondary passbtn2" type="button" id="button-addon2" style="display: none;"><span class="fa-regular fa-eye-slash"></span></button>

                              </div>      
                              <p style="color: red;display: none;" id="para6">password should be the same with confirm password</p>                     
                              <label for="date of birth">Date Of Birth</label>
                            <div class="row">
                                <div class="col-4 mb-2">
                                    <select name="year" id="select" class="form-select firsts">
                                        <option selected value="">choose year</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para7">select an option</p>
                                
                                    
                                </div>
                                <div class="col-4 mb-2">
                                    <select name="month" id="month" class="form-select firsts1">
                                        <option selected value=""> choose Month</option>
                                        <option value="01">January</option>
                                        <option value="02">february</option>
                                        <option value="03">march</option>
                                        <option value="04">april</option>
                                        <option value="05">may</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                
                                    </select>
                                    <p style="color: red;display: none;" id="para8">select an option</p>
                                
                                </div>
                                <div class="col-4 mb-2">
                                    <select name="day" id="select2" class="form-select firsts2">
                                        <option selected value="">choose day</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para9">select an option</p>
                                
                                    
                                </div>
                                 <div class="col-4">
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="">-Select Gender-</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para11">select an option</p>
                                 </div>
                                <div class="col-4">
                                    <select name="states" id="state" class="form-select firsts3 mb-3" aria-label="Large select example">
                                        <option value="" >Choose your State</option>
                                        <option value="1">Abia</option>
                                        <option value="2">Adamawa</option>
                                        <option value="3">Akwa-Ibom</option>
                                        <option value="4">Anambra</option>
                                        <option value="5">Bauchi</option>
                                        <option value="6">Bayelsa</option>
                                        <option value="7">Benue</option>
                                        <option value="8">Borno</option>
                                        <option value="9">Cross-River</option>
                                        <option value="10">Delta</option>
                                        <option value="11">Ebonyi</option>
                                        <option value="12">Edo</option>
                                        <option value="13">Ekiti</option>
                                        <option value="14">Enugu</option>
                                        <option value="15">Gombe</option>
                                        <option value="16">Imo</option>
                                        <option value="17">Jigawa</option>
                                        <option value="18">Kaduna</option>
                                        <option value="19">Kano</option>
                                        <option value="20">Katsina</option>
                                        <option value="21">Kebbi</option>
                                        <option value="22">Kogi</option>
                                        <option value="23">Kwara</option>
                                        <option value="24">Lagos</option>
                                        <option value="25">Nasarawa</option>
                                        <option value="26">Niger</option>
                                        <option value="27">Ogun</option>
                                        <option value="28">Ondo</option>
                                        <option value="29">Osun</option>
                                        <option value="30">Oyo</option>
                                        <option value="31">Plateau</option>
                                        <option value="32">Rivers</option>
                                        <option value="33">Sokoto</option>
                                        <option value="34">Taraba</option>
                                        <option value="35">Yobe</option>
                                        <option value="36a">Zamfara</option>
                                        <option value="37">Fedral-Capital-territory</option>
                                        <option value="38">Foreign</option>
                                    </select>
                                    <p style="color: red;display: none;" id="para10">select an option</p>
                                
                                </div>
                                 </div>
                            <button type="button"  class="btn btn-danger m-2" id="nextbtn">Next</button>
                            
                           </div>
                           <div class="secondform">
                            <button type="button" id="prevbtn" class="btn btn-outline-danger">Back</button>
                            <h1>Work Information</h1>
                               <div class="row">
                                <div class="col">
                                    <label for="qualification">Qualification</label>
                                    <select name="qualification" id="qualification" class="form-select">
                                        <option selected value="">Select Qualification</option>
                                        <option value="olevel">O-Level / SSCE</option>
                                        <option value="nce">NCE</option>
                                        <option value="nd">National Diploma</option>
                                        <option value="bsc">BSC(Bachelor In Science)</option>
                                        <option value="msc">MSC(Master In Science)</option>
                                        <option value="phd">PHD(Doctor In Philosophy)</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="yearsofexperience">Years Of Experience</label>
                                    <select name="yearsofexperience" id="yox" class="form-select">
                                        <option selected>Select Years Of Experience</option>
                                        <option value="below">Below one Year</option>
                                        <option value="1">A Year</option>
                                        
                                    </select>
                                </div>
                               </div>
                               <div class="row">
                                <div class="col-md-6">
                                    <label for="function1">Select Current Job Function</label>
                                    <select name="function1" id="functionss" class="form-select">
                                        <option value="" selected>Select Current</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="function2">Select Desired Job Function</label>
                                    <select name="function2" id="functionsss" class="form-select">
                                        <option value="" selected>Select Desired</option>
                                    </select>
                                </div>
                               </div>
                               <div class="row">
                               
                               </div>
                               <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="agree" id="agree">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                     I agree with the terms and condition
                                    </label>
                                    <button type="submit" class="btn btn-outline-primary" value="register" name="register" id="submiting" disabled>Register</button>
                                  </div>
                               </div>
                           </div>
                        </form>
                    </div>
                </div>
           </div>
           </div>












        <div class="row" >
            <h1>Other ways to contact us</h1>
            <div class="col-md-6"  style="display: inline;">
             <a href="#"><img src="icons/facebook.png" alt="facebooklink" class="img-fluid" style="width: 30px;"></a>
             <a href="#"><img src="icons/instagram.png" alt="instagram link" class="img-fluid"  style="width: 30px;"></a>
             <a href="#"><img src="icons/whatsapp.png" alt="whatsapp link" class="img-fluid"  style="width: 30px;"></a>
            </div>
           
            <div class="col-12">
             <p class=""> &copy;copyright 2024.All rights Reserved</p>
            </div>
            
            </div>
         </div>
        </div>

    


        <script src="jquery-3.7.1.min.js"></script>
    <script src="login.js"></script>  
    </body>
</html>