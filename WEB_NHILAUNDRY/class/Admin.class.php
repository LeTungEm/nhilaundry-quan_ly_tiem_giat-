<?php 
    class Admin extends Db{
        
        public function isLogined(){
            if(getSession("adminEmail") != ''){
                return true;
            }
            return false;
        }
        
        public function checkLogin($email, $passW){
            return $this->select("select * from Admin where email = ? and passWord = ?", array($email, $passW));   
        }
        
        
    }
?>