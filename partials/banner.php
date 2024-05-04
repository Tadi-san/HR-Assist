<?php
require_once "classes/User.php";
$jobcat1 = new User;
$fetchs = $jobcat1->job_cat();


?>

<div class="row banner">
           <div class="col-12">
            <h1 class="text-light">Find your dream jobs on job solutions</h1>
           </div>
            <div class="col" id="formforsearch">
               <form action="process/processsearch.php" method="post">
                    <div class="row">
                        <div class="col " style="margin-left:10px;">
                            <select name="jobcat" id="jobcat" class="form-select">
                                <option  selected>Job Categories</option>
                                <?php
                                    foreach ($fetchs as $fetch) {
                                ?>
                                <option value="<?php echo $fetch['jobCat_id']?>"><?php echo $fetch['jobCat_name']?></option>
                                <?php
                                    }
                                ?>

                          
                            </select>
                        </div>
                        <div class="col">
                            <select name="jobind" id="jobind" class="form-select">
                                <option value="Main" selected>Job Industry</option>
                                <?php
                                    foreach ($fetchs as $fetch) {
                                ?>
                                <option value="<?php echo $fetch['jobCat_id']?>"><?php echo $fetch['jobCat_name']?></option>
                                <?php
                                    }
                                ?>
                         
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" name="jobname" id="jobname" class="form-control" placeholder="Job Name">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary " name="searchbtn" value="search" id="searchbtn1" style="background-color: aliceblue;color: blue;">Search</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>