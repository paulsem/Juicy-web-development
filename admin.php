<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['email'])){?>
<html>

<head>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
</head>

<body>
    <nav class="topnav">
            <a href="/juicy/admin.php" id="home">Home</a>
            <a href="logout">Logout</a>
    </nav>    
    
    <br>
    <section>
        <div class="row">

            <div class="box1">
                <div class="box">
                    <?php
                        
                        
                        echo "<h1>Welcome ".$_SESSION['email']."</h1>";
                        
                    ?>      
                </div>
                <br><br>
                
                
            </div> 
            <div class="box1">
                <a href="add_product" class="button">Add products</a>
                <a href="edit_products" class="button">Edit products</a>
                <a href="inventory" class="button">Inventory</a>
                <a href="pending_orders" class="button">Pending orders</a>
                <a href="../juicy/crud/add_products.html" class="button">History</a>
            </div>

        </div>

    </section>
    
    
</body>

</html>
<?php } else echo 'Acces forbidden';?>

