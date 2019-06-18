<?php
if(isset($_SESSION['email'])){
    //var_dump($_POST['id']);
    flush();
    if(isset($_POST['id'])){
        $this->delete_product($_POST['id']);
    }
    header('Location:/juicy/edit_products');
}
else 
    echo 'Acces forbidden';
?>