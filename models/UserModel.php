<?php

/**
 * UserModel
 *
 * @author Oleksandr
 */
class UserModel {
    
    /**
     * Returns user id by his login
     * 
     * @param string $log (login)
     * @return boolean | integer (id by login)
     */
    public static function getIdByLogin($log){
        $db = dbConection::get();
        $query = "SELECT `id` FROM `users`".
                " WHERE `login`=:log";
        $sth = $db->prepare($query);
        $sth->bindParam(':log', $log, PDO::PARAM_STR, 100);
        $sth->execute();
        if($row = $sth->fetch(PDO::FETCH_ASSOC)){
            return intval($row['id']);
        }
        return FALSE;
    }
    
    /**
     * Returns user login by his id
     * 
     * @param integer $id
     * @return boolean | string (user login)
     */
    public static function getLoginById($id){
        $db = dbConection::get();
        $query = "SELECT `login` FROM `users`".
                " WHERE `id`=:id";
        $sth = $db->prepare($query);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        if($row = $sth->fetch(PDO::FETCH_ASSOC)){
            return $row['login'];
        }
        return FALSE;
    }
    
    /**
     * Returns user password by his login
     * 
     * @param string $log
     * @return boolean | string (user password)
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
     * Adds new user
     * 
     * @param string $log (login)
     * @param string $email (e-mail)
     * @param string $pass (password)
     * @return boolean
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
     * Checks if exist user with this login
     * 
     * @param string $log (login)
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
     * Checks if exist user with this e-mail
     * 
     * @param string $email (e-mail)
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
     * Checks if user logged now
     * 
     * @return boolean | integer (user id from session)
     */
    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return intval($_SESSION['user']);
        }
        return FALSE;
    }
    
    
}
