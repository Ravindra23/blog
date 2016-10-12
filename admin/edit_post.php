<?php  include('includes/header.php'); ?>
<?php 
  $id = $_GET['id'];

  $db = new Database(); 

  $query = "SELECT * FROM posts WHERE id=".$id;

  $post = $db->select($query)->fetch_assoc();


  $query = "SELECT * FROM category";

  $category = $db->select($query);
  ?>
<?php

   if(isset($_POST['submit'])) {

      $title = mysqli_real_escape_string($db->link, $_POST['title']);
      $body = mysqli_real_escape_string($db->link, $_POST['body']);
      $category = mysqli_real_escape_string($db->link, $_POST['category']);
      $author = mysqli_real_escape_string($db->link, $_POST['author']);
      $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

      if($title == '' || $body == '' || $category == '' || $author == '' || $tags == '' ) {


      } else {

        $query = "UPDATE posts SET 
              title = '$title',
              body = '$body',
              category = '$category',
              author = '$author',
              tags = '$tags' WHERE id=".$id;

          $update_row = $db->update($query);
      }

  }

?>
<?php   
    if(isset($_POST['delete'])) {

      $query = "DELETE FROM posts WHERE id=".$id;

          $delete_row = $db->delete($query);
      
    }

?>
  <form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" value="<?php echo $post['title'] ?>" >
  </div>
  <div class="form-group">
    <label>Post Description</label>
    <textarea class="form-control" rows="3" name="body" ><?php echo $post['body'] ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
      <?php while($row = $category->fetch_assoc()) { ?>
        <?php if($row['id'] == $post['category']) { 
            $select = 'selected';  
          } else {
            $select = '';
          } ?> 

      <option <?php echo $select; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
      <?php } ?>
   </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" value="<?php echo $post['author'] ?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" value="<?php echo $post['tags'] ?>">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-info" value="Update" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>

</form>

<?php  include('includes/footer.php'); ?>
