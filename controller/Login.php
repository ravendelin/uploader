<?php



namespace controller;

/**
 * Description of Login
 *
 * @author pavel7mikhaylov@gmail.com
 */
class Login {
    public function autorization(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $config = \config\AdminCfg::getConfig();
        if (isset($config['login'])){
            if($post['login'] == $config['login']){
                $_SESSION['admin'] = 1;
                $message = 'Authorization complete';
            }
        } else {
            
           \config\AdminCfg::addItem('login', $post['login']);
           \config\AdminCfg::addItem('password', $post['password']);
            $message = 'NEW ADMIN DATA SAVED';
           
        }
         include 'templates/emptypage.template.php';
    }
    
    public function loginForm(){
        include 'templates/login.php';
    }
}
