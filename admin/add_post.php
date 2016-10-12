<?php  include('includes/header.php'); ?>
<?php
  $db = new Database(); 

  if(isset($_POST['submit'])) {

      $title = mysqli_real_escape_string($db->link, $_POST['title']);
      $body = mysqli_real_escape_string($db->link, $_POST['body']);
      $category = mysqli_real_escape_string($db->link, $_POST['category']);
      $author = mysqli_real_escape_string($db->link, $_POST['author']);
      $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

      if($title == '' || $body == '' || $category == '' || $author == '' || $tags == '' ) {


      } else {

        $query = "INSERT INTO posts(title,body,category,author,tags) VALUES ('$title', '$body', '$category', '$author', '$tags')";

          $insert_row = $db->insert($query);
      }

  }

?>
  <?php
  $query = "SELECT * FROM posts";

  $posts = $db->select($query);


  $query = "SELECT * FROM category";

  $category = $db->select($query);
  ?>
  <form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Description</label>
    <textarea class="form-control" rows="3" name="body" placeholder="Enter Post Description"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
      <?php while($row = $category->fetch_assoc()) { ?>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author name">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tag names">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-info" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>

</form>

<?php  include('includes/footer.php'); ?>
