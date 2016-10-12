 </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <?php echo $site_description ?>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            
            <ol class="list-unstyled">
              <?php while($row= $category->fetch_assoc()) { ?>
              <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </a></li>
              <!-- <li><a href="#">Events</a></li>
              // <li><a href="#">Tutorials</a></li>
              // <li><a href="#">Misc</a></li> -->
               <?php } ?>
            </ol>
           
          </div>
         </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>phploversblog &copy; 2016</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
   </body>
</html>