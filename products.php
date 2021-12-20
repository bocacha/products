<!--Oriented Object Programming Logic-->

<?php
    abstract class Product{
        public $table;
        private $sku;
        private $name;
        private $price;
        public function getSku(){
            return $this->sku;
        }
        public function setSku($sku){
            $this->sku = $sku;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getPrice(){
            return $this->price;
        }
        public function setPrice($price){
            $this->price = $price;
        }
        abstract public function getSpecsFrom($arr);
        abstract public function save($connection);
    }
    class Dvd extends Product{
        private $size;
        public function __construct(){
            $this->table = "dvds";
        }
        public function getSize(){
            return $this->size;
        }
        public function setSize($size){
            $this->size = $size;
        }
        public function getSpecsFrom($arr){
            $this->setSku($arr['sku']);
            $this->setName($arr['name']);
            $this->setPrice($arr['price']);
            $this->setSize($arr['size']);
        }
        public function save($connection){
            $result = mysqli_query($connection,"SELECT * FROM products WHERE sku='".$this->getSku()."'");
            if($result->fetch_assoc()){
                mysqli_query($connection,"UPDATE products where sku = '".$this->getSku()."'") or die(mysqli_error($connection));
            }
            else{
                mysqli_query($connection,"INSERT INTO products (sku,quantity,price,name,size) VALUES('".$this->getSku().$this->getPrice()." $','".$this->getName()."','".$this->getSize()." MB')") or die(mysqli_error($connection));
            }
        }
    }   
    class Book extends Product{
        private $weight;
        public function __construct(){
            $this->table = "books";
        }
        public function getWeight(){
            return $this->weight;
        }
        public function setWeight($weight){
            $this->weight = $weight;
        }
        public function getSpecsFrom($arr){
            $this->setSku($arr['sku']);
            $this->setName($arr['name']);
            $this->setPrice($arr['price']);
            $this->setWeight($arr['weight']);
        }
        public function save($connection){
            $result = mysqli_query($connection,"SELECT * FROM products WHERE sku='".$this->getSku()."'");
            if($result->fetch_assoc()){
                mysqli_query($connection,"UPDATE products  where sku = '".$this->getSku()."'") or die(mysqli_error($connection));
            }
            else{
                mysqli_query($connection,"INSERT INTO products (sku,quantity,price,name,weight) VALUES('".$this->getSku().$this->getPrice()." $','".$this->getName()."','".$this->getWeight()." Kg')") or die(mysqli_error($connection));
            }
        }
    }
    class Furniture extends Product{
        public function __construct(){
            $this->table = "furniture";
        }
        private $height;
        private $width;
        private $length;
        public function getHeight(){
            return $this->height;
        }
        public function setHeight($height){
            $this->height = $height;
        }
        public function getWidth(){
            return $this->width;
        }
        public function setWidth($width){
            $this->width = $width;
        }
        public function getLength(){
            return $this->length;
        }
        public function setLength($length){
            $this->length = $length;
        }
        public function getSpecsFrom($arr){
            $this->setSku($arr['sku']);
            $this->setName($arr['name']);
            $this->setPrice($arr['price']);
            $this->setHeight($arr['height']);
            $this->setWidth($arr['width']);
            $this->setLength($arr['length']);
        }
        public function save($connection){
            $result = mysqli_query($connection,"SELECT * FROM products WHERE sku='".$this->getSku()."'");
            if($result->fetch_assoc()){
                mysqli_query($connection,"UPDATE products  where sku = '".$this->getSku()."'") or die(mysqli_error($connection));
            }
            else{
                mysqli_query($connection,"INSERT INTO products (sku,quantity,price,name,height,width,length) VALUES('".$this->getSku().$this->getPrice()." $','".$this->getName()."','".$this->getHeight()."','".$this->getWidth()."','".$this->getLength()."')") or die(mysqli_error($connection));
            }
        }
    }
?>
