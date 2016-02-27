<?php


/**
 * TasksModel
 *
 * @author Oleksandr
 */
class TasksModel {
    
    /**
     * Returns all project tasks
     * 
     * @param integer $proj_id
     * @return boolean | array (all project tasks)
     */
    public static function getAllByProjId($proj_id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = "SELECT * FROM `tasks` WHERE `project_id`=:proj_id".
                " ORDER BY `priority` DESC";
        $stm = $db->prepare($query);
        $stm->bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
        $stm->execute();
        $tasks = array();
        $i = 0;
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
            foreach ($row as $key => $val){
                $tasks[$i][$key] = $row[$key];
            }
            $i++;
        }
        return $tasks;
    }
    
    /**
     * Returns last project task
     * 
     * @param integer $proj_id
     * @return boolean | array (last project task)
     */
    public static function getLastByProjId($proj_id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = "SELECT * FROM `tasks` WHERE `project_id`=:proj_id".
                " ORDER BY `id` DESC LIMIT 1";
        $stm = $db->prepare($query);
        $stm->bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Adds new task
     * 
     * @param string $name (task name)
     * @param integer $priority
     * @param integer $proj_id
     * @return boolean
     */
    public static function create($name, $priority, $proj_id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'INSERT INTO `tasks` (`name`, `priority`, `project_id`)'.
                ' VALUES (:name, :prior, :proj_id)';
        $stm = $db->prepare($query);
        $stm->bindParam(':name', $name, PDO::PARAM_STR, 255);
        $stm->bindParam(':prior', $priority, PDO::PARAM_INT);
        $stm->bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Returns task by its id
     * 
     * @param integer $id
     * @return boolean | array (task)
     */
    public static function getById($id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = "SELECT * FROM `tasks` WHERE `id`=:id";
        $stm = $db->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Updates task by its id
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
        $query = 'UPDATE `tasks` SET `name`=:name'.
                ' WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':name', $name, PDO::PARAM_STR, 255);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Deletes task by its id
     * 
     * @param integer $id
     * @return boolean
     */
    public static function deleteById($id){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'DELETE FROM `tasks` WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Sets deadline for task
     * 
     * @param integer $id
     * @param string $deadline
     * @return boolean
     */
    public static function setDeadline($id, $deadline){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'UPDATE `tasks` SET `deadline`=:deadline'.
                ' WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':deadline', $deadline, PDO::PARAM_STR);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Exchanges priority for two tasks
     * 
     * @param integer $id_1
     * @param integer $id_2
     * @return boolean
     */
    public static function exchangePriority($id_1, $id_2){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'SET @p1=0;'.
                ' SET @p2=0;'.
                ' CALL get_priority(:id_1, @p1);'.
                ' CALL get_priority(:id_2, @p2);'.
                ' UPDATE tasks SET priority=@p2 WHERE id=:id_1;'.
                ' UPDATE tasks SET priority=@p1 WHERE id=:id_2;';
        $stm = $db->prepare($query);
        $stm->bindParam(':id_1', $id_1, PDO::PARAM_INT);
        $stm->bindParam(':id_2', $id_2, PDO::PARAM_INT);
        return $stm->execute();
    }
    
    /**
     * Changes task status
     * 
     * @param integer $id
     * @param integer $status
     * @return boolean
     */
    public static function changeStatus($id, $status){
        $db = dbConection::get();
        if(!$db){
            return FALSE;
        }
        $query = 'UPDATE `tasks` SET `status`=:status'.
                ' WHERE `id`=:id';
        $stm = $db->prepare($query);
        $stm->bindParam(':status', $status, PDO::PARAM_INT);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
    
}
