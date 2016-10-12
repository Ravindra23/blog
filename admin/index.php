<?php  include('includes/header.php'); ?>
<?php
  $db = new Database(); 

  $query = "SELECT * FROM posts";

  $posts = $db->select($query);


  $query = "SELECT * FROM category";

  $category = $db->select($query);
  ?>
<table class="table table-striped">
  <tr>
    <th>Post ID#</th>
    <th>Post Title</th>
    <th>Category</th>
    <th>Author</th>
    <th>Date</th>
    <th>Actions</th>
  </tr>
  <?php while($row = $posts->fetch_assoc()) { ?>   
  <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['title'] ?></td>
    <td><?php echo $row['category'] ?></td>
    <td><?php echo $row['author'] ?></td>
    <td><?php echo formatDate($row['date']) ?></td>
    <td><a href="edit_post.php?id=<?php echo $row['id'] ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
    </a>&nbsp;<a href="edit_post.php?id=<?php echo $row['id'] ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
  </tr>   
  <?php  } ?>
</table>
<table class="table table-striped">
  <tr>
    <th>Category ID#</th>
    <th>Category Name</th>
    <th>Actions</th>
  </tr>   
  <?php while($row = $category->fetch_assoc()) { ?>   
  <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['name'] ?></td>
     <td><a href="edit_category.php?id=<?php echo $row['id'] ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
      &nbsp;&nbsp;<a href="edit_category.php?id=<?php echo $row['id'] ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
  </tr>   
  <?php  } ?>   
</table>
<?php  include('includes/footer.php'); ?>
