
<?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "slatkisi");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * , r.nazivKategorije FROM kolaci k LEFT JOIN kategorija r on (k.tip=r.tipID)
           GROUP BY k.id ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
            
           <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>  
           <th><a class="column_sort" id="sastojci" data-order="'.$order.'" href="#">Sastojci</a></th>  
           <th><a class="column_sort" id="vremePripreme" data-order="'.$order.'" href="#">Vreme pripreme</a></th>  
           <th><a class="column_sort" id="tip" data-order="'.$order.'" href="#">Tip</a></th>
           <th><a class="column_sort" id="nazivKategorije" data-order="desc" href="#">Kategorija</a></th>   
           <th colspan="2">Action</th>
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
            
           <td>' . $row["naziv"] . '</td>  
           <td>' . $row["sastojci"] . '</td>  
           <td>' . $row["vremePripreme"] . '</td>  
           <td>' . $row["tip"] . '</td>
           <td>' . $row["nazivKategorije"] . '</td>   
           <td>
                <a class="btn btn-info">Edit</a>
                <a class="btn btn-danger">Delete</a>
            </td>
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  