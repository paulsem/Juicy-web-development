<?php if(isset($_SESSION['email'])){?>
<html>
    <head><head>
            <link rel="stylesheet" href="/juicy/css/menu.css">
            <link rel="stylesheet" href="/juicy/css/style.css">
        </head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
        <nav class="topnav">
            <a href="admin.php" id="home">Home</a>
            <a href="logout">Logout</a>
        </nav>    
        <br><br>
        <div class="box1">
                <div class="box">
                   <p>Pending orders</p> 
                </div>
                <br><br>
                
                
            </div> 
<?php 
        echo '<table>
        <tr>
            <td>Client</td>
            <td>Adresa</td>
            <td>Produs</td>
            <td>Cantitate</td>
            <td>Data</td>
        </tr>';   
        foreach($data2 as $row){
          echo '<td>'.$row["client"].'</td>';
          echo '<td>'.$row["adresa"].'</td>';
          echo '<td>'.$row["produs"].'</td>';
          echo '<td>'.$row["cantitate"].'</td>';
          echo '<td>'.$row["data"].'</td>';
            ?>
         <form action="proces_order" method="post">
            <input type="hidden" name="id" value= '<?php echo $row["id"];?>'>
            <input type="hidden" name="client" value= '<?php echo $row["client"];?>'>
             <input type="hidden" name="adresa" value= '<?php echo $row["adresa"];?>'>
             <input type="hidden" name="produs" value= '<?php echo $row["produs"];?>'>
             <input type="hidden" name="cantitate" value= '<?php echo $row["cantitate"];?>'>
             <input type="hidden" name="data_comanda" value= '<?php echo $row["data"];?>'>
            <td><input name="submit" type="submit" style="width:150px;" value="Process order"></td>
          </form>
        <?php
          echo '</tr>';
        }
        echo '</table>';
       
        ?>

</body>
</html>
<?php
}
else 
    echo 'Acces forbidden!';
?>