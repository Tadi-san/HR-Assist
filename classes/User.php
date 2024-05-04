<?php

require_once "Db.php";


class User extends Db
{
    protected $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();

    }
    public function get_users(){
       
        try{ 
            $sql = "SELECT * FROM `job_seekers`";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resp;
        }catch(PDOException $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }catch(Exception $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }

    }
    public function get_user_by_id($id){
        try{
            $sql = "SELECT * FROM `job_seekers` WHERE jobSeeker_id = ?";
                    $stmt = $this->dbconn->prepare($sql);
                    $stmt->execute([$id]);
                    $resp = $stmt->fetch(PDO::FETCH_ASSOC);
                   return $resp;
        }catch(PDOException $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }catch(Exception $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }
    }
    public function get_user_id($email){
       try{
            $sql = "SELECT * FROM `job_seekers` WHERE jobSeeker_email = ?";
                    $stmt = $this->dbconn->prepare($sql);
                    $stmt->execute([$email]);
                    $resp = $stmt->fetch(PDO::FETCH_ASSOC);
                    switch($resp){
                        case $resp : 
                            return $resp['jobSeeker_id'];
                            break ;
                        default :
                            echo "No Value Found";
                            die();
                            break;
                    }
        }catch(PDOException $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }catch(Exception $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }

    }
    public function insert_user($jfname, $jlname, $email, $jpassword, $jDOB, $jphone, $jstate, $jgender){
       try{
        $sql = "INSERT INTO job_seekers(jobSeeker_firstName, jobSeeker_lastName, jobSeeker_email, jobSeeker_password, jobSeeker_DOB, jobSeeker_phone, jobSeeker_State_id, jobSeeker_gender) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$jfname, $jlname, $email, $jpassword, $jDOB, $jphone, $jstate, $jgender]);
        
        return $stmt;

       }catch(PDOException $e){
            echo "There is an error in your syntax: ".$e->getMessage();
       }
    }
    public function check_password($email, $jpassword){
        
        try{
            $sql = "SELECT * FROM `job_seekers` WHERE jobSeeker_email = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$email]);
            $resp = $stmt->fetch(PDO::FETCH_ASSOC);
            if($resp){
                $hashed_password = $resp['jobSeeker_password'];
                $check = password_verify($jpassword, $hashed_password);
            switch($check){
                case true:
                    return $resp['jobSeeker_id'];
                break;
                default:
                   $_SESSION['errormsg'] = "<div class='alert alert-danger'>invalid password</div>";
                   return false;
                break;
            }
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }catch(Exception $e){
            echo "There is an Error in Your Syntax: ".$e->getMessage();
        }

    }
    public function find_jobs(){

    }
    public function job_cat(){
        try{
            $sql = "SELECT * FROM `job_category`";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resp;
        }catch(PDOException $e){
            echo "There is an error in you syntax".$e->getMessage();
        }catch(Exception $e){
            echo "There is an error in you syntax".$e->getMessage();
        }
    }
    public function fetch_vacancies_for_users2($cat){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id WHERE jobCat_id = ? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$cat]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function update($phone, $email, $password, $qualification, $address, $cv, $id){
        try{
            $temp = $cv['tmp_name'];
            $original = $cv['name'];
            $r = explode(".", $original);
            $newname = time().rand().".".$r[1];
            move_uploaded_file($temp, "../uploads/$newname");


            $sql = "UPDATE `job_seekers` SET `jobSeeker_phone` = ?, jobSeeker_email = ?, jobSeeker_password = ?, jobSeeker_qualification = ?, jobSeeker_address = ?, jobSeeker_CV = ? WHERE `job_seekers`.`jobSeeker_id` = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$phone, $email, $password, $qualification, $address, $newname, $id]);
            return $resp;

        }catch(PDOException $e){
            echo "There is an error in your syntax".$e->getMessage();
        }catch(Exception $e){
            echo "Error in Your Syntax: ".$e->getMessage();
        }
    }
    public function apply($vacId, $seekerId, $cv){
        try{
            $temp = $cv['tmp_name'];
            $original = $cv['name'];
            $r = explode(".", $original);
            $newname = time().rand().".".$r[1];
            move_uploaded_file($temp, "../applicationfiles/$newname");


            $sql = "INSERT INTO jobseeker_application(application_jobVacancy_id, application_jobSeeker_id, application_CV) VALUES(?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$vacId, $seekerId, $newname]);
            return $resp;

        }catch(PDOException $e){
            echo "There is an error in your syntax".$e->getMessage();
        }catch(Exception $e){
            echo "Error in Your Syntax: ".$e->getMessage();
        }
    }














    public function logout(){
        session_unset();
        session_destroy();
       
    }
}


?>