<?php

/**
 * Description of UserModel
 *
 * @author Oleksandr
 */
class UserModel {
    
    /**
     * 
     * @param type $log
     * @param type $pass
     * @return boolean
     */
    public static function getIdByLogin($log){
        $db = dbConection::get();
        $query = "SELECT `id` FROM `users`".
                " WHERE `login`=:log";
        $sth = $db->prepare($query);
        $sth->bindParam(':log', $log, PDO::PARAM_STR, 100);
        $sth->execute();
        if($row = $sth->fetch(PDO::FETCH_ASSOC)){
            return $row['id'];
        }
        return FALSE;
    }
    
    /**
     * 
     * @param type $log
     * @return boolean
     */
    public static function getPasswordByLogin($log){
        $db = dbConection::get();
        $query = "SELECT `password` FROM `users`".
                " WHERE `login`=:log";
        $sth = $db->prepare($query);
        $sth->bindParam(':log', $log, PDO::PARAM_STR, 100);
        $sth->execute();
        if($row = $sth->fetch(PDO::FETCH_ASSOC)){
            return $row['password'];
        }
        return FALSE;
    }
    
    
    /**
     * 
     * @param type $log
     * @param type $email
     * @param type $pass
     * @return type
     */
    public static function registration($log, $email, $pass){
        $db = dbConection::get();
        $query = "INSERT INTO `users`".
                " VALUES(null, :log, :email, :pass)";
        $sth = $db->prepare($query);
        $sth->bindParam(':log', $log, PDO::PARAM_STR, 100);
        $sth->bindParam(':email', $email, PDO::PARAM_STR, 255);
        $sth->bindParam(':pass', $pass, PDO::PARAM_STR, 100);
        return $sth->execute();
    }
    
    /**
     * 
     * @param type $log
     * @return boolean
     */
    public static function checkLogin($log){
        $db = dbConection::get();
        $query = "SELECT `id` FROM `users`".
                " WHERE `login`=:log";
        $sth = $db->prepare($query);
        $sth->bindParam(':log', $log, PDO::PARAM_STR, 100);
        $sth->execute();
        if($sth->fetch()){
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * 
     * @param type $email
     * @return boolean
     */
    public static function checkEmail($email){
        $db = dbConection::get();
        $query = "SELECT `id` FROM `users`".
                " WHERE `email`=:email";
        $sth = $db->prepare($query);
        $sth->bindParam(':email', $email, PDO::PARAM_STR, 255);
        $sth->execute();
        if($sth->fetch()){
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * 
     * @return boolean
     */
    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        return FALSE;
    }
    
    
}
