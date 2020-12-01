
<?php
  //require_once "database.php";
  $conn=mysqli_connect("localhost","root","","slatkisi");

  if (isset($_POST['query'])) {
     
    $query = "SELECT * FROM kolaci WHERE naziv LIKE '%{$_POST['query']}%'
                                          OR sastojci LIKE '%{$_POST['query']}%'
                                          OR vremePripreme LIKE '%{$_POST['query']}%' 
                                          OR tip LIKE '%{$_POST['query']}%'
                                          OR tip in (SELECT tipID
                                                     FROM kategorija
                                                     WHERE nazivKategorije LIKE '%{$_POST['query']}%') ";
    $result = mysqli_query($conn, $query);
 
  if (mysqli_num_rows($result) > 0) {
    echo '<div class="row justify-content-center">';
    echo '<table class=table>';
    echo '<thead>';
    echo '<tr>';
        echo '<th>Naziv</th>';
        echo '<th>Sastojci</th>';
        echo '<th>Vreme pripreme</th>';
        echo '<th>Tip</th>';
    echo '</tr>';
    echo '</thead>' ; 
    while ($recept = mysqli_fetch_array($result)){
     echo '<tr>';

     echo '<td>'.$recept['naziv'].'</td>';
     echo '<td>'.$recept['sastojci'].'</td>';
     echo '<td>'.$recept['vremePripreme'].'</td>';
     echo '<td>'.$recept['tip'].'</td>';
     
     echo '</tr>'; 
      //echo $recept['naziv']."<br/>";
       
    } 
    echo '</table>';
    echo '</div>';
    } else {
    echo "<p style='color:red'>Recept nije pronadjen...</p>";
  }
}
 
 ?>

