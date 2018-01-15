<?php
require_once('config.php');
require_once('function.php');

/**
 * Created by PhpStorm.
 * User: Winklix
 * Date: 5/23/2017
 * Time: 3:01 PM
 */
 if(isset($_GET['subcat'])){
    $sql=$GFH_Admin->getCategorybymenu($_GET['subcat']);
    while($nl=mysqli_fetch_array($sql)){?>
        <option value="<?php echo $nl['id']?>"><?php echo $nl['category'];?></option>
    <?php  }
}?>