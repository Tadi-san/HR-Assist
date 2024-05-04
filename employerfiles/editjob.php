<?php
    session_start();
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $_SESSION['editid'] = $id;
    }

    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $cat1 = new Employer;
    $cats = $cat1->fetch_cat() ;
    $fetch = $cat1->selectVacancyById($id) ;
    //var_dump($fetch);
    require_once "partials/header.php";

?>
  
     
      <div class="row justify-content-center">
        <div class="col-8">
            <h3 class="text-info">
                Post a job
            </h3>
            <form action="process/editprocess.php" method="post" class="form-control">
                <div class="form-floating mb-3">
                    <input type="text" name="role" id="" class="form-control" value="<?php echo $fetch['jobVacancy_title']  ?>">
                    <label for="role">Change Role</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="qualification" id="" class="form-control" value="<?php echo $fetch['qualification']  ?>">
                    <label for="qualification">Change Qualification</label>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="low" id="low" class="form-control" placeholder="Minimum">-
                    <input type="number" name="high" id="high" class="form-control" placeholder="Maximum">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="type" id="" class="form-control" value="<?php echo $fetch['work_type']  ?>">
                    <label for="type">Change Work Type</label>
                </div>
                <div class="mb-3">
                    <input type="date" name="closingdate" id="date" class="form-control" value="<?php echo $fetch['dateClosed']  ?>">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Enter Job Description" value="<?php echo $fetch['vacancy_description']  ?>"><?php echo $fetch['vacancy_description']  ?></textarea>
                </div>
                <div class="mb-3">
                    <select name="cat" id="cat" class="form-select">
                        <option value="">Select Job Category</option>
                        <?php
                        foreach ($cats as $cat) {
                            if($cat['jobCat_id'] == $fetch['jobCat_id']){
                                ?>
                                 <option selected value="<?php echo $cat['jobCat_id'] ?>"><?php echo $cat['jobCat_name'] ?></option>
                                <?php
                            }
                        ?>
                        
                        <option value="<?php echo $cat['jobCat_id'] ?>"><?php echo $cat['jobCat_name'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="m-2">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
      </div>

    
<?php
    require_once "partials/footer.php";

?>









      