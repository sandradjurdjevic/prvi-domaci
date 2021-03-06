<?php  
 //index.php  
 //$connect = mysqli_connect('localhost', 'root', '', 'slatkisi');  
// $query = "SELECT * , r.nazivKategorije FROM kolaci k LEFT JOIN kategorija r on (k.tip=r.tipID)
           //GROUP BY k.id  
           //ORDER BY id DESC";  
 //$result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
        <head>  
           <title>Recepti</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
        <!--<h1>php require_once 'process.php'</h1>-->

        <a href="index.php" class="btn btn-info" style="height:70px;"><h2>Home</h2></a>

        <div class="container">
        <div class="row">
        <div class="col-lg-4">
            <h2>Pretrazi recepte</h2>
            <input type="text" name="search" id="search" autocomplete="off" placeholder="search...">
            <br/>
        <div id="output"></div>
        </div>
        <br/>


        <br />            
        <div class="container" style="width:1200px;" align="center">  
                 
            <div class="table-responsive" id="kolaci_table">  
                <table class="table table-bordered">  
                    <tr>  
                        <th><a class="column_sort" id="redniBroj" data-order="desc" href="#">R.B.</a></th>        
                        <th><a class="column_sort" id="naziv" data-order="desc" href="#">Naziv</a></th>  
                        <th><a class="column_sort" id="sastojci" data-order="desc" href="#">Sastojci</a></th>  
                        <th><a class="column_sort" id="vremePripreme" data-order="desc" href="#">Vreme pripreme</a></th>  
                        <th><a class="column_sort" id="tip" data-order="desc" href="#">Tip</a></th> 
                        <th><a class="column_sort" id="nazivKategorije" data-order="desc" href="#">Kategorija</a></th> 
                        <th colspan="2">Action</th>
                     
                    </tr>  
                <?php 

                    include 'database.php';
                    $model = new Database('slatkisi');
                    $rows = $model->fetch();
                    $i = 1;
                    if(!empty($rows)){
                      foreach($rows as $row){ 
                  
                ?>  
                <tr>  
                    <td><?php echo $i++; ?></td>           
                    <td><?php echo $row["naziv"]; ?></td>  
                    <td><?php echo $row["sastojci"]; ?></td>  
                    <td><?php echo $row["vremePripreme"]; ?></td>  
                    <td><?php echo $row["tip"]; ?></td> 
                    <td><?php echo $row["nazivKategorije"]; ?></td>
                    <td>
                        <a href="kolaci.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>
                        <a href="kolaci.php?delete=<?php echo $row['id']; ?>"
                            class="btn btn-danger">Delete</a>
                    </td> 
                </tr>  
                <?php
                   }
                    }else{
                    echo "no data";
                    }

                ?> 
                </table>  
                </div>  
           </div>  
           <br /> 

           
         <a href="kolaci.php?insert"  class="btn btn-info" style="height:70px;"><h2>Unesi nov</h2></a>
    

    </body>  
 </html> 

 <script type="text/javascript">
    $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'search.php',
              method: 'POST',
              data: {query:query},
              success: function(data){
 
                $('#output').html(data);
                $('#output').css('display', 'block');
 
                $("#search").focusout(function(){
                    $('#output').css('display', 'none');
                });
                $("#search").focusin(function(){
                    $('#output').css('display', 'block');
                });
              }
            });
          } else {
          $('#output').css('display', 'none');
        }
      });
    });
  </script>

 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#kolaci_table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  
 </script>  