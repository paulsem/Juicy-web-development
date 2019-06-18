<?php
if(isset($_SESSION['email'])){
    if(isset($_POST['id'])){
        $this->update_product($_POST['id']);
    }
}
else echo 'Acces forbidden';
?>