<?php  include('includes/header.php'); ?>
<?php
  $db = new Database(); 

  if(isset($_POST['submit'])) {

      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      if($name == '') {


      } else {

        $query = "INSERT INTO category(name) VALUES ('$name')";

          $insert_row = $db->insert($query);
      }

  }

?>
  <form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category Name">
  </div>
   <input name="submit" type="submit" class="btn btn-info" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>

</form>

<?php  include('includes/footer.php'); ?>
