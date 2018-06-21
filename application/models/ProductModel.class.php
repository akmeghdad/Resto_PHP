<?php
class ProductModel
{
	public function getProducts()
    {
    	
		//library/Database.class.php

        $database = new Database();
        $products = $database->query("SELECT * FROM products");
        
        return $products;
    }
}