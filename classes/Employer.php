<?php
error_reporting(E_ALL);

require_once("User.php");

class Employer extends User
{
    public function signup($fname, $email, $password, $compname, $state){
       try{
        $sql = "INSERT INTO employers(employer_fullName, employer_email, employer_password, employer_companyName, employer_stateId) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute(array($fname, $email, $password, $compname, $state));
        $result = $this->dbconn->lastInsertId();
        return $result;
       }catch(PDOException $e){
        echo "There is an error in your syntax". $e->getMessage();
       }catch(Exception $e){
        echo "There is an error in your syntax". $e->getMessage();
       }
    }
    public function login($email, $password){
        try{
            $sql = "SELECT * FROM employers WHERE employer_email = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($email));
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            if($record){
                $hashed = $record['employer_password'];
                $check = password_verify($password, $hashed);
                if($check == true){
                    return $record['employer_id'];
                }else{
                    $_SESSION['invalid Credentials'];
                    return false;
                }
            }else{
                $_SESSION['invalid Credentials'];
                return false;
            }

        }
        catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function get_user_by_id($id){
        try{
            $sql = "SELECT * FROM employers WHERE employer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            return $record;
        }catch(PDOException $e){
            echo "There is an error in Your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function post_job($title, $qualification, $employer_id, $dateclosed, $description, $salary, $jobcatid, $type){
        try{
            $sql = "INSERT INTO job_vacancy(jobVacancy_title, qualification, jobVacancy_employerId, dateClosed, vacancy_description, vacancy_salaryRange, jobCat_id, work_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
           $result =  $stmt->execute(array($title, $qualification, $employer_id, $dateclosed, $description, $salary, $jobcatid, $type));
           return $result;

        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_cat(){
        try{
           $sql = "SELECT * FROM `job_category`";
           $stmt = $this->dbconn->prepare($sql);
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result;
        }catch(PDOException $e){
            echo "There is an error in Your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_vacancy($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id WHERE jobVacancy_employerId = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }

    }
    public function fetch_vacancies($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` WHERE jobVacancy_employerId = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_vacancies_for_users(){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function updatejob($title, $qualification, $date, $desc, $range, $type,$id){
        try{
          $sql = "UPDATE `job_vacancy` SET jobVacancy_title = ?, qualification = ?, dateClosed = ?, vacancy_description = ?, vacancy_salaryRange = ?, work_type = ? WHERE `job_vacancy`.`jobVacancy_id` = ?";
          $stmt = $this->dbconn->prepare($sql);
          $result = $stmt->execute(array($title, $qualification, $date, $desc, $range, $type, $id));
          return $result;


        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }

    }
    public function selectVacancyById($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id  WHERE jobVacancy_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_applications($id, $vacId){
        try{
            $sql = "SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN job_seekers ON application_jobSeeker_id = job_seekers.jobSeeker_id WHERE jobVacancy_employerId = ? AND jobVacancy_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id, $vacId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_applications_by_userid($id){
        try{
            $sql = "SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN job_seekers ON application_jobSeeker_id = job_seekers.jobSeeker_id WHERE jobSeeker_id = ? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
}