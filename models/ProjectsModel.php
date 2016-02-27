<?php


/**
 * ProjectsModel
 *
 * @author Oleksandr
 */
class ProjectsModel {
    
    /**
     * Returns all user projects
     * 
     * @param integer $user_id
     * @return boolean | array (all user projects)
     */
    public static function getAllByUserId($user_id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $projects = array();
        $query = 'SELECT `id`, `name` FROM `projects` WHERE `user_id`=:user_id';
        $stm = $db->prepare($query);
        $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stm->execute();
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
            $projects[$i]['id'] = $row['id'];
            $projects[$i]['name'] = $row['name'];
            $i++;
        }
        return $projects;
    }
    
    /**
     * Returns last user project
     * 
     * @param integer $user_id
     * @return boolean | array (last user project)
     */
    public static function getLastByUserId($user_id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'SELECT `id`, `name` FROM `projects`'.
                ' WHERE `user_id`=:user_id ORDER BY `id` DESC LIMIT 1';
        $stm = $db->prepare($query);
        $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Adds new project
     * 
     * @param string $name (project name)
     * @param integer $user_id
     * @return boolean
     */
    public static function create($name, $user_id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'INSERT INTO `projects` (`name`, `user_id`)'.
                ' VALUES (:name, :user_id)';
        $stm = $db->prepare($query);
        $stm->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Returns project by its id
     * 
     * @param integer $id
     * @return boolean | array (project)
     */
    public static function getById($id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'SELECT `id`, `name` FROM `projects`'.
                ' WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Updates project by its id
     * 
     * @param integer $id
     * @param string $name
     * @return boolean
     */
    public static function updateById($id, $name){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'UPDATE `projects` SET `name`=:name'.
                ' WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Deletes project by its id
     * 
     * @param integer $id
     * @return boolean
     */
    public static function deleteById($id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'DELETE FROM `projects` WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
}
