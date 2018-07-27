<?php
session_start();
include_once '/config/database.php';
include_once '/objects/admin.php';

$database = new Database();
$db = $database->getConnection();
$admin = new Admin($db);
$msg="";
 
try{

        $admin->username=$_SESSION["session_username"];
        $admin->password=$_POST["param_newpwd"];
        $session_pwd=$_SESSION["session_password"];
        $currentpwd=$_POST["param_current"];

        if($session_pwd==$currentpwd){

            if($admin->updatePassword()){
            $msg="Successfully changed";
             }
            else{
            $msg="Failed";
            }    
        }
        else{
            $msg="Enter Correct Password";
        }
        
    echo json_encode($msg);
                      
    }    

catch(Exception $ex){
    
    $msg=$ex.errorMessage();

    }
finally{
    
    //echo json_encode($msg);
    
    }
 
?>
