<?php
require_once('includes/config.php');
require_once('includes/function.php');

/**
 * Created by PhpStorm.
 * User: Winklix
 * Date: 5/23/2017
 * Time: 3:01 PM
 */
 if(isset($_POST['category_id'])){
     $category_id=$_POST['category_id'];
    $sql=mysqli_query($GFH_Admin::$link,"SELECT * FROM `pro_subcategory` WHERE `fk_category_id`='$category_id'");
    while($nl=mysqli_fetch_array($sql)){?>
        <option value="<?php echo $nl['subcategory_id']?>"><?php echo $nl['subcategory_name'];?></option>
    <?php  }
}?>