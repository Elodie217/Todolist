<?php 
namespace Product;

class Product{

    private $id_products;
    private $name_products;
    private $description_products;
    private $price_products;
    private $id_category;
    private $name_category;
    private $image_products;

    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }



    /**
     * Get the value of id_products
     */ 
    public function getId_products()
    {
        return $this->id_products;
    }

    /**
     * Set the value of id_products
     *
     * @return  self
     */ 
    public function setId_products($id_products)
    {
        $this->id_products = $id_products;

        return $this;
    }

    /**
     * Get the value of name_products
     */ 
    public function getName_products()
    {
        return $this->name_products;
    }

    /**
     * Set the value of name_products
     *
     * @return  self
     */ 
    public function setName_products($name_products)
    {
        $this->name_products = $name_products;

        return $this;
    }

    /**
     * Get the value of description_products
     */ 
    public function getDescription_products()
    {
        return $this->description_products;
    }

    /**
     * Set the value of description_products
     *
     * @return  self
     */ 
    public function setDescription_products($description_products)
    {
        $this->description_products = $description_products;

        return $this;
    }

    /**
     * Get the value of price_products
     */ 
    public function getPrice_products()
    {
        return $this->price_products;
    }

    /**
     * Set the value of price_products
     *
     * @return  self
     */ 
    public function setPrice_products($price_products)
    {
        $this->price_products = $price_products;

        return $this;
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

    /**
     * Get the value of image_products
     */ 
    public function getImage_products()
    {
        return $this->image_products;
    }

    /**
     * Set the value of image_products
     *
     * @return  self
     */ 
    public function setImage_products($image_products)
    {
        $this->image_products = $image_products;

        return $this;
    }
}
