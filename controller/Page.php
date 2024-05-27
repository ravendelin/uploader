<?php

namespace controller;
/**
 * Controller of Page using Page Model
 *
 * @author pavel7mikhaylov@gmail.com
 */

class Page {
    
    public function show(){
        $numNews = 3;
        $page = (int)$_GET['showpage'] ?: 1;
        
       $getContent = \model\Page::readLimit($page,$numNews);
      echo json_encode($getContent);
    }
    
    function pageShow()
    {
        $numNews = 3;
        $page = (int)$_GET['showpage'] ?: 1;
       
         // example we need 3 page on 3 news on page  
               
        $news = \model\Page::readLimit($page, $numNews);
     
        include 'templates/index.php';

    }
   
    
    
}
