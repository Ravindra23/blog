<?php  include('includes/header.php'); ?>
<?php
	$id = $_GET['id'];
  $db = new Database(); 

  $query = "SELECT * FROM posts WHERE id=".$id;

  $post = $db->select($query)->fetch_assoc();


  $query = "SELECT * FROM category";

  $category = $db->select($query);
?>

 <div class="blog-post">
   <h2 class="blog-post-title"><?php echo $post['title'] ?></h2>
    <p class="blog-post-meta"><?php echo formatDate($post['date']) ?> by <a href="#"><?php echo $post['author'] ?></a></p>
   	<div style="text-align:justify"> <?php echo $post['body'] ?></div>
  </div><!-- /.blog-post -->
 <?php  include('includes/footer.php'); ?>
          
       
 