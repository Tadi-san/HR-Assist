<?php
    session_start();
    
    require_once "userguard.php";
    require_once "../classes/Employer.php";
    $cat1 = new Employer;
    $cats = $cat1->fetch_cat() ;
    require_once "partials/header.php";

?>
  
     
      <div class="row justify-content-center">
        <div class="col-8">
            <h3 class="text-info">
                Post a job
            </h3>
            <form action="process/uploadprocess.php" method="post" class="form-control">
                <div class="form-floating mb-3">
                    <input type="text" name="role" id="" class="form-control">
                    <label for="role">Role</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="qualification" id="" class="form-control">
                    <label for="qualification">Qualification</label>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="low" id="low" class="form-control" placeholder="Minimum">-
                    <input type="number" name="high" id="high" class="form-control" placeholder="Maximum">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="type" id="" class="form-control">
                    <label for="type">Work Type</label>
                </div>
                <div class="mb-3">
                    <input type="date" name="closingdate" id="date" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Enter Job Description"></textarea>
                </div>
                <div class="mb-3">
                    <select name="cat" id="cat" class="form-select">
                        <option value="">Select Job Category</option>
                        <?php
                        foreach ($cats as $cat) {
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









      