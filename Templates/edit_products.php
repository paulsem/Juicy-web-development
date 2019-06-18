<?php if(isset($_SESSION['email'])){?>
<html>
    <head>
            <?php flush(); ?>
            <link rel="stylesheet" href="/juicy/css/menu.css">
            <link rel="stylesheet" href="/juicy/css/style.css">       
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
        <nav class="topnav">
            <a href="admin.php" id="home">Home</a>
            <a href="logout">Logout</a>
        </nav>    
<?php 
        
        echo '<table>
        <tr>
            <td>Produs</td>
            <td>Price</td>
            <td>Cantitate</td>
            <td>Imagine</td>
        </tr>';   
        foreach($data as $row){
           ?>
          <tr>
              <form action="update_product" method="post">
              <input type="hidden" name="id" value='<?php echo $row["id"];?>'>
              <td><input name="nume" type="text" value= '<?php echo $row["nume"];?>'> </td>
              <td><input name="pret" type="text" value= '<?php echo $row["pret"];?>'> </td>
              <td><input name="qty" type="text" value= '<?php echo $row["cantitate"];?>'> </td>
              
        <?php
            
               if($row['image']!=NULL) 
                   echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="50" width="50" class="img-thumnail" /></td>';
           
          ?>
                  <td><input type="submit" style="width:100px;" value="Update"></td>
            </form>
              
              
            <form action="delete_record" method="post">
                <input type="hidden" name="id" value= '<?php echo $row["id"];?>'>
                <td><input type="submit" style="width:100px;" value="Delete"></td>
              </form>
        <?php
            echo '</tr>';
        }
            echo '</table>';
        ?>
<?php flush(); ?>
</body>
</html>

<?php
}
else echo 'Acces forbidden';
?>