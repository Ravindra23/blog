<?php  include('includes/header.php'); ?>
<?php
  $db = new Database(); 

  $query = "SELECT * FROM posts ORDER BY id DESC";

  $posts = $db->select($query);


  $query = "SELECT * FROM category";

  $category = $db->select($query);
?>

<?php
  if($posts) { ?>
  <?php while($row = $posts->fetch_assoc()) { ?>
 <div class="blog-post">
   <h2 class="blog-post-title"><?php echo $row['title'] ?></h2>
    <p class="blog-post-meta"><?php echo formatDate($row['date']) ?> by <a href="#"><?php echo $row['author'] ?></a><?php echo shortenText($row['body']) ?>
    <a class="readmore" href="post.php?id=<?php echo $row['id'] ?>">Read More</a>
  </div><!-- /.blog-post -->
  <?php } ?>
<?php } 
else { ?>
 <p>There is no post yet.</p>
 <?php } ?>
<?php  include('includes/footer.php'); ?>
          
       
