﻿<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php"?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
//                For delete Category form Database
                    if (isset($_GET['delid'])){
                        $delid = $_GET['delid'];
                        $delete_query = "DELETE FROM category WHERE category_id= '$delid'";
                        $delete_data = $db->delete($delete_query);
                        if ($delete_data){
                            echo "<span style='color:green;font-size:18px;'>Category deleted successfully</span>";
                        }else{
                            echo "<span style='color:red;font-size:18px;'>Category not deleted</span>";
                        }
                    }


                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
//                        Show category list from Database
                        $query = "SELECT * FROM category ORDER BY category_id DESC ";
                        $category = $db->select($query);
                        if ($category){
                            $i = 0;
                            while ($result = $category->fetch_assoc()){
                                $i++;
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="edit_category.php?catid=<?php echo $result['category_id'];?>">Edit</a>
                                || <a onclick="return confirm('Are you sure to Delete?')" href="?delid=<?php echo $result['category_id'];?>">Delete</a></td>
						</tr>
                    <?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

            $(document).ready(function () {
                setupLeftMenu();

                $('.datatable').dataTable();
                setSidebarHeight();


            });
        </script>

<?php include "includes/footer.php";?>