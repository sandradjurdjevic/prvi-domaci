<!DOCTYPE html>  
 <html>  
    <head>  
        <title>Recepti - izmeni</title>   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    </head>  
    <body>

<?php 

	include 'database.php';
	$model = new Database('slatkisi');
	
	if(isset($_GET['delete'])!=null){

		$id = $_GET['delete'];
		$delete = $model->delete("kolaci",'id',$id);
		
		if ($delete) {
			echo "<script>alert('delete successfully');</script>";
			echo "<script>window.location.href = 'recepti2.php';</script>";
		}
    }
    

    
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $row = $model->edit('kolaci',$id);
    
        if (isset($_POST['update'])) {
         if (isset($_POST['naziv']) && isset($_POST['sastojci']) && isset($_POST['vremePripreme']) && isset($_POST['tip'])) {
            if (!empty($_POST['naziv']) && !empty($_POST['sastojci']) && !empty($_POST['vremePripreme']) && !empty($_POST['tip']) ) {
          
            $data['id'] = $id;
            $data['naziv'] = $_POST['naziv'];
            $data['sastojci'] = $_POST['sastojci'];
            $data['vremePripreme'] = $_POST['vremePripreme'];
            $data['tip'] = $_POST['tip'];
    
            $update = $model->update('kolaci',$data);
    
            if($update){
                echo "<script>alert('record update successfully');</script>";
                echo "<script>window.location.href = 'recepti2.php';</script>";
            }else{
                echo "<script>alert('record update failed');</script>";
                echo "<script>window.location.href = 'recepti2.php';</script>";
            }
    
            }else{
            echo "<script>alert('empty');</script>";
            header("Location: edit.php?edit=$id");
            }
        }
      }

      ?>
       <div class="row justify-content-center">
            <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
            <label>Naziv</label>
            <input type="text" name="naziv" value="<?php echo $row['naziv']; ?>" class="form-control">
            </div>
            <div class="form-group">
            <label>Sastojci</label>
            <input type="text" name="sastojci" value="<?php echo $row['sastojci']; ?>" class="form-control">
            </div>
            <div class="form-group">
            <label>Vreme pripreme</label>
            <input type="text" name="vremePripreme" value="<?php echo $row['vremePripreme']; ?>" class="form-control">
            </div>
            <div class="form-group">
            <label>Tip</label>
            <!--<input type="text" name="tip" class="form-control"-->
                <!--value="--><!--" placeholder="Unesite tip">-->
            <select name="tip" id="tip">
            <?php
                $mysqli = new mysqli('localhost','root', '','slatkisi') or die(mysqli_error($mysqli));
                 $result = $mysqli->query("SELECT * FROM kategorija ") or die($mysqli->error);
                 
                while($row=$result->fetch_assoc()):
            ?>
                <option value="<?php echo $row['tipID'];?>"><?php echo $row['nazivKategorije'];?></option>
                <?php endwhile;?>        
            </select>
           
            </div>
            <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
<?php

    }

 ?>
 <?php
    if (isset($_GET['insert'])) {
        ?>
        <div class="row justify-content-center">
    
            <form action="" method="post">
            <div class="form-group">
            <label>Naziv</label>
            <input type="text" name="naziv"  class="form-control">
            </div>
            <div class="form-group">
            <label>Sastojci</label>
            <input type="text" name="sastojci"  class="form-control">
            </div>
            <div class="form-group">
            <label>Vreme pripreme</label>
            <input type="text" name="vremePripreme"  class="form-control">
            </div>
            <div class="form-group">
            <label>Tip</label>
            <!--<input type="text" name="tip" class="form-control"-->
                <!--value="--><!--" placeholder="Unesite tip">-->
            <select name="tip" id="tip">
            <?php
                $mysqli = new mysqli('localhost','root', '','slatkisi') or die(mysqli_error($mysqli));
                 $result = $mysqli->query("SELECT * FROM kategorija ") or die($mysqli->error);
                 
                while($row=$result->fetch_assoc()):
            ?>
                <option value="<?php echo $row['tipID'];?>"><?php echo $row['nazivKategorije'];?></option>
                <?php endwhile;?>        
            </select>
           
            </div>
            <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
<?php
    
 
    if (isset($_POST['submit'])) {
        if (isset($_POST['naziv']) && isset($_POST['sastojci']) && isset($_POST['vremePripreme']) && isset($_POST['tip'])) {
            if (!empty($_POST['naziv']) && !empty($_POST['sastojci']) && !empty($_POST['vremePripreme']) && !empty($_POST['tip']) ) {
                    
                $data['naziv'] = $_POST['naziv'];
                $data['sastojci'] = $_POST['sastojci'];
                $data['vremePripreme'] = $_POST['vremePripreme'];
                $data['tip'] = $_POST['tip'];

                $insert = $model->insert('kolaci',$data);
            }
        }
    }
    }
 ?>

    

 </body>
 </html>