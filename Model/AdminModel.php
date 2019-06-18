<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "juicy");
        
session_start();


class AdminModel {
    function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    
    function check_login($email, $pass) {
        $email = $this->conn->real_escape_string($email);
        $sql = "SELECT * FROM admin_users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        
        if($result->num_rows < 0){
             return 0;
        }
        else{
            if($row = $result->fetch_assoc()){
                
                if($pass != $row['password']) {
                    return -1;
                    
                } elseif($pass == $row['password']) {
                    $_SESSION['email'] = $row['email'];
                    return 1;
                }
            }
        }
    }
    
    function register($email, $pass) {
        $sql = "INSERT INTO admin_users (email, password,permission) VALUES ('$email', '$pass','0')";
        
        $this->conn->query($sql);
        return 1;
    }
    
    function email_exists($email){
        $email = $this->conn->real_escape_string($email);
        $sql = "SELECT email FROM admin_users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0){
             return 0;
        }
        
        return 1;
    }
    
    function add_product($nume,$pret,$cantitate,$file){
       
        $sql="INSERT INTO products(nume,pret,cantitate,image) VALUES ('$nume','$pret','$cantitate','$file')";
        
        $this->conn->query($sql);
        return 1;
    }
    
    
    
    function proces_order($client,$adresa,$produs,$cantitate,$data_comanda){
        $sql="INSERT INTO processed_orders(client,adresa,produs,cantitate,data_comanda) VALUES ('$client','$adresa','$produs','$cantitate','$data_comanda',sysdate())";
        
        $this->conn->query($sql);
        
       /* $sql1 = "update products set cantitate=cantitate-'$cantitate' where nume ='$produs'";
        $this->conn->query($sql1);
        
        $sql2 = "delete from pending_orders where id='$id'";
        $this->conn->query($sql2);*/
        
        return 1;
    }
    
    
    function product_exists($nume){
        $nume = $this->conn->real_escape_string($nume);
        $sql = "SELECT nume FROM products WHERE nume = '$nume'";
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0){
             return 0;
        }
        return 1;
    }
    
    function negative_price($price){
        if($price < 0)
            return 0;
        return 1;
    }
    
    function negative_quantity($qty){
        if($qty < 0)
            return 0;
        return 1;
    }
    
    function show_all_products(){
        $sql = 'select * from products order by id';
        return $this->conn->query($sql);
        
    }
    
    function delete_product($id){
        
        $sql = "delete from products where id='$id'";
        return $this->conn->query($sql);
    }
    
    function select_one_product($id){
        $sql = "select * from products where id='$id' LIMIT 1";
        return $this->conn->query($sql);
    }
    
    function update_product($id,$nume,$pret,$cantitate){
        $sql = "update products set nume='$nume', pret='$pret', cantitate='$cantitate' where id ='$id'";
        
        return $this->conn->query($sql);
        
    }
    
    function pending_orders(){
        $sql1 = 'select * from pending_orders order by data asc';
        return $this->conn->query($sql1);
    }
    
    function inventory(){
        $sql = 'select nume,cantitate  from products order by id';
        return $this->conn->query($sql);
    }
    
    function logout(){
        session_destroy();
    }
    
    
}