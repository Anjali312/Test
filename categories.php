 <?php include "includes/admin_header.php"; ?>
    <div id="wrapper">


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                        <?php insert_categories(); ?>

                        <form action="" method="POST">
                          <div class="form-group">
                            <label for="cat-title">Add Category</label>
                           <input type="text" class ="form_control" name="cat_title">
                          </div>
                          <div class="form-group">
                           <input type="submit" name="submit" value="Add Category">
                          </div>
                        </form>
                       <?php
                         if(isset($_GET['update'])){
                            $cat_id = $_GET['update'];
                            include "includes/update_categories.php";
                         }

                      ?>
                        </div>  <!-- ADD CATEGORY FORM-->
                        
                        <div class="col-xs-6">

              
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </thead>
                                <tbody>

                            <?php

                              $query = "SELECT * FROM categories";
                              $select_categories = mysqli_query($connection,$query);

                               while($row = mysqli_fetch_assoc($select_categories)){
                               $cat_id = $row['cat_id'];
                               $cat_title = $row['cat_title'];
                                 
                               echo "<tr>";  
                               echo "<td>{$cat_id}</td>";
                               echo "<td>{$cat_title}</td>";
                               echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                               echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
                               echo "</tr>";
                         
                             }

                            ?>


                            <?php
                             if(isset($_GET['delete'])){
                               $the_cat_id = $_GET['delete'];
                               $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                               $delete_query = mysqli_query($connection,$query);
                               //header("location:categories.php");

                               }

                            ?>

                             </tbody>
                        </table>
                        </div>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> ngjjtjg
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php";?>