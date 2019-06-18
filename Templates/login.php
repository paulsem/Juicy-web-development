<!DOCTYPE html>
<html>
<head>
    <?php flush(); ?>
    <link rel="stylesheet" href="/juicy/css/menu.css">
    <link rel="stylesheet" href="/juicy/css/style.css">
</head>
<body>
       <nav class="topnav">
            <a href="index.php" id="home">Home</a>
            <a href="register">Register</a>
            <a href="login">Login</a>
            <a href="about">About</a>
            <a href="contact">Contact</a>
            <a href="shop">Shop</a> 
        </nav>    

<br>

<section class="container">
    <div class="row">
    <div class="box">
    <h2>Login page</h2>
    </div>
       <br>
        <form action="" method="POST" class="box">
            <label>E-mail address:</label><br>
            <input type="email" name="email">
            <br>
            <label>Password:</label><br>
            <input type="password" name="password">
            <br>
            <br>
            <button type="submit" name="submit">Login</button>
            <br>
            <?php 
                if($error) 
                    echo $error;
            ?>
        </form>
    </div>
</section>
    
<footer class="footer">
             <div class="contain">
                <div class="col">
                    <h1>Sales Contact:</h1>
                    <ul>
                        <li>Juicy Palace bld. Number 236
                            Building 999, Second Floor, Office 5669.
                        </li>

                        <li>Tel: 000.111.222 Fax: 000.111.555</li>
                        <li>Email: <a href="mailto:juicysales@juicy.com?Subject=">juicysales@juicy.com</a></li>
                    </ul>
                </div>

             </div>

             <div class="contain">
                <div class="col">
                    <h1>Bussiness partner:</h1>
                    <ul>
                        <li>For any partenership
                            please cmplete the <a href="#">contact form</a>!
                        </li>

                        <li>For any clarification call: 000.222.333</li>
                    </ul>
                </div>

             </div>

             <div class="contain">
                <div class="col">
                    <h1>Help</h1>
                    <ul>
                        <li><a>How do I order?</a></li>            
                        <li><a>What if the order does not arrive in time?</a></li>
                    </ul>
                </div>

             </div>        

            </footer>

</body>
</html>
