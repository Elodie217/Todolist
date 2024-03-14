<?php
namespace Category;


class Category{

    private $id_category;
    private $name_category;
   
    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of name_category
     */ 
    public function getName_category()
    {
        return $this->name_category;
    }

    /**
     * Set the value of name_category
     *
     * @return  self
     */ 
    public function setName_category($name_category)
    {
        $this->name_category = $name_category;

        return $this;
    }
}