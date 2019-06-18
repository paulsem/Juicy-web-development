<!DOCTYPE html>
<?php if(isset($_SESSION['email'])){?>
    <html>

    <head>
                <link rel="stylesheet" href="/juicy/css/menu.css">
                <link rel="stylesheet" href="/juicy/css/style.css">
            </head>

    <body>
            <nav class="topnav">
                <a href="admin.php" id="home">Home</a>
                <a href="logout">Logout</a>
            </nav>    


        <br>
        <section>
            <div class="row">
                <?php if($err) echo $err; ?>
                <form method="post" action="" enctype='multipart/form-data'>  
                         <input type="text" name="nume" id="nume" placeholder="produs"/> 
                         <br><br>
                         <input type="number" name="price" id="price" placeholder="price"/> 
                        <br><br> 
                         <input type="number" name="qty" id="qty" placeholder="quantity"/> 
                            <br><br>
                         <input type="file" name="image" id="image" />  
                            <br><br>
                         <input type="submit" name="insert" id="insert" value="Insert"  />  
                </form>

            </div>

        </section>


    </body>

    </html>
<?php
}
else echo 'Acces forbidden';
?>
