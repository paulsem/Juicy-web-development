<html>
    <head><head>
            <link rel="stylesheet" href="/juicy/css/menu.css">
            <link rel="stylesheet" href="/juicy/css/style.css">
         <script>
            function confirmDelete(delUrl) {
              if (confirm("Are you sure you want to delete")) {
                document.location = delUrl;
              }
            }
        </script>
        </head>
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
            <td>Cantitate disponibila</td>
        </tr>';   
        if($data!=NULL){
        foreach($data1 as $row){
          
           echo '<tr><td>'.$row["nume"].'</td><td>'.$row["cantitate"].'kg</td>';
           }
         
            echo '</tr>';
        
            echo '</table>';
        }
        ?>
        

</body>
</html>