<?php
class AdminController {
    function __construct() {
        $this->model = new AdminModel();
    }
    
    function index() {
        include 'Templates/index.php';
    }
    
    function admin(){
        include 'Templates/admin.php';
    }
    
    function login() {
        $error = false;
        
        if(isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            $login = $this->model->check_login($email, $pass);
            
            if($login == 0) {
                $error = "Invalid email!";
            }
            else if($login == -1) {
                $error = "Invalid password!";
            }
            else {
                
                header("Location: /juicy/admin.php");
                die();
            }
        }
        
        include 'Templates/login.php';
    }
    
    
    function register() {
        $message = false;
        
        if(isset($_POST['email'], $_POST['password'])){
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            if($this->model->email_exists($email)==0) {
                $message = 'Email already registered!';
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = 'Invalid email address!';
            }
            else if(strlen($pass) < 6) {
                $message = 'Password too short!';
            }
            else {
                $this->model->register($email, $pass);
                $message = 'Successfully registered!';
            }
        }
        
        include 'Templates/register.php';
    }
    
    function add_product(){
        $err= false;
        
        if(isset($_POST['nume'], $_POST['price'],$_POST['qty']))
        {
          $nume = $_POST['nume'];
          $pret = $_POST['price'];
          $cantitate = $_POST['qty'];
          $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
          
          if($this->model->product_exists($nume)==0){
              $err = 'This product exists already in the database';
          }
          else if($this->model->negative_price($pret)==0){
              $err = 'The product cannot have negative value';
          }
          else if($this->model->negative_quantity($cantitate)==0){
              $err = 'The product cannot have negative quantity';
          }
          else{
              $this->model->add_product($nume,$pret,$cantitate,$file);
              header("Location: /juicy/admin.php");
          }
              
        }
        
        include 'Templates/add_product.php';
        
    }
    
    function logout() {
       
        $this->model->logout();
        header("Location: Templates/");
    }
    
    function show_all_products(){
        
            $data = array();
            $k=0;

            if($result = $this->model->show_all_products()){
               while($obj = $result->fetch_array()){
                   $data[$k]=$obj;
                   $k++;
               }
            }

           include 'Templates/edit_products.php';
        
        
    }
    
    function delete_product($id){
        
            $this->model->delete_product($id);
            header('Location:/juicy/admin.php');

            include 'Templates/delete_record.php';
        
    }
    
    function inventory(){
        $data=array();
        $k=0;
        
        if($result = $this->model->show_all_products()){
           while($obj = $result->fetch_array()){
               $data1[$k]=$obj;
               $k++;
           }
        }
       
       include 'Templates/inventory.php';
        
    }
    
    function select_one_product(){
        if($result = $this->model->fetch_array()){
            $id=$result['id'];
            $nume=$result['nume'];
            $pret=$result['pret'];
            $cantitate=$result['cantitate'];
            $image=$result['image'];
        }
        include 'Templates/update_product.php';
    }
    
    function update_product($id){
        $err= false;
        
        if(isset($_POST['nume'], $_POST['pret'],$_POST['qty']))
        {
          var_dump($id);
          $nume = $_POST['nume'];
          $pret = $_POST['pret'];
          $cantitate = $_POST['qty'];
         
          
          if($this->model->negative_price($pret)==0){
              $err = 'The product cannot have negative value';
          }
          else if($this->model->negative_quantity($cantitate)==0){
              $err = 'The product cannot have negative quantity';
          }
          else{
              $this->model->update_product($id,$nume,$pret,$cantitate);
              header("Location: /juicy/edit_products");
          }
              
        }
        
        //include 'Templates/edit_products.php';
        include 'Templates/update_record.php';
    }
    
    function pending_orders(){
        $data2 = array();
        $k=0;
        
        if($result = $this->model->pending_orders()){
           while($obj = $result->fetch_array()){
               $data2[$k]=$obj;
               $k++;
           }
        }
       
       include 'Templates/pending_orders.php';
    }

    function proces_order(){
        if(isset($_POST['client'],$_POST['adresa'],$_POST['produs'],$_POST['cantitate'],$_POST['data_comanda'])){
            $client=$_POST['client'];
            $adresa=$_POST['adresa'];
            $produs=$_POST['produs'];
            $cantitate=$_POST['cantitate'];
            $data_comanda=$_POST['data_comanda'];
           
            $this->model->proces_order($client,$adresa,$produs,$cantitate,$data_comanda);
        }
        
        include 'Templates/proces_order.php';
    }
    
    function handle($url = '/') {
        
        $url = trim($url, '/');
        if($url == '' || $url == 'index.php') {
            $this->index();
        }
        else if($url=='admin'){
            $this->admin();
        }
        
        else if($url == 'login') {
            $this->login();
        }
        else if($url == 'register'){
            $this->register();
        }
        else if($url == 'add_product'){
            $this->add_product();
        }
        else if($url == 'admin'){
            $this->admin();
        }
        else if($url == 'logout'){
            $this->logout();
        }
        else if($url == 'edit_products'){
            $this->show_all_products();
        }
        else if($url == 'inventory'){
            $this->inventory();
        }
        else if($url == 'delete_record'){
            $this->delete_product($aux); 
        }
        else if($url == 'update_product'){
            $this->update_product($id);
        }    
        else if($url == 'pending_orders'){
            $this->pending_orders();
        }
        else if($url == 'proces_order'){
            $this->proces_order();
        }
        else {
            echo "404";
        }
        
        
    }
    
    
}