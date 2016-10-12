<?php  include('includes/header.php'); ?>
<?php 
  $id = $_GET['id'];

  $db = new Database(); 

  $query = "SELECT * FROM category where id=".$id;

  $category = $db->select($query)->fetch_assoc();
  ?>

  <?php  

     if(isset($_POST['submit'])) {

      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      if($name == '') {


      } else {

        $query = "UPDATE category SET
                      name = '$name' WHERE id=".$id;

          $update_row = $db->update($query);
      }

  }

?>
 <?php  

     if(isset($_POST['delete'])) {

      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      if($name == '') {


      } else {

        $query = "DELETE FROM category WHERE id=".$id;

          $delete_row = $db->delete($query);
      }

  }

?>

  <form role="form" method="post" action="edit_category.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" value="<?php echo $category['name'] ?>">
  </div>
   <input name="submit" type="submit" class="btn btn-info" value="Update" />
  	<a href="index.php" class="btn btn-default">Cancel</a>
  	<input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>

</form>

<?php  include('includes/footer.php'); ?>
