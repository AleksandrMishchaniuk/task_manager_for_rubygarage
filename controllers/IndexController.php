<?php

include_once (ROOT.'/models/UserModel.php');

/**
 * Controller for starting application
 *
 * @author Oleksandr
 */
class IndexController {
    
    /**
     * Loads index view
     * @return boolean
     */
    public function actionIndex(){
        include (ROOT.'/views/IndexView.php');
        return TRUE;
    }
    
    /**
     * Sends answer, if logged user or not
     * @return boolean
     */
    public function actionStart(){
        $user_id = UserModel::checkLogged();
        if($user_id){
            echo '1';
        }else{
            echo '';
        }
        return TRUE;
    }
    
    /**
     * Sends html template file
     * @param string $tpl_name (name of html template file)
     * @return boolean
     */
    public function actionTemplate($tpl_name){
        include (ROOT.'/views/'.$tpl_name.'View.php');
        return TRUE;
    }
    
}