<?php


namespace model;

/**
 * Getting information from base , using CRUD abstract class
 *
 * @author pavel7mikhaylov@gmail.com
 */
class Page extends CRUD {
    
    const TABLE = 'files';
    public $id;
    public $name;
    public $size;
    public $date;
    public $category_id;
    
    //put your code here
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSize() {
        return $this->size;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCategory_id() {
        return $this->category_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setSize($size): void {
        $this->size = $size;
    }

    public function setDate($date): void {
        $this->date = $date;
    }

    public function setCategory_id($category_id): void {
        $this->category_id = $category_id;
    }
    
    
    public function getFiles(){
                
        return self::readLimit($start, $count);
    }


}
