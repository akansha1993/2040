<?php
require_once('config.php');
session_start();
class GFHAdmin extends GFHConfig
{
    public static $msg = "";
    public static $error = "";

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['logout'])) {
            session_destroy();
            header('location: index.php');
        }
        if (empty($_SESSION['user_active'])) {
            $_SESSION['user_active'] = uniqid();

        }
    }

    public function getsytem()
    {
        global $system_name, $system_url, $system_logo, $system_fb, $system_google, $system_twitter, $system_linkedin, $system_marchant, $system_sault, $system_email, $system_address, $system_phone, $system_map, $system_fb_widget;
        $sql = mysqli_query(GFHConfig::$link, "SELECT * FROM `system` limit 1");
        $na = mysqli_fetch_array($sql);
        $system_name = $na['system_name'];
        $system_logo = $na['logo'];
        $system_fb = $na['fb_link'];
        $system_google = $na['gplus_link'];
        $system_twitter = $na['twitter_link'];
        $system_linkedin = $na['linked_link'];
        $system_email = $na['email'];
        $system_address = $na['address'];
        $system_phone = $na['phone'];
        $system_map = $na['map_api'];
        $system_fb_widget = $na['fb_widget'];
        $system_url = $na['url'];
        $system_marchant = $na['marchant_key'];
        $system_sault = $na['sault'];
    }

    public function client_signup($user_id = "")
    {
        $fullname = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['fullname']));
        $email = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['res_password']));
        $phone = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['phone']));
        $password = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['res_password']));
        //update user
        if (!empty($user_id)) {
            $sql = mysqli_query(GFHConfig::$link, "UPDATE `tbl_client` SET `name`='$fullname',
`email`='$email',`phone`='$phone',`password`='$password' WHERE `client_id`='$user_id'");
            if ($sql) {
                echo "<script>window.location='dashboard.php?msg=Updated Successfully';</script>";
            } else {
                echo "<script>window.location='dashboard.php?error=Error While Updatedation';</script>";
            }
        } //new user registration
        else {
            $sql = mysqli_query(GFHConfig::$link, "SELECT * FROM `tbl_client` WHERE `email`='$email'");
            if (mysqli_num_rows($sql) > 0) {
                echo "<script>window.location='signup.php?error=User already exist';</script>";
            } else {
                $sql = mysqli_query(GFHConfig::$link, " INSERT INTO `tbl_client`(`name`, `email`, `phone`, `password`,`status`) 
 VALUES ('$fullname','$email','$phone','$password','1')");
                if ($sql) {


                    $to = $email . ',' . 'info@fabianoappliances.com';
                    $subject = 'Fabiano Login Details';
                    $header = "Fabiano : Signup Confirmation from Fabianoappliances";
                    $message = "Hi" . $fullname . ", <br> ";
                    $message .= "You have successfully Registered !!!";

                    $sentmail = mail($to, $subject, $message, $header);
                    if (isset($sentmail)) {

                        echo "<script>window.location='login.php?msg=Ragistered Successfully';</script>";
                    }
                } else {
                    echo "<script>window.location='signup.php?msg=Error While Ragistration';</script>";
                }
            }
        }
    }
 
  
    public function client_login()
    {
        if (isset($_POST['email'])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {

                $emailid = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['email']));
                $password = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['password']));
                $query = mysqli_query(GFHConfig::$link, "SELECT `client_id`, `name`, `email`, `phone`, `password` FROM `tbl_client` WHERE `email`='$emailid' and `password`='$password'");
                if (!$query) {
                    printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                    exit();
                }
                $arr = mysqli_fetch_array($query);
                if ($emailid == $arr['email'] && $password == $arr['password']) {
                    $ip = $_SESSION['user_active'];
                    $user_id = $arr['client_id'];
                    $_SESSION['client_id'] = $arr['client_id'];
                    $_SESSION['client_email'] = $arr['email'];
                    $_SESSION['client_name'] = $arr['name'];
                    $this->update_cart();
                } else {
                    echo "<script>alert('Username & Password is invalid');</script>";
                }

            } else {
                echo "<script>alert('Username & Password is invalid');</script>";
            }


        }
    }

    public function update_cart(){

        if(!empty($_SESSION['cart_item'])){

            foreach ($_SESSION["cart_item"] as $k => $va )
            {

                $product_id=$va['product_id'];
                $quantity=$va['quantity'];
                $price=$va['price'];
                $client_id=$_SESSION['client_id'];
                 mysqli_query(GFHConfig::$link,"INSERT INTO `temp_cart` SET `product_id`='$product_id',`quantity`='$quantity',`price`='$price',`user_id`='$client_id'");
            }
             echo "<script>window.location='checkout.php';</script>";
        }else{
            echo "<script>window.location='dashboard.php';</script>";
        }
    }

    public function api_addtocart($productid, $quantity, $price, $size, $session) {
        mysqli_query(GFHConfig::$link,
        "INSERT INTO `temp_cart` (`product_id`, `quantity`, `price`, `size`, `session`)
        VALUES ('" .$productid. "', '" .$quantity. "', '" .$price. "', '" .$size. "', '" .$session. "')");
    }
public function api_getcart($session) {
    $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `temp_cart` where `session` = '" .$session. "'");
    return mysqli_fetch_all($sql,MYSQLI_ASSOC);
}
public function page_by_name($value='')
{
   $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `pages` WHERE `page_name`='$value'");
return mysqli_fetch_array($sql);
         
}

public function PagesByID($value='')
{
     $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `pages` WHERE `page_id`='$value'");
return mysqli_fetch_array($sql);
}

public function Pages($value='')
{
   if(isset($_POST['page_name'])){
    if(!empty($value)){
        $update=mysqli_query(GFHConfig::$link,"UPDATE `pages` SET `title`='".$_POST['title']."',`description`='".$_POST['description']."',`page_name`='".$_POST['page_name']."' WHERE `page_id`='$value'");
          if($update){
           echo "<script>window.location='manage-pages.php?msg=Successfully updated';</script>";
          }else{
           echo "<script>window.location='manage-pages.php?msg=Not updated';</script>";
          }
    }else{
        $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `pages` WHERE `page_name`='".$_POST['page_name']."'");
        if(mysqli_num_rows($sql)>0){
            echo "<script>alert('page already exist');</script>";
        }else{
          $sql=mysqli_query(GFHConfig::$link,"INSERT INTO `pages` SET `title`='".$_POST['title']."',`description`='".$_POST['description']."',`page_name`='".$_POST['page_name']."'");
          if($sql){
           echo "<script>window.location='manage-pages.php?msg=Successfully Added ';</script>";
          }else{
            echo "<script>window.location='manage-pages.php?msg=Not Inserted';</script>";
          }

        }
    }

   }else{
    $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `pages`");
    return $sql;
   }
}
public function deletepage($value='')
{
   $sql=mysqli_query(GFHConfig::$link,"DELETE FROM `pages` WHERE `page_id`='$value'");
   if($sql){
    echo "<script>alert('Successfully Deleted');</script>";
   }
}

public function FaqbyId($value='')
{
     $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `faq` WHERE `id`='$value'");
return mysqli_fetch_array($sql);
}

public function Faq($value=''){
   if(isset($_POST['question'])){
    if(!empty($value)){
        $update=mysqli_query(GFHConfig::$link,"UPDATE `faq`SET `question`='".$_POST['question']."',`ans`='".$_POST['ans']."' WHERE `id`='$value'");
          if($update){
           echo "<script>window.location='manage-faq.php?msg=Successfully updated';</script>";
          }else{
           echo "<script>window.location='manage-faq.php?msg=Not updated';</script>";
          }
    }else{
        $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `faq` WHERE `question`='".$_POST['question']."'");
        if(mysqli_num_rows($sql)>0){
            echo "<script>alert('Faq already exist');</script>";
        }else{
          $sql=mysqli_query(GFHConfig::$link,"INSERT INTO `faq` SET `question`='".$_POST['question']."',`ans`='".$_POST['ans']."'");
          if($sql){
           echo "<script>window.location='manage-faq.php?msg=Successfully Added ';</script>";
          }else{
            echo "<script>window.location='manage-faq.php?msg=Not Inserted';</script>";
          }

        }
    }

   }else{
    $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `faq`");
    return $sql;
   }
}
public function deletefaq($value='')
{
   $sql=mysqli_query(GFHConfig::$link,"DELETE FROM `faq` WHERE `id`='$value'");
   if($sql){
    echo "<script>alert('Successfully Deleted');</script>";
   }
}





    public function update_sytem()
    {
        $system_name = $_POST['name'];
        $marchant_key = $_POST['marchant_key'];
        $sault = $_POST['sault'];
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        $ip = isset($_POST['ip']) ? $_POST['ip'] : '';
        $address = $_POST['address'];
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $map_api = $_POST['map_api'];
        $fb_link = $_POST['fb_link'];
        $gplus_link = $_POST['gplus_link'];
        $twitter_link = $_POST['twitter_link'];
        $pritrest_link = isset($_POST['pritrest_link']) ? $_POST['pritrest_link'] : '';
        $linked_link = $_POST['linked_link'];
        $email = $_POST['email'];
        $fb_widget = $_POST['fb_widget'];
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if ($_FILES['image']['name'] != "") {
            if (in_array($extension, $allowedExts)) {
                $date = new DateTime();
                $timestamp = $date->format('U');
                $img = $timestamp . "." . $extension;
                $result = mysqli_query(GFHConfig::$link, "UPDATE `system` SET `marchant_key`='$marchant_key',`sault`='$sault',`system_name`='$system_name',`logo`='$img',`url`='$url',`ip`='$ip',
`address`='$address',`phone`='$phone',`map_api`='$map_api',`fb_link`='$fb_link',`gplus_link`='$gplus_link',
`twitter_link`='$twitter_link',`pritrest_link`='$pritrest_link',`linked_link`='$linked_link',`email`='$email',`fb_widget`='$fb_widget'");
                if ($result) {
                    echo "<script>window.location='manage-system.php?msg=Updated successfully';</script>";
                } else {
                    echo "<script>window.location='manage-system.php?msg=Not Updated';</script>";
                }
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/system/" . $img);
            }
        } else {
            $result = mysqli_query(GFHConfig::$link, "UPDATE `system` SET `marchant_key`='$marchant_key',`sault`='$sault',`system_name`='$system_name',`url`='$url',`ip`='$ip',
`address`='$address',`phone`='$phone',`map_api`='$map_api',`fb_link`='$fb_link',`gplus_link`='$gplus_link',
`twitter_link`='$twitter_link',`pritrest_link`='$pritrest_link',`linked_link`='$linked_link',`email`='$email',`fb_widget`='$fb_widget'");
            if ($result) {
                echo "<script>window.location='manage-system.php?msg=Updated successfully';</script>";
            } else {
                echo "<script>window.location='manage-system.php?msg=Not Updated';</script>";
            }
        }
    }

    public function login()
    {

        if (isset($_POST['username'])) {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {

                $emailid = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['username']));
                $password = mysqli_real_escape_string(GFHConfig::$link, trim($_POST['password']));
                $query = mysqli_query(GFHConfig::$link, "SELECT `user_id`, `fullname`, `email`,`password` FROM `admin` WHERE `email`='$emailid' and `password`='$password'");
                if (!$query) {
                    printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                    exit();
                }
                $arr = mysqli_fetch_array($query);
                if ($emailid == $arr['email'] && $password == $arr['password']) {

                    $_SESSION['ADMINID'] = $arr['user_id'];
                    $_SESSION['EMAIL'] = $arr['email'];
                    $_SESSION['FULLNAME'] = $arr['email'];


                    // $_SESSION['FIRSTNAME']=$arr['first_name'];
                    // $_SESSION['LASTNAME']=$arr['last_name'];
                    echo "<script>window.location='home.php?con=dashboard';</script>";

                } else {
                    echo "<script>alert('Username & Password is invalid');</script>";
                }

            } else {
                echo "<script>alert('Username & Password is invalid');</script>";
            }


        }
    }

    public function logout()
    {

        unset($_SESSION['ID']);
        session_destroy();
        header("location:index.php");
    }

    public function getAdmin()
    {
        $sql = "select * from admin ";
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function update_admin()
    {
        if (isset($_POST) && (count($_POST) > 0)) {

            $admin_id = isset($_POST['admin_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['admin_id']) : '';
            $username = isset($_POST['username']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['username']) : '';
            $email = isset($_POST['email']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['email']) : '';

            $password = isset($_POST['password']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['password']) : '';


            $sql = "UPDATE admin SET fullname = '$username',email='$email',password='$password',status=1";
            $sql .= "  where id=" . $admin_id;
            $result = mysqli_query(GFHConfig::$link, $sql);
            if ($result) {
                header('location:admin.php?msg=update sucessfully');
            }

        }
    }

    public function getUsers($id = "")
    {
        $user_id = isset($id) ? $id : '';
        $sql = "select * from admin";
        if (!empty($user_id)) {
            $sql .= " where id=" . $user_id;
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function getbrand($catid = "")
    {
        $sql = "select * from `pro_brand`";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where `brand_id`='$catid'";
        } else {
            $sql .= " where `status`='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function brand($cat_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $status = $_POST['status'];
            if (!empty($cat_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getCategory($cat_id));
                        unlink("../images/brand/" . $na['image']);

                        $sql = "UPDATE `pro_brand` SET `brand_name`='$name',`image`='$img',`status`='$status' WHERE `brand_id`='$cat_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-brand.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-brand.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/brand/" . $img);
                    }
                } else {
                    $sql = "UPDATE `pro_brand` SET `brand_name`='$name',`status`='$status'  WHERE `brand_id`='$cat_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-brand.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-brand.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from pro_brand where brand_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-brand.php?error=Category name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `pro_brand`(`brand_name`,`status`, `image`) VALUES('$name','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/brand/" . $img);
                            if ($result) {
                                echo "<script>window.location='manage-brand.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='manage-brand.php?msg=Not Updated';</script>";

                            }
                        }

                    }

                }
            }
        }
    }

    public function deletebrand($menuid = "")
    {
        $na = mysqli_fetch_array(GFHConfig::$this->getCategory($menuid));
        unlink("../images/barnd/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `pro_brand` WHERE `brand_id`='$menuid'");
        if ($sql) {
            echo "<script>window.location='manage-brand.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-brand.php?msg=Error While Deleting';</script>";

        }
    }

    //end brand


    public function getCategoryby_name($name)
    {
        $sql = "select * from pro_category WHERE category_name='$name'";

        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getmenu($catid = "")
    {
        $sql = "select * from main_menu ";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where menu_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function menu($cat_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $category = isset($_POST['category_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['category_id']) : '';
            $status = $_POST['status'];
            if (!empty($cat_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array(GFHConfig::$this->getCategory($cat_id));
                        unlink("../images/menu/" . $na['image']);

                        $sql = "UPDATE `main_menu` SET `menu_name`='$name',`category_id`='$category',`image`='$img',`status`='$status' WHERE `menu_id`='$cat_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-menu.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-menu.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/category/" . $img);
                    }
                } else {
                    $sql = "UPDATE `main_menu` SET `menu_name`='$name',`category_id`='$category',`status`='$status' WHERE `menu_id`='$cat_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-menu.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-menu.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from main_menu where menu_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-menu.php?error=Menu name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `main_menu`(`category_id`,`menu_name`,`status`, `image`) VALUES('$category','$name','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/menu/" . $img);
                            if ($result) {
                                echo "<script>window.location='manage-menu.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='manage-menu.php?msg=Not Updated';</script>";

                            }
                        }

                    } else {
                        $sql = "INSERT INTO `main_menu`(`category_id`,`menu_name`,`status`) VALUES('$category','$name','$status')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        if ($result) {
                            echo "<script>window.location='manage-menu.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-menu.php?msg=Not Updated';</script>";

                        }
                    }

                }
            }
        }
    }

    public function deletemenu($menuid)
    {
        $na = mysqli_fetch_array($this->getmenu($menuid));

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `main_menu` WHERE `menu_id`='$menuid'");
        if ($sql) {
            echo "<script>window.location='category.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='category.php?msg=Error While Deleting';</script>";

        }
    }

    public function getCategory($catid = "")
    {
        $sql = "select * from pro_category ";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where category_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function category($cat_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $menu = isset($_POST['menu']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['menu']) : '';
            $status = $_POST['status'];
            if (!empty($cat_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array(GFHConfig::$this->getCategory($cat_id));
                        unlink("../images/category/" . $na['image']);

                        $sql = "UPDATE `pro_category` SET `category_name`='$name',`image`='$img',`status`='$status' WHERE `category_id`='$cat_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='category.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='category.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/category/" . $img);
                    }
                } else {
                    $sql = "UPDATE `pro_category` SET `category_name`='$name',`status`='$status' WHERE `category_id`='$cat_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='category.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='category.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from pro_category where category_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='category.php?error=Category name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `pro_category`(`category_name`,`status`, `image`) VALUES('$name','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/category/" . $img);
                            if ($result) {
                                echo "<script>window.location='category.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='category.php?msg=Not Updated';</script>";

                            }
                        }

                    } else {
                        $sql = "INSERT INTO `pro_category`(`category_name`,`status`) VALUES('$name','$status')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        if ($result) {
                            echo "<script>window.location='category.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='category.php?msg=Not Updated';</script>";

                        }
                    }

                }
            }
        }
    }
    public function getServiceCategory($catid = "")
    {
        $sql = "select * from service_category ";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where service_cat_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function servicecategory($cat_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $menu = isset($_POST['menu']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['menu']) : '';
            $status = $_POST['status'];
            if (!empty($cat_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;   
                        $na = mysqli_fetch_array(GFHConfig::$this->getServiceCategory($cat_id));
                        unlink("../images/servicecategory/" . $na['image']);

                        $sql = "UPDATE `service_category` SET `service_cat_name`='$name',`image`='$img',`status`='$status' WHERE `service_cat_id`='$cat_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='service_category.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='service_category.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/servicecategory/" . $img);
                    }
                } else {
                    $sql = "UPDATE `service_category` SET `service_cat_name`='$name',`status`='$status' WHERE `service_cat_id`='$cat_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='service_category.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='service_category.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from service_category where service_cat_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='service_category.php?error=Category name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `service_category`(`service_cat_name`,`status`, `image`) VALUES('$name','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/servicecategory/" . $img);
                            if ($result) {
                                echo "<script>window.location='service_category.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='service_category.php?msg=Not Updated';</script>";

                            }
                        }

                    } else {
                        $sql = "INSERT INTO `service_category`(`service_cat_name`,`status`) VALUES('$name','$status')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        if ($result) {
                            echo "<script>window.location='service_category.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='service_category.php?msg=Not Updated';</script>";

                        }
                    }

                }
            }
        }
    }
    public function deletecategory($menuid)
    {
        $na = mysqli_fetch_array($this->getCategory($menuid));

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `pro_category` WHERE `category_id`='$menuid'");
        if ($sql) {
            echo "<script>window.location='category.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='category.php?msg=Error While Deleting';</script>";

        }
    }
    public function deleteservicecategory($menuid)
    {
        $na = mysqli_fetch_array($this->getServiceCategory($menuid));

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `service_category` WHERE `service_cat_id`='$menuid'");
        if ($sql) {
            echo "<script>window.location='service_category.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='service_category.php?msg=Error While Deleting';</script>";

        }
    }

    public function getsubCategory($catid = "")
    {
        $sql = "SELECT * FROM `pro_subcategory`";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where subcategory_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function getservicesubCategory($catid = "")
    {
        $sql = "SELECT * FROM `service_subcategory`";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where subcategory_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getsubCategory_by_category($catid = "")
    {
        $sql = "SELECT * FROM `pro_subcategory`";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where fk_category_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getservicesubCategory_by_servicecategory($catid = "")
    {
        $sql = "SELECT * FROM `service_subcategory`";
        if (isset($catid) && !empty($catid)) {
            $sql .= " where fk_category_id='$catid'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function subCategory($cat_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $status = $_POST['status'];
            $category_id = isset($_POST['category_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['category_id']) : '';
            if (!empty($cat_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getsubCategory($cat_id));
                        unlink("../images/category/" . $na['image']);

                        $sql = "UPDATE `pro_subcategory` SET `fk_category_id`='$category_id', `subcategory_name`='$name',`image`='$img',`status`='$status' WHERE `subcategory_id`='$cat_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-subcategory.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-subcategory.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/category/" . $img);
                    }
                } else {
                    $sql = "UPDATE `pro_subcategory` SET `fk_category_id`='$category_id', `subcategory_name`='$name',`status`='$status' WHERE `subcategory_id`='$cat_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-subcategory.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-subcategory.php?msg=Not Updated';</script>";
                    }
                }

            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from pro_subcategory where subcategory_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-subcategory.php?error=Category name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `pro_subcategory`(`fk_category_id`,`subcategory_name`,`status`, `image`) VALUES('$category_id','$name','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/category/" . $img);
                            if ($result) {
                                echo "<script>window.location='manage-subcategory.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='manage-subcategory.php?msg=Not Updated';</script>";

                            }
                        }

                    } else {
                        
                        $sql = "INSERT INTO `pro_subcategory`(`fk_category_id`,`subcategory_name`,`status`) VALUES('$category_id','$name','$status')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        if ($result) {
                            echo "<script>window.location='manage-subcategory.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-subcategory.php?msg=Not Updated';</script>";

                        }
                    }

                }
            }
        }
    }
    public function serviceSubCategory($cat_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $status = $_POST['status'];
            $service_cat_id = isset($_POST['service_cat_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['service_cat_id']) : '';
            if (!empty($cat_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getservicesubCategory($cat_id));
                        unlink("../images/servicecategory/" . $na['image']);

                        $sql = "UPDATE `service_subcategory` SET `fk_category_id`='$service_cat_id', `subcategory_name`='$name',`image`='$img',`status`='$status' WHERE `subcategory_id`='$cat_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-servicesubcategory.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-servicesubcategory.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/servicecategory/" . $img);
                    }
                } else {
                    $sql = "UPDATE `service_subcategory` SET `fk_category_id`='$service_cat_id', `subcategory_name`='$name',`status`='$status' WHERE `subcategory_id`='$cat_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-servicesubcategory.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-servicesubcategory.php?msg=Not Updated';</script>";
                    }
                }

            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from service_subcategory where subcategory_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-servicesubcategory.php?error=Category name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `service_subcategory`(`fk_category_id`,`subcategory_name`,`status`, `image`) VALUES('$service_cat_id','$name','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/servicecategory/" . $img);
                            if ($result) {
                                echo "<script>window.location='manage-servicesubcategory.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='manage-servicesubcategory.php?msg=Not Updated';</script>";

                            }
                        }

                    } else {
                        
                        $sql = "INSERT INTO `service_subcategory`(`fk_category_id`,`subcategory_name`,`status`) VALUES('$service_cat_id','$name','$status')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        if ($result) {
                            echo "<script>window.location='manage-servicesubcategory.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-servicesubcategory.php?msg=Not Updated';</script>";

                        }
                    }

                }
            }
        }
    }

    public function deletesubCategory($menuid = "")
    {
        $na = mysqli_fetch_array($this->getsubCategory($menuid));
        unlink("../images/category/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `pro_subcategory` WHERE `subcategory_id`='$menuid'");
        if ($sql) {
            echo "<script>window.location='manage-subcategory.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-subcategory.php?msg=Error While Deleting';</script>";

        }
    }
    
    public function deleteservicesubCategory($menuid = "")
    {
        $na = mysqli_fetch_array($this->getservicesubCategory($menuid));
        unlink("../images/servicecategory/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `service_subcategory` WHERE `subcategory_id`='$menuid'");
        if ($sql) {
            echo "<script>window.location='manage-servicesubcategory.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-servicesubcategory.php?msg=Error While Deleting';</script>";

        }
    }
    public function getcategory_by_menu($menu_id)
    {
  return mysqli_query(GFHConfig::$link,"SELECT * FROM `pro_category` WHERE `menu_id`='$menu_id'");
    }
    public function getbanner($banner_id = "")
    {
        $sql = "select * from main_banner ";
        if (isset($banner_id) && !empty($banner_id)) {
            $sql .= " where banner_id='$banner_id'";
        } else {
            $sql .= "where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    //row 1
    public function getrow1($row1_id = "")
    {
        $sql = "select * from row1 ";
        if (isset($row1_id) && !empty($row1_id)) {
            $sql .= " where row1_id='$row1_id'";
        } else {
            $sql .= "where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function getrow2($row2_id = "")
    {
        $sql = "select * from row2 ";
        if (isset($row2_id) && !empty($row2_id)) {
            $sql .= " where row2_id='$row2_id'";
        } else {
            $sql .= "where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    //service
    public function getservice($service_id = "")
    {
        $sql = "select * from service ";
        if (isset($service_id) && !empty($service_id)) {
            $sql .= " where service_id='$service_id'";
        } else {
            $sql .= "where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function getsideimage($side_id = "")
    {
        $sql = "select * from sideimage ";
        if (isset($side_id) && !empty($side_id)) {
            $sql .= " where side_id='$side_id'";
        } else {
            $sql .= "where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function banner($banner_id = '')
    {
        if (!empty($_POST['status'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $caption = isset($_POST['caption']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['caption']) : '';
            $expiry = $_POST['expiry'];
            $url = isset($_POST['url']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['url']) : '';
            $status = $_POST['status'];
            if (!empty($banner_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getbanner($banner_id));
                        unlink("../images/banner/" . $na['image']);


                        $sql = "UPDATE `main_banner` SET `headline`='$name', `caption`='$caption',`url`='$url', `expiry`='$expiry', `image`='$img',`status`='$status' WHERE `banner_id`='$banner_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-banner.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-banner.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/banner/" . $img);
                    }
                } else {
                    $sql = "UPDATE `main_banner` SET `headline`='$name', `caption`='$caption',`url`='$url', `expiry`='$expiry', `status`='$status' WHERE `banner_id`='$banner_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-banner.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-banner.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $sql = "INSERT INTO `main_banner`(`headline`, `caption`, `url`, `expiry`,`status`,`image`) VALUES('$name','$caption','$url','$expiry','$status','$img')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/banner/" . $img);
                        if ($result) {
                            echo "<script>window.location='manage-banner.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-banner.php?msg=Not Updated';</script>";

                        }
                    }


                }
            }
        }
    }
//row1
    public function row1($row1_id = '')
    {
        if (!empty($_POST['status'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $description = isset($_POST['description']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['description']) : '';
            $price = isset($_POST['price']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['price']) : '';
            $url = isset($_POST['url']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['url']) : '';
            $status = $_POST['status'];
            if (!empty($row1_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getrow1($row1_id));
                        unlink("../images/row1/" . $na['image']);


                        $sql = "UPDATE `row1` SET `headline`='$name', `description`='$description',`url`='$url', `price`='$price', `image`='$img',`status`='$status' WHERE `row1_id`='$row1_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-row1.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-row1.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/row1/" . $img);
                    }
                } else {
                    $sql = "UPDATE `row1` SET `headline`='$name', `description`='$description',`url`='$url', `price`='$price', `status`='$status' WHERE `row1_id`='$row1_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-row1.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-row1.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $sql = "INSERT INTO `row1`(`headline`, `description`, `url`, `price`,`status`,`image`) VALUES('$name','$description','$url','$price','$status','$img')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/row1/" . $img);
                        if ($result) {
                            echo "<script>window.location='manage-row1.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-row1.php?msg=Not Updated';</script>";

                        }
                    }


                }
            }
        }
    }
    //row2
    public function row2($row2_id = '')
    {
        if (!empty($_POST['status'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $description = isset($_POST['description']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['description']) : '';
            $price = isset($_POST['price']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['price']) : '';
            $url = isset($_POST['url']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['url']) : '';
            $status = $_POST['status'];
            if (!empty($row2_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getrow1($row1_id));
                        unlink("../images/row2/" . $na['image']);


                        $sql = "UPDATE `row2` SET `headline`='$name', `description`='$description',`url`='$url', `price`='$price', `image`='$img',`status`='$status' WHERE `row2_id`='$row2_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-row2.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-row2.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/row2/" . $img);
                    }
                } else {
                    $sql = "UPDATE `row2` SET `headline`='$name', `description`='$description',`url`='$url', `price`='$price', `status`='$status' WHERE `row2_id`='$row2_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-row2.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-row2.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $sql = "INSERT INTO `row2`(`headline`, `description`, `url`, `price`,`status`,`image`) VALUES('$name','$description','$url','$price','$status','$img')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/row2/" . $img);
                        if ($result) {
                            echo "<script>window.location='manage-row2.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-row2.php?msg=Not Updated';</script>";

                        }
                    }


                }
            }
        }
    }
    public function deleterow1($row1_id = '')
    {
        $sql1 = $this->getrow1($row1_id);
        $na = mysqli_fetch_array($sql1);
        unlink("../images/row1/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `row1` WHERE `row1_id`='$row1_id'");
        if ($sql) {
            echo "<script>window.location='manage-row1.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-row1.php?msg=Error While Deleting';</script>";

        }
    }
    public function deleterow2($row2_id = '')
    {
        $sql1 = $this->getrow2($row2_id);
        $na = mysqli_fetch_array($sql1);
        unlink("../images/row2/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `row2` WHERE `row2_id`='$row2_id'");
        if ($sql) {
            echo "<script>window.location='manage-row2.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-row2.php?msg=Error While Deleting';</script>";

        }
    }
    public function deletebanner($banner_id = '')
    {
        $sql1 = $this->getbanner($banner_id);
        $na = mysqli_fetch_array($sql1);
        unlink("../images/banner/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `main_banner` WHERE `banner_id`='$banner_id'");
        if ($sql) {
            echo "<script>window.location='manage-banner.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-banner.php?msg=Error While Deleting';</script>";

        }
    }
     public function deleteservice($service_id = '')
    {
        $sql1 = $this->getservice($service_id);
        $na = mysqli_fetch_array($sql1);
        unlink("../images/service/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `service` WHERE `service_id`='$service_id'");
        if ($sql) {
            echo "<script>window.location='manage-services.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-services.php?msg=Error While Deleting';</script>";

        }
    }
    public function deletesideimage($side_id = '')
    {
        $sql1 = $this->getsideimage($side_id);
        $na = mysqli_fetch_array($sql1);
        unlink("../images/sideimage/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `sideimage` WHERE `side_id`='$side_id'");
        if ($sql) {
            echo "<script>window.location='manage-side-image.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-side-image.php?msg=Error While Deleting';</script>";

        }
    }
//service
    public function service($service_id = '')
    {
        if (!empty($_POST['status'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $caption = isset($_POST['caption']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['caption']) : '';
            $status = $_POST['status'];
            if (!empty($service_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getservice($service_id));
                        unlink("../images/service/" . $na['image']);


                        $sql = "UPDATE `service` SET `headline`='$name', `caption`='$caption', `image`='$img',`status`='$status' WHERE `service_id`='$service_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-services.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-services.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/service/" . $img);
                    }
                } else {
                    $sql = "UPDATE `service` SET `headline`='$name', `caption`='$caption', `status`='$status' WHERE `service_id`='$service_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-services.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-services.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $sql = "INSERT INTO `service`(`headline`, `caption`,`status`,`image`) VALUES('$name','$caption','$status','$img')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/service/" . $img);
                        if ($result) {
                            echo "<script>window.location='manage-services.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-services.php?msg=Not Updated';</script>";

                        }
                    }


                }
            }
        }
    }
    public function sideimage($side_id = '')
    {
        if (!empty($_POST['status'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            //$caption = isset($_POST['caption']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['caption']) : '';
            $status = $_POST['status'];
            if (!empty($side_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getsideimage($side_id));
                        unlink("../images/sideimage/" . $na['image']);


                        $sql = "UPDATE `sideimage` SET `headline`='$name', `image`='$img',`status`='$status' WHERE `side_id`='$side_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-side-image.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-side-image.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/sideimage/" . $img);
                    }
                } else {
                    $sql = "UPDATE `sideimage` SET `headline`='$name',`status`='$status' WHERE `side_id`='$side_id'";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if ($result) {
                        echo "<script>window.location='manage-side-image.php?msg=Updated successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-side-image.php?msg=Not Updated';</script>";
                    }
                }
            } else {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $sql = "INSERT INTO `sideimage`(`headline`,`status`,`image`) VALUES('$name','$status','$img')";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                            exit();
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/sideimage/" . $img);
                        if ($result) {
                            echo "<script>window.location='manage-side-image.php?msg=Added successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-side-image.php?msg=Not Updated';</script>";

                        }
                    }


                }
            }
        }
    }
    public function getofferbanner($banner_id = "")
    {
        $sql = "select * from offers_banner ";
        if (isset($banner_id) && !empty($banner_id)) {
            $sql .= " where banner_id='$banner_id'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function get_order($ordar_id = "")
    {
        $sql = "select * from product_order ";
        if (isset($ordar_id) && !empty($ordar_id)) {
            $sql .= " where order_no='$ordar_id'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
public function getproduct_bynamecate($name){
    $sql = "SELECT * FROM `product` WHERE `prod_name` LIKE '$name%'";

        if(!empty($category)) {
       $sql.=" AND `category_id`='$category'";
        }

    return mysqli_query(GFHConfig::$link, $sql);
}
    public function get_orderby_user($user_id)
    {
        $sql = "SELECT * FROM `product_order` WHERE `user_id`='$user_id'";

        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function offerbanner($banner_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $caption = isset($_POST['caption']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['caption']) : '';
            $expiry = $_POST['expiry'];
            $url = isset($_POST['url']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['url']) : '';
            $status = $_POST['status'];
            if (!empty($banner_id)) {
                $allowedExts = array("jpg", "jpeg", "gif", "png");
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if ($_FILES['image']['name'] != "") {
                    if (in_array($extension, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $img = $timestamp . "." . $extension;
                        $na = mysqli_fetch_array($this->getbanner($banner_id));
                        unlink("../images/offer-banner/" . $na['image']);


                        $sql = "UPDATE `offers_banner` SET `headline`='$name', `caption`='$caption',`url`='$url', `expiry`='$expiry', `image`='$img',`status`='$status' WHERE `banner_id`='$banner_id'";
                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if ($result) {
                            echo "<script>window.location='manage-banner.php?msg=Updated successfully';</script>";
                        } else {
                            echo "<script>window.location='manage-banner.php?msg=Not Updated';</script>";
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], "../images/offer-banner/" . $img);
                    }
                }
                $sql = "UPDATE `offers_banner` SET `headline`='$name', `caption`='$caption',`url`='$url', `expiry`='$expiry',`status`='$status' WHERE `banner_id`='$banner_id'";
                $result = mysqli_query(GFHConfig::$link, $sql);
                if ($result) {
                    echo "<script>window.location='manage-banner.php?msg=Updated successfully';</script>";
                } else {
                    echo "<script>window.location='manage-banner.php?msg=Not Updated';</script>";
                }

            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from main_banner where headline='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-offerbanner.php?error=banner name already exist';</script>";
                } else {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $img = $timestamp . "." . $extension;
                            $sql = "INSERT INTO `offers_banner`(`headline`, `caption`, `url`, `expiry`,`status`,`image`) VALUES('$name','$caption','$url','$expiry','$status','$img')";
                            $result = mysqli_query(GFHConfig::$link, $sql);
                            if (!$result) {
                                printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                                exit();
                            }
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/offer-banner/" . $img);
                            if ($result) {
                                echo "<script>window.location='manage-offerbanner.php?msg=Added successfully';</script>";
                            } else {
                                echo "<script>window.location='manage-offerbanner.php?msg=Not Updated';</script>";

                            }
                        }

                    }

                }
            }
        }
    }

    public function deleteofferbanner($banner_id = '')
    {
        $sql1 = $this->getbanner($banner_id);
        $na = mysqli_fetch_array($sql1);
        unlink("../images/offer-banner/" . $na['image']);

        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `offers_banner` WHERE `banner_id`='$banner_id'");
        if ($sql) {
            echo "<script>window.location='manage-offerbanner.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-offerbanner.php?msg=Error While Deleting';</script>";

        }
    }

    public function getdiscount($discount = "")
    {
        $sql = "select * from discount ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where discount_id='$discount'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function discount($discount_id = '')
    {
        if (!empty($_POST['discount_title'])) {

            $discount_title = isset($_POST['discount_title']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['discount_title']) : '';
            $discount_note = isset($_POST['discount_note']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['discount_note']) : '';
            $expiry = $_POST['expiry'];
            $discount_value = isset($_POST['discount_value']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['discount_value']) : '';
            $status = $_POST['status'];
            if (!empty($discount_id)) {

                $sql = "UPDATE `discount` SET `discount_title`='$discount_title', `discount_note`='$discount_note',`discount_value`='$discount_value', `expiry`='$expiry',`status`='$status' WHERE `discount_id`='$discount_id'";
                $result = mysqli_query(GFHConfig::$link, $sql);
                if ($result) {
                    echo "<script>window.location='manage-discount.php?msg=Updated successfully';</script>";
                } else {
                    echo "<script>window.location='manage-discount.php?msg=Not Updated';</script>";
                }
            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from discount where discount_title='$discount_title'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-discount.php?error=banner name already exist';</script>";
                } else {

                    $sql = "INSERT INTO `discount` SET `discount_title`='$discount_title', `discount_note`='$discount_note',`discount_value`='$discount_value', `expiry`='$expiry',`status`='$status' ";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        exit();
                    }
                    if ($result) {
                        echo "<script>window.location='manage-discount.php?msg=Added successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-discount.php?msg=Not Updated';</script>";

                    }
                }

            }

        }
    }

    public function deletediscount($discount = '')
    {
        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `discount` WHERE `discount_id`='$discount'");
        if ($sql) {
            echo "<script>window.location='manage-discount.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-discount.php?msg=Error While Deleting';</script>";

        }
    }

    public function coupan($coupan_id = '')
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $tg = $_POST['tag'];
            $tag = implode("' ',' '", $tg);
            $amount = isset($_POST['amount']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['amount']) : '';
            $applicable_amount = isset($_POST['applicable_amount']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['applicable_amount']) : '';
            $expiry = date("Y-m-d", strtotime($_POST['expiry']));

            $status = $_POST['status'];
            $size = 6;
            $alpha_key = '';
            $keys = range('A', 'Z');

            for ($i = 0; $i < 2; $i++) {
                $alpha_key .= $keys[array_rand($keys)];
            }

            $length = $size - 2;

            $key = '';
            $keys = range(0, 9);

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }
            $coupan_code = $alpha_key . $key;
            if (!empty($coupan_id)) {

                $sql = "UPDATE `coupan` SET `coupan_title`='$name', `amount`='$amount',`tags`='$tag', `expiry`='$expiry', `coupan_code`='$coupan_code',`status`='$status',`applicable_amount`='$applicable_amount' WHERE `coupan_id`='$coupan_id'";
                $result = mysqli_query(GFHConfig::$link, $sql);
                if (!$result) {
                    printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                    exit();
                }
                if ($result) {
                    echo "<script>window.location='manage-coupan.php?msg=Updated successfully';</script>";
                } else {
                    echo "<script>window.location='manage-coupan.php?msg=Not Updated';</script>";
                }

            } else {
                $check = mysqli_query(GFHConfig::$link, "select * from main_banner where headline='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-coupan.php?error=banner name already exist';</script>";
                } else {
                    $sql = "INSERT INTO `coupan`(`coupan_title`, `amount`, `tags`, `expiry`, `coupan_code`, `status`,`applicable_amount`)  VALUES('$name','$amount','$tag','$expiry','$coupan_code','$status','$applicable_amount')";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        exit();
                    }

                    if ($result) {
                        echo "<script>window.location='manage-coupan.php?msg=Added successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-coupan.php?msg=Not Updated';</script>";

                    }
                }

            }

        }
    }

    function getcoupan($discount = "")
    {
        $sql = "select * from coupan ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where coupan_id='$discount'";
        } else {
            $sql .= " where status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    function getcoupanbydate($date = "")
    {
        $sql = "SELECT * FROM `coupan`";
        if (isset($date) && !empty($date)) {
            $sql .= " WHERE `expiry` >='$date' ";
        } else {
            $sql .= " WHERE `expiry` >=CURDATE()";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    function getcoupanbycode($coupan_code)
    {
        $sql = mysqli_query(GFHConfig::$link, "select * from coupan WHERE `coupan_code`='$coupan_code'");
        return mysqli_fetch_array($sql);
    }


    public function apply_coupan()
    {
        $user_id = $_SESSION['client_id'];
        $ip = $_SESSION['user_active'];
        $coupancode = $_POST['coupan'];
        $sql = mysqli_query(GFHConfig::$link, "SELECT * FROM `coupan` WHERE `coupan_code`='$coupancode' AND `expiry` >=CURDATE()");

        if (mysqli_num_rows($sql) > 0) {
$na=mysqli_fetch_array($sql);
            if ($na['applicable_amount'] <= $_POST['amount']) {
                $sq = mysqli_query(GFHConfig::$link, "UPDATE `temp_cart` SET `coupan_code`='$coupancode' WHERE `session`='$ip' AND `user_id`='$user_id'");
                echo "<script>window.location='cart.php?msg=Successfully Applyed'</script>";
            }
        } else {

            echo "<script>window.location='cart.php?msg=Coupan Code Expired or Not Applicable'</script>";
        }
    }


    public function deletecoupan($discount = '')
    {
        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM `coupan` WHERE `coupan_id`='$discount'");
        if ($sql) {
            echo "<script>window.location='manage-coupan.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-coupan.php?msg=Error While Deleting';</script>";

        }
    }

    public function update_productquantity()
    {
        $product_id = mysqli_real_escape_string(GFHConfig::$link, $_POST['product_id']);
        $product_quantity = mysqli_real_escape_string(GFHConfig::$link, $_POST['product_quantity']);
        $pr = $this->getproduct($product_id);
        $prod = mysqli_fetch_array($pr);
        $amount = $prod['prod_price'];
        $sl = mysqli_query(GFHConfig::$link, "INSERT INTO `purchase_inventory` SET `product_id`='$product_id',`quantity`='$product_quantity',`amount`='$amount'");
        $sql = "UPDATE `product` SET `quantity`='$product_quantity',`last_updated`=NOW() WHERE `prod_id`='$product_id'";
        $result = mysqli_query(GFHConfig::$link, $sql);
        if ($result) {
            echo "<script>window.location='manage-product.php?msg=Updated successfully';</script>";
        } else {
            echo "<script>window.location='manage-product.php?msg=Not Updated';</script>";

        }
    }
    // top product update product quantity
    public function update_topproductquantity()
    {
        $product_id = mysqli_real_escape_string(GFHConfig::$link, $_POST['product_id']);
        $product_quantity = mysqli_real_escape_string(GFHConfig::$link, $_POST['product_quantity']);
        $pr = $this->getproduct($product_id);
        $prod = mysqli_fetch_array($pr);
        $amount = $prod['prod_price'];
        $sl = mysqli_query(GFHConfig::$link, "INSERT INTO `purchase_inventory` SET `top_product_id`='$product_id',`quantity`='$product_quantity',`amount`='$amount'");
        $sql = "UPDATE `top_product` SET `quantity`='$product_quantity',`last_updated`=NOW() WHERE `prod_id`='$product_id'";
        $result = mysqli_query(GFHConfig::$link, $sql);
        if ($result) {
            echo "<script>window.location='manage-top-products.php?msg=Updated successfully';</script>";
        } else {
            echo "<script>window.location='manage-top-products.php?msg=Not Updated';</script>";

        }
    }

    //product
    public function product($product_id = "")
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $pramotion = isset($_POST['pramotion']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['pramotion']) : '0';
            $prate = isset($_POST['prate']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prate']) : '';
            $mrate = isset($_POST['mrate']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['mrate']) : '';
            $fresh_price = isset($_POST['fresh_price']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['fresh_price']) : '';
            $category_id = isset($_POST['category_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['category_id']) : '';
            $size_id = isset($_POST['size_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['size_id']) : '';
            $subcategory_id = isset($_POST['category_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['subcategory_id']) : '';
            $discount_id = mysqli_real_escape_string(GFHConfig::$link, $_POST['discount_id']);
            $brand_id = isset($_POST['brand_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['brand_id']) : '';
            $shipping = isset($_POST['shipping']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['shipping']) : '';
            $prod_price = isset($_POST['prod_price']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_price']) : '';
            $prod_description = isset($_POST['prod_description']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_description']) : '';
            $prod_specification = isset($_POST['prod_specification']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_specification']) : '';
            $prod_features = isset($_POST['prod_features']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_features']) : '';
            $prod_disclamer = isset($_POST['prod_disclamer']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_disclamer']) : '';
            $product_images = 0;
            $prod_features = isset($_POST['prod_features']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_features']) : '';
            $hsn_code = isset($_POST['hsn_code']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['hsn_code']) : '';
            $gst = isset($_POST['gst']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['gst']) : '';
            $tg = $_POST['tags'];
            $tags = implode("' ',' '", $tg);
            $prod_status = isset($_POST['prod_status']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_status']) : '';

            if (!empty($product_id)) {

                $nap = array();
                if ($_FILES['image']['name'] != "" && $_FILES['thumb']['name']!= "") {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");

                    $extension1 = strtolower(pathinfo($_FILES["thumb"]["name"], PATHINFO_EXTENSION));
                    $image_tmp1 = $_FILES["thumb"]["tmp_name"];
                    if (in_array($extension1, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $product_thumb =$timestamp . "." . $extension1;
                        move_uploaded_file($image_tmp1, "../images/product/" . $product_thumb);
                    }
                    // $nap1=serialize($nap);
                    $i = 88;
                    foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
                        $extension = strtolower(pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION));
                        $image = $_FILES["image"]["name"][$key];
                        $image_tmp = $_FILES["image"]["tmp_name"][$key];
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $product_images = $i++ . $timestamp . "." . $extension;
                            $nap[] .= $product_images;
                            move_uploaded_file($image_tmp, "../images/product/" . $product_images);
                        }
                        // $nap1=serialize($nap);

                    }
                }
                $pro_img = implode(",", $nap);
                if (!empty($pro_img) && !empty($product_thumb)) {
                    $sql = "UPDATE product SET category_id='$category_id', subcategory_id='$subcategory_id',size_id='$size_id', discount_id='$discount_id', 
prod_name='$name', prod_price='$prod_price', prod_description='$prod_description', prod_specification='$prod_specification', prod_features='$prod_features', prod_disclamer='$prod_disclamer', 
product_images='$pro_img',`thumb`='$product_thumb', tags='$tags', prod_status ='$prod_status', brand_id='$brand_id', shipping='$shipping', pramotion='$pramotion', prate='$prate', mrate='$mrate',fresh_price='$fresh_price', hsn_code='$hsn_code', gst='$gst' WHERE prod_id='$product_id'";
                }

                else {
                    $sql = "UPDATE product SET category_id='$category_id', subcategory_id='$subcategory_id',size_id='$size_id', discount_id='$discount_id', 
prod_name='$name', prod_price='$prod_price', prod_description='$prod_description', prod_specification='$prod_specification',
 prod_features='$prod_features', prod_disclamer='$prod_disclamer', tags='$tags', prod_status ='$prod_status', brand_id='$brand_id', 
 shipping='$shipping', pramotion='$pramotion', prate='$prate', mrate='$mrate',fresh_price='$fresh_price', hsn_code='$hsn_code', gst='$gst' WHERE prod_id='$product_id'";
                }
                $result = mysqli_query(GFHConfig::$link, $sql);
                /*    if (!$result) {
                        printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        exit();
                    }*/

                if ($result) {
                    echo "<script>window.location='manage-product.php?msg=Updated successfully';</script>";
                } else {
                    echo "<script>window.location='manage-product.php?msg=Not Updated';</script>";

                }

            }


            else {
                $check = mysqli_query(GFHConfig::$link, "select * from product where prod_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-coupan.php?error=banner name already exist';</script>";
                } else {
                    $nap = array();
                    if ($_FILES['image']['name'] != "" && $_FILES['thumb']['name']!= "") {
                        $allowedExts = array("jpg", "jpeg", "gif", "png");

                        $extension1 = strtolower(pathinfo($_FILES["thumb"]["name"], PATHINFO_EXTENSION));
                        $image_tmp1 = $_FILES["thumb"]["tmp_name"];
                        if (in_array($extension1, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $product_thumb =$timestamp . "." . $extension1;
                            move_uploaded_file($image_tmp1, "../images/product/" . $product_thumb);
                        }
                        $i = 88;
                        foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
                            $extension = strtolower(pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION));
                            $image = $_FILES["image"]["name"][$key];
                            $image_tmp = $_FILES["image"]["tmp_name"][$key];
                            if (in_array($extension, $allowedExts)) {
                                $date = new DateTime();
                                $timestamp = $date->format('U');
                                $product_images = $i++ . $timestamp . "." . $extension;
                                $nap[] .= $product_images;
                                move_uploaded_file($image_tmp, "../images/product/" . $product_images);
                            }


                        }
                        $pro_img = implode(",", $nap);
                    }

                    $sql = "INSERT INTO product(category_id, subcategory_id, discount_id, prod_name, prod_price, prod_description, prod_specification, prod_features, prod_disclamer, product_images,thumb, tags, prod_status,brand_id,shipping,pramotion,prate,mrate,fresh_price,hsn_code,gst,size_id) 
VALUES('$category_id','$subcategory_id','$discount_id','$name','$prod_price','$prod_description','$prod_specification','$prod_features','$prod_disclamer','$pro_img','$product_thumb','$tags','$prod_status','$brand_id','$shipping','$pramotion','$prate','$mrate','$fresh_price',$hsn_code','$gst','$size_id')";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        exit();
                    }

                    if ($result) {
                        echo "<script>window.location='manage-product.php?msg=Added successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-product.php?msg=Not Updated';</script>";

                    }
                }
            }
        }
    }


//top product
    public function topproduct($product_id = "")
    {
        if (!empty($_POST['name'])) {

            $name = isset($_POST['name']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['name']) : '';
            $pramotion = isset($_POST['pramotion']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['pramotion']) : '0';
            $prate = isset($_POST['prate']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prate']) : '';
            $mrate = isset($_POST['mrate']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['mrate']) : '';
            $fresh_price = isset($_POST['fresh_price']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['fresh_price']) : '';
            $category_id = isset($_POST['category_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['category_id']) : '';
            $size_id = isset($_POST['size_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['size_id']) : '';
            $subcategory_id = isset($_POST['category_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['subcategory_id']) : '';
            $discount_id = mysqli_real_escape_string(GFHConfig::$link, $_POST['discount_id']);
            $brand_id = isset($_POST['brand_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['brand_id']) : '';
            $shipping = isset($_POST['shipping']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['shipping']) : '';
            $prod_price = isset($_POST['prod_price']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_price']) : '';
            $prod_description = isset($_POST['prod_description']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_description']) : '';
            $prod_specification = isset($_POST['prod_specification']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_specification']) : '';
            $prod_features = isset($_POST['prod_features']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_features']) : '';
            $prod_disclamer = isset($_POST['prod_disclamer']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_disclamer']) : '';
            $product_images = 0;
            $prod_features = isset($_POST['prod_features']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_features']) : '';
            $hsn_code = isset($_POST['hsn_code']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['hsn_code']) : '';
            $gst = isset($_POST['gst']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['gst']) : '';
            $tg = $_POST['tags'];
            $tags = implode("' ',' '", $tg);
            $prod_status = isset($_POST['prod_status']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['prod_status']) : '';

            if (!empty($product_id)) {

                $nap = array();
                if ($_FILES['image']['name'] != "" && $_FILES['thumb']['name']!= "") {
                    $allowedExts = array("jpg", "jpeg", "gif", "png");

                    $extension1 = strtolower(pathinfo($_FILES["thumb"]["name"], PATHINFO_EXTENSION));
                    $image_tmp1 = $_FILES["thumb"]["tmp_name"];
                    if (in_array($extension1, $allowedExts)) {
                        $date = new DateTime();
                        $timestamp = $date->format('U');
                        $product_thumb =$timestamp . "." . $extension1;
                        move_uploaded_file($image_tmp1, "../images/topproduct/" . $product_thumb);
                    }
                    // $nap1=serialize($nap);
                    $i = 88;
                    foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
                        $extension = strtolower(pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION));
                        $image = $_FILES["image"]["name"][$key];
                        $image_tmp = $_FILES["image"]["tmp_name"][$key];
                        if (in_array($extension, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $product_images = $i++ . $timestamp . "." . $extension;
                            $nap[] .= $product_images;
                            move_uploaded_file($image_tmp, "../images/topproduct/" . $product_images);
                        }
                        // $nap1=serialize($nap);

                    }
                }
                $pro_img = implode(",", $nap);
                if (!empty($pro_img) && !empty($product_thumb)) {
                    $sql = "UPDATE top_product SET category_id='$category_id', subcategory_id='$subcategory_id',size_id='$size_id', discount_id='$discount_id', 
prod_name='$name', prod_price='$prod_price', prod_description='$prod_description', prod_specification='$prod_specification', prod_features='$prod_features', prod_disclamer='$prod_disclamer', 
product_images='$pro_img',`thumb`='$product_thumb', tags='$tags', prod_status ='$prod_status', brand_id='$brand_id', shipping='$shipping', pramotion='$pramotion', prate='$prate', mrate='$mrate',fresh_price='$fresh_price', hsn_code='$hsn_code', gst='$gst' WHERE prod_id='$product_id'";
                }

                else {
                    $sql = "UPDATE top_product SET category_id='$category_id', subcategory_id='$subcategory_id',size_id='$size_id', discount_id='$discount_id', 
prod_name='$name', prod_price='$prod_price', prod_description='$prod_description', prod_specification='$prod_specification',
 prod_features='$prod_features', prod_disclamer='$prod_disclamer', tags='$tags', prod_status ='$prod_status', brand_id='$brand_id', 
 shipping='$shipping', pramotion='$pramotion', prate='$prate', mrate='$mrate', fresh_price='$fresh_price',hsn_code='$hsn_code', gst='$gst' WHERE prod_id='$product_id'";
                }
                $result = mysqli_query(GFHConfig::$link, $sql);
                /*    if (!$result) {
                        printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        exit();
                    }*/

                if ($result) {
                    echo "<script>window.location='manage-top-products.php?msg=Updated successfully';</script>";
                } else {
                    echo "<script>window.location='manage-top-products.php?msg=Not Updated';</script>";

                }

            }


            else {
                $check = mysqli_query(GFHConfig::$link, "select * from top_product where prod_name='$name'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>window.location='manage-top-products?error=product name already exist';</script>";
                } else {
                    $nap = array();
                    if ($_FILES['image']['name'] != "" && $_FILES['thumb']['name']!= "") {
                        $allowedExts = array("jpg", "jpeg", "gif", "png");

                        $extension1 = strtolower(pathinfo($_FILES["thumb"]["name"], PATHINFO_EXTENSION));
                        $image_tmp1 = $_FILES["thumb"]["tmp_name"];
                        if (in_array($extension1, $allowedExts)) {
                            $date = new DateTime();
                            $timestamp = $date->format('U');
                            $product_thumb =$timestamp . "." . $extension1;
                            move_uploaded_file($image_tmp1, "../images/topproduct/" . $product_thumb);
                        }
                        $i = 88;
                        foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
                            $extension = strtolower(pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION));
                            $image = $_FILES["image"]["name"][$key];
                            $image_tmp = $_FILES["image"]["tmp_name"][$key];
                            if (in_array($extension, $allowedExts)) {
                                $date = new DateTime();
                                $timestamp = $date->format('U');
                                $product_images = $i++ . $timestamp . "." . $extension;
                                $nap[] .= $product_images;
                                move_uploaded_file($image_tmp, "../images/topproduct/" . $product_images);
                            }


                        }
                        $pro_img = implode(",", $nap);
                    }

                    $sql = "INSERT INTO top_product(category_id, subcategory_id, discount_id, prod_name, prod_price, prod_description, prod_specification, prod_features, prod_disclamer, product_images,thumb, tags, prod_status,brand_id,shipping,pramotion,prate,mrate,fresh_price,hsn_code,gst,size_id) 
VALUES('$category_id','$subcategory_id','$discount_id','$name','$prod_price','$prod_description','$prod_specification','$prod_features','$prod_disclamer','$pro_img','$product_thumb','$tags','$prod_status','$brand_id','$shipping','$pramotion','$prate','$mrate','$fresh_price',$hsn_code','$gst','$size_id')";
                    $result = mysqli_query(GFHConfig::$link, $sql);
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        exit();
                    }

                    if ($result) {
                        echo "<script>window.location='manage-top-products.php?msg=Added successfully';</script>";
                    } else {
                        echo "<script>window.location='manage-top-products.php?msg=Not Updated';</script>";

                    }
                }
            }
        }
    }

    public function getproduct($discount = "")
    {
        $sql = "select * from product ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where prod_id='$discount'";
        } else {
            $sql .= " where prod_status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    //top product
    public function gettopproduct($discount = "")
    {
        $sql = "select * from top_product ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where prod_id='$discount'";
        } else {
            $sql .= " where prod_status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getallproduct($discount = "")
    {
        $sql = "select * from product ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where prod_id='$discount'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }
    //top product all
    public function getalltopproduct($discount = "")
    {
        $sql = "select * from top_product ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where prod_id='$discount'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getproduct_by($cat_id ="", $subcate ="", $amount ="", $brand="",$limit="",$featured="")
    {
        $sql = "SELECT * FROM `product` LEFT JOIN `discount` on `product`.`discount_id` = `discount`.`discount_id`";
        if (!empty($cat_id) && empty($cat_id)) {
            $sql .= " WHERE category_id='$cat_id'";
        } elseif (!empty($cat_id) && !empty($subcate)) {
            $sql .= " WHERE category_id='$cat_id' AND subcategory_id='$subcate'";
        } elseif (isset($amount) && !empty($amount)) {
            $amount1 = $_GET['price_range2'];
            $cate = $_GET['cate'];
            $subcat = $_GET['subcat'];
            if (!empty($cate) && !empty($subcat)) {
                $sql .= " WHERE  category_id='$cat_id' AND subcategory_id='$subcate' AND `prod_price` between '$amount' AND '$amount1'";
            } elseif (!empty($cate) && empty($subcat)) {
                $sql .= " WHERE  category_id='$cat_id' AND `prod_price` between '$amount' AND '$amount1'";
            } elseif (!empty($subcate) && empty($cate)) {
                $sql .= " WHERE  category_id='$cat_id' AND `prod_price` between '$amount' AND '$amount1'";
            } else {
                $sql .= " WHERE `prod_price` between '$amount' AND '$amount1'";
            }

        } elseif (isset($brand) && !empty($brand)) {
            $sql .= " WHERE brand_id='$brand'";
        }elseif(isset($featured)&&!empty($featured))
        {
            $sql .= " WHERE make_feature='$featured'";
        }
        elseif (isset($limit) && !empty($limit)) {
            $sql .= " limit $limit";
        }
        else {
        }

        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function getproducttop_by($cat_id ="", $subcate ="", $amount ="", $brand="",$limit="",$featured="")
    {
        $sql = "SELECT * FROM `top_product` LEFT JOIN `discount` on `top_product`.`discount_id` = `discount`.`discount_id`";
        if (!empty($cat_id) && empty($cat_id)) {
            $sql .= " WHERE category_id='$cat_id'";
        } elseif (!empty($cat_id) && !empty($subcate)) {
            $sql .= " WHERE category_id='$cat_id' AND subcategory_id='$subcate'";
        } elseif (isset($amount) && !empty($amount)) {
            $amount1 = $_GET['price_range2'];
            $cate = $_GET['cate'];
            $subcat = $_GET['subcat'];
            if (!empty($cate) && !empty($subcat)) {
                $sql .= " WHERE  category_id='$cat_id' AND subcategory_id='$subcate' AND `prod_price` between '$amount' AND '$amount1'";
            } elseif (!empty($cate) && empty($subcat)) {
                $sql .= " WHERE  category_id='$cat_id' AND `prod_price` between '$amount' AND '$amount1'";
            } elseif (!empty($subcate) && empty($cate)) {
                $sql .= " WHERE  category_id='$cat_id' AND `prod_price` between '$amount' AND '$amount1'";
            } else {
                $sql .= " WHERE `prod_price` between '$amount' AND '$amount1'";
            }

        } elseif (isset($brand) && !empty($brand)) {
            $sql .= " WHERE brand_id='$brand'";
        }elseif(isset($featured)&&!empty($featured))
        {
            $sql .= " WHERE make_feature='$featured'";
        }
        elseif (isset($limit) && !empty($limit)) {
            $sql .= " limit $limit";
        }
        else {
        }

        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getsize($sizeid) {
        $sql = "SELECT * FROM `size` WHERE `categoey_id` = '" .$sizeid. "';";
        return mysqli_query(GFHConfig::$link, $sql);
    }
    public function getproduct_by_cate($discount = "")
    {
        $sql = "select * from product ";
        if (isset($discount) && !empty($discount)) {
            $sql .= " where prod_id='$discount'";
        } else {
            $sql .= " where prod_status='1'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getproduct_bycate($cate, $discount = "")
    {
        $sql = "select * from product WHERE category_id='$cate'";
        if (isset($discount) && !empty($discount)) {
            $sql .= "limit 10";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getrendomproduct($limit = "")
    {
        $sql = "SELECT * FROM `product` WHERE `pramotion`='1' ORDER BY RAND() limit $limit";
        return mysqli_query(GFHConfig::$link, $sql);
    }
 public function gettopproductrandom($limit = "")
    {
        $sql = "SELECT * FROM `top_product` WHERE `prod_status`='1' ORDER BY RAND() limit $limit";
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function deleteproduct($discount)
    {
        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM product WHERE prod_id='$discount'");
        if ($sql) {
            echo "<script>window.location='manage-product.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-product.php?msg=Error While Deleting';</script>";

        }
    }
    //top product delete
    public function deletetopproduct($discount)
    {
        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM top_product WHERE prod_id='$discount'");
        if ($sql) {
            echo "<script>window.location='manage-top-products.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-top-products.php?msg=Error While Deleting';</script>";

        }
    }

    public function getclient($client = "")
    {
        $sql = "SELECT * FROM `client_details`";
        if (isset($client) && !empty($client)) {
            $sql .= " where client_id='$client'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function client($client = "")
    {
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $alt_phone = isset($_POST['alt_phone']) ? $_POST['alt_phone'] : '';
        $billing_add = isset($_POST['billing_add']) ? $_POST['billing_add'] : '';
        $billing_add1 = isset($_POST['billing_add1']) ? $_POST['billing_add1'] : '';
        $pin = isset($_POST['pin']) ? $_POST['pin'] : '';
        $shipping_add = isset($_POST['shipping_add']) ? $_POST['shipping_add'] : '';
        $shipping_add1 = isset($_POST['shipping_add1']) ? $_POST['shipping_add1'] : '';
        $shipping_pin = isset($_POST['shipping_pin']) ? $_POST['shipping_pin'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $state = isset($_POST['state']) ? $_POST['state'] : '';
        $landmark = isset($_POST['landmark']) ? $_POST['landmark'] : '';

        $sq = mysqli_query(GFHConfig::$link, "SELECT * FROM `client_details` WHERE `client_id`='$client'");
        if (mysqli_num_rows($sq) > 0) {
            $sql = "UPDATE `client_details` SET `fullname`='$fullname',`email`='$email',`phone`='$phone',`alt_phone`='$alt_phone',`billing_add`='$billing_add',
`billing_add1`='$billing_add1',`pin`='$pin',`shipping_add`='$shipping_add',`shipping_add1`='$shipping_add1',`shipping_pin`='$shipping_pin',`country`='$country',
`state`='$state',`landmark`='$landmark' WHERE `client_id`='$client'";
            mysqli_query(GFHConfig::$link, $sql);
        } else {
            $sql = "INSERT INTO `client_details` SET `client_id`='$client', `fullname`='$fullname',`email`='$email',`phone`='$phone',`alt_phone`='$alt_phone',`billing_add`='$billing_add',
`billing_add1`='$billing_add1',`pin`='$pin',`shipping_add`='$shipping_add',`shipping_add1`='$shipping_add1',`shipping_pin`='$shipping_pin',`country`='$country',
`state`='$state',`landmark`='$landmark'";
            mysqli_query(GFHConfig::$link, $sql);
        }
    }

    public function delete_client($client = "")
    {
        $sql = mysqli_query(GFHConfig::$link, "DELETE FROM tbl_client WHERE client_id='$client'");
        if ($sql) {
            echo "<script>window.location='manage-client.php?msg=Deleted successfully';</script>";
        } else {
            echo "<script>window.location='manage-client.php?msg=Error While Deleting';</script>";

        }
    }


    public function getcartby_prod($ordar = "")
    {
        $user_id = $_SESSION['client_id'];
        return mysqli_query(GFHConfig::$link, "SELECT * FROM `temp_cart` WHERE `product_id`='$ordar' AND `user_id`='$user_id'");
    }
    public function getcartby_user()
    {
        $user_id = $_SESSION['client_id'];
        return mysqli_query(GFHConfig::$link, "SELECT * FROM `temp_cart` WHERE `user_id`='$user_id'");
    }
    public function getwishby_prod($product,$user_id)
    {

        return mysqli_query(GFHConfig::$link, "SELECT * FROM `temp_wishlist` WHERE `product_id`='$product' AND `user_id`='$user_id'");
    }

    public function getcart($ip = "", $user_id = "")
    {

        $sess_id = $_SESSION['user_active'];
        $sql = "SELECT * FROM `temp_cart`";
        if (!empty($sess_id) && empty($user_id)) {
            $sql .= " WHERE `session`='$sess_id' ";
        } elseif (!empty($sess_id) && !empty($user_id)) {
            $sql .= " WHERE `session`='$sess_id' AND `user_id`='$user_id'";
        } else {
        }

        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function delete_cart($cart_id)
    {
        $sql="DELETE FROM `temp_cart` WHERE `cart_id`='$cart_id'";
        return mysqli_query(GFHConfig::$link, $sql) or die("erro");
    }

    public function getwish($user_id)
    {
        $sql = "SELECT * FROM `temp_wishlist` WHERE `user_id`='$user_id'";
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function cart($cart_id = "")
    {
        $user_id = $_SESSION['client_id'];
        if (empty($cart_id)) {
            $product_id = $_POST['cart'];
              $size=$_POST['size'];
            $sql = $this->getproduct($product_id);
            $quantity = $_POST['quantity'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $na = mysqli_fetch_array($sql);
            if ($na['discount_id'] != 0) {
                $dis = $this->getdiscount($na['discount']);
                $discount = mysqli_fetch_array($dis);
                $total_price = $na['prod_price'] + $discount['discount_value'] + $na['shipping'] * $quantity;
            } else {
                $total_price = $na['prod_price'] + $na['shipping'] * $quantity;
            }
            $prd = $this->getcartby_prod($product_id);
            if (mysqli_num_rows($prd) > 0) {
                $pd = mysqli_fetch_array($prd);
                $updated_price = $total_price + $pd['price'];
                $update_quantity = $quantity + $pd['quantity'];
                $sql = "UPDATE `temp_cart` SET `quantity`='$update_quantity',`price`=$updated_price,`size`='$size' WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
                mysqli_query(GFHConfig::$link, $sql);
            } else {
                $result = mysqli_query(GFHConfig::$link, "INSERT INTO `temp_cart`(`product_id`, `quantity`, `price`, `ip`, `user_id`,`size`)
 VALUES ('$product_id','$quantity','$total_price','$ip','$user_id','$size')");
            }


        } else {

        }
    }

    public function wish($cart_id = "")
    {
        $user_id = $_SESSION['client_id'];
        $product_id = $_POST['wish_product_id'];
        $quantity = $_POST['quantity'];
        if (empty($cart_id)) {

            $ip = $_SESSION['client_id'];
            $sql = $this->getproduct($_POST['wish_product_id']);

            $na = mysqli_fetch_array($sql);
            if ($na['discount'] != 0) {
                $dis = $this->getdiscount($na['discount']);
                $discount = mysqli_fetch_array($dis);
                $total_price = $na['prod_price'] + $discount['discount_value'] + $na['shipping'] * $quantity;
            } else {
                $total_price = $na['prod_price'] + $na['shipping'] * $quantity;
            }
            $prd = $this->getwishby_prod($product_id, $ip);
            if (mysqli_num_rows($prd) > 0) {
                $pd = mysqli_fetch_array($prd);
                $updated_price = $total_price + $pd['price'];
                $update_quantity = $quantity + $pd['quantity'];
                $sql = "UPDATE `temp_wishlist` SET `quantity`='$update_quantity',`price`=$updated_price,`user_id`='$user_id' WHERE `product_id`='$product_id' AND `ip`='$ip'  AND `session`='$sess_id'";
                mysqli_query(GFHConfig::$link, $sql);
            } else {
                $result = mysqli_query(GFHConfig::$link, "INSERT INTO `temp_wishlist`(`product_id`, `quantity`, `price`, `ip`, `user_id`)
 VALUES ('$product_id','$quantity','$total_price','$ip','$user_id')");
            }


        } else {

        }
    }

    public function genrate_invoice($order_id)
    {
        $sql = "INSERT INTO `invoice`(`order_no`, `amount`, `user_id`, `date`, `payment_method`) SELECT `order_id`, `amount`, `user_id`,  `date`, `payment_method` FROM `product_order` WHERE `order_id`='$order_id'";
        $result = mysqli_query(GFHConfig::$link, $sql);
        if ($result) {
            echo "<script>window.location='manage_invoice.php?q=" . $order_id . "'</script>";
        } else {
            echo "<script>alert('Error While Genrating Invoice');</script>";
        }
    }

    public function getinvoice($status = "")
    {
        $sql = "SELECT * FROM `invoice`";
        if (isset($status) && !empty($status)) {
            $sql .= " WHERE status='$status'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function deletecart($cart_id)
    {
        return mysqli_query(GFHConfig::$link, "DELETE FROM `temp_cart` WHERE `cart_id`='$cart_id'");
    }

    public function deletewish($cart_id)
    {
        return mysqli_query(GFHConfig::$link, "DELETE FROM `temp_wishlist` WHERE `wishlist_id`='$cart_id'");
    }


    public function getnewordar()
    {
        $sql = mysqli_query(GFHConfig::$link, "SELECT * FROM `product_order` order by `order_id` DESC ");
        return $sql;
    }

    public function get_review($review_id = "", $status = "")
    {
        $sql = "SELECT * FROM `review`";

        if (!empty($review_id)) {
            $sql .= " WHERE `review_id`='$review_id'";
        } elseif (!empty($status)) {
            $sql .= " WHERE `status`='$status'";
        } else {
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function get_reviewbyproduct($product_id = "",$product_type="")
    {
        $sql = "SELECT * FROM `review` WHERE `product_id`='$product_id' AND product_type='$product_type'  AND `status`='1'";
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function review($review_id = "")
    {
        $review = isset($_POST['review']) ? $_POST['review'] : '';
        $email = $_SESSION['client_email'];
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';
        $status = isset($_POST['status'])?$_POST['status']:'1';
        $user_name = $_SESSION['client_name'];
        if (!empty($review_id)) {
            $sql = mysqli_query(GFHConfig::$link, "UPDATE `review` SET `product_id`='$product_id',`product_type`='$product_type', `user_name`='$user_name',`email`='$email',`review`='$review',`status`='$status' WHERE `review_id`='$review_id'");

        } else {
            $sql = mysqli_query(GFHConfig::$link, "INSERT INTO `review` SET `product_id`='$product_id',`product_type`='$product_type',`user_name`='$user_name',`email`='$email',`review`='$review','status'='0'");
 
        }
    }

    public function cartsetting($id = "")
    {
        $title = isset($_POST['name']) ? $_POST['name'] : '';
        $mode = isset($_POST['mode']) ? $_POST['mode'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $note = isset($_POST['note']) ? $_POST['note'] : '';
        if (!empty($id)) {
            $sql = mysqli_query(GFHConfig::$link, "UPDATE `cart_setting` SET `name`='$title', `mode`='$mode',`status`='$status' ,`note`='$note' WHERE `id`='$id'");
            if ($sql) {
                echo "<script>window.location='cartsetting.php?msg=Updated Successfully'</script>";
            } else {
                echo "<script>window.location='cartsetting.php?msg=Error While Updated'</script>";
            }
        } else {
            $sql = mysqli_query(GFHConfig::$link, "INSERT INTO `cart_setting` SET  `name`='$title', `mode`='$mode',`note`='$note',`status`='$status'");
            if ($sql) {
                echo "<script>window.location='cartsetting.php?msg=Added Successfully'</script>";
            } else {
                echo "<script>window.location='cartsetting.php?msg=Error While Adding'</script>";
            }
        }
    }

    public function get_cartsetting($cart_id = "", $status = "")
    {
        if (!empty($cart_id)) {
            $sql = "SELECT * FROM `cart_setting` WHERE `id`='$cart_id'";
        } elseif (!empty($status)) {
            $sql = "SELECT * FROM `cart_setting` WHERE `status`='$status'";
        } else {
            $sql = "SELECT * FROM `cart_setting`";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function deletecart_setting($id)
    {
        if (mysqli_query(GFHConfig::$link, "DELETE FROM `cart_setting` WHERE `id`='$id'")) {
            echo "<script>window.location='cartsetting.php?msg=Deleted Successfully'</script>";
        }
    }

    public function update_client_password($user_id)
    {
       $password = $_POST['password'];
        $sql = mysqli_query(GFHConfig::$link, "UPDATE `tbl_client` SET `password`='$password' WHERE `client_id`='$user_id'");
        if ($sql) {
            echo "<script>window.location='my-profile.php?msg=Updated successfully';</script>";
        }
    }

    public function move_wish($wish = "")
    {
        if (!empty($wish)) {
            $sql = "INSERT INTO `temp_cart`(`product_id`, `quantity`, `price`, `ip`, `user_id`,`session`) SELECT `product_id`, `quantity`, `price`, `ip`, `user_id`,`session` FROM `temp_wishlist` WHERE `wishlist_id`='$wish'";
            $result = mysqli_query(GFHConfig::$link, $sql);
            mysqli_query(GFHConfig::$link, "DELETE FROM `temp_wishlist` WHERE `wishlist_id`='$wish'");
            if ($result) {
                echo "<script>window.location='cart.php?Added Successfully'</script>";
            }
        }
    }

    public function sale_inventory($product_id, $quantity, $amount)
    {
        $sql = mysqli_query(GFHConfig::$link, "INSERT INTO  `sale_inventory` SET `product_id`='$product_id',`quantity`='$quantity',`amount`='$amount'");
        if ($sql) {
            $result = mysqli_query(GFHConfig::$link, "UPDATE `product` SET `quantity`=quantity-'$quantity',`last_updated`=NOW() WHERE `prod_id`='$product_id'");
        }
    }


    public function getpurchaseinventory($date1, $date2)
    {

        $sql = "SELECT * FROM `purchase_inventory`";
        if (isset($date1) && !empty($date1)) {
            $sql .= "WHERE   date(`created_on`) BETWEEN  '$date1' AND '$date2'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function get_purchaserevenue($date1 = "", $date2 = "")
    {
        $sql = "SELECT product.prod_name,product.category_id,product.subcategory_id,product.prate,purchase_inventory.amount,(purchase_inventory.amount )- (product.prate * purchase_inventory.quantity) as profit,purchase_inventory.quantity,product.product_images,purchase_inventory.created_on FROM `product`,`purchase_inventory` WHERE product.prod_id=purchase_inventory.product_id";
        if (isset($date1) && !empty($date1)) {
            $sql .= " AND date(sale_inventory.created_on) BETWEEN  '$date1' AND '$date2'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function getsaleinventory($date1, $date2)
    {

        $sql = "SELECT * FROM `sale_inventory`";
        if (isset($date1) && !empty($date1)) {
            $sql .= "WHERE   date(`created_on`) BETWEEN  '$date1' AND '$date2'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function get_salerevenue($date1 = "", $date2 = "")
    {
        $sql = "SELECT product.prod_name,product.category_id,product.subcategory_id,product.prate,sale_inventory.amount,(sale_inventory.amount )- (product.prate * sale_inventory.quantity) as profit,sale_inventory.quantity,product.product_images,sale_inventory.created_on FROM `product`,`sale_inventory` WHERE product.prod_id=sale_inventory.product_id ";
        if (isset($date1) && !empty($date1)) {
            $sql .= " AND date(sale_inventory.created_on) BETWEEN  '$date1' AND '$date2'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function checkout()
    {

        $amount = isset($_POST['amount']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['amount']) : '';
        $payment_method = isset($_POST['payment_method']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['payment_method']) : '';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['client_id'];
        $sql = mysqli_query(GFHConfig::$link, "INSERT INTO `product_order`( `amount`, `ip`, `user_id`, `payment_status`, `delivery_status`,`payment_method`)
 VALUES('$amount','$ip','$user_id','pending','pending','$payment_method')");
        $order_no = mysqli_insert_id(GFHConfig::$link);
        $_SESSION['ordar_no'] = $order_no;
 
        if ($_POST["payment_method"] == 'on' && $sql) {

            $cr = $this->getcartby_user();
            while ($na = mysqli_fetch_array($cr)) {
                $product_id = $na['product_id'];
                $quantity = $na['quantity'];
                $price = $na['price'];
                $coupan_code = $na['coupan_code'];
                $size = $na['size'];
                mysqli_query(GFHConfig::$link, "INSERT INTO `shopping_cart` SET `product_id`='$product_id',`quantity`='$quantity',`price`='$price',`ip`='$ip',`user_id`='$user_id',`coupan_code`='$coupan_code',`order_no`='$order_no',`size`='$size'");
                $this->sale_inventory($product_id, $quantity, $price);
                $sql=mysqli_query(GFHConfig::$link, "DELETE FROM `temp_cart` WHERE `user_id`='$user_id'");  

            }
            unset($_SESSION['cart_item']);
             echo "<script>window.location='process.php'</script>";
        
            
        } else {
            $cr = $this->getcartby_user();
            while ($na = mysqli_fetch_array($cr)) {
                $product_id = $na['product_id'];
                $quantity = $na['quantity'];
                $price = $na['price'];
                $coupan_code = $na['coupan_code'];
                mysqli_query(GFHConfig::$link, "INSERT INTO `shopping_cart` SET `product_id`='$product_id',`quantity`='$quantity',`price`='$price',`ip`='$ip',`user_id`='$user_id',`coupan_code`='$coupan_code',`order_no`='$order_no',`size`='$size'");
                $this->sale_inventory($product_id, $quantity, $price);

            }
             $sql=mysqli_query(GFHConfig::$link, "DELETE FROM `temp_cart` WHERE `user_id`='$user_id'");
            
            echo "<script>window.location='thankyou.php'</script>";
        }
    }


    public function getshooping_cart($ordar_no)
    {
        $sql = "SELECT * FROM `shopping_cart` WHERE `order_no`='$ordar_no'";
        return mysqli_query(GFHConfig::$link, $sql);
    }

    /* public function totalshoppingamount($ordar_no) {
         $sql=  mysqli_query(GFHConfig::$link,"SELECT sum(`price`) as `total` FROM `shopping_cart` WHERE `order_no`='$ordar_no'");
         $na=mysqli_fetch_array($sql);
         return $na['total'];
     }*/


    public function complaint()
    {
        $name = $_POST['firstname'] . " " . $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $type = $_POST['type'];
        $category = $_POST['category_id'];
        $subcategory = $_POST['subcategory'];
        $product = $_POST['product'];
        $date = $_POST['date'];
        $place = $_POST['place'];
        $details = $_POST['details'];
        $complaint_no = 'fab' . time() . rand(10 * 45, 100 * 98);
        $sql = mysqli_query(GFHConfig::$link, "INSERT INTO `complaint_registration`(`name`, `email`, `phone`, `address`, `type`, `category`, `subcategory`, `product`, `date`, `place_of_purchase`, `details`,`complaint_no`)
 VALUES ('$name','$email','$phone','$address','$type','$category','$subcategory','$product','$date','$place','$details','$complaint_no')");

        $to = 'customercarefabiano@gmail.com';
        $subject = 'Fabiano ' . $type;

        $message = '<p>Hi Admin,</p><br><p>You have New ' . $type . ' Details mentained below !!! </p><br><table>
<tr>
<td width="170px" style="font-weight: bold">Name  </td>
<td width="50px">:</td>
<td>' . $name . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Email address </td>
<td width="50px">:</td>
<td>' . $email . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Phone number </td>
<td width="50px">:</td>
<td>' . $phone . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Address </td>
<td width="50px">:</td>
<td>' . $address . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Complaint type </td>
<td width="50px">:</td>
<td>' . $type . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Product </td>
<td width="50px">:</td>
<td>' . $product . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Date of Purchase </td>
<td width="50px">:</td>
<td>' . $date . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Place of purchase </td>
<td width="50px">:</td>
<td>' . $place . '</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Details </td>
<td width="50px">:</td>
<td>' . $details . '</td>
</tr>
</table>';


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <admin@fabianoappliances.com>' . "\r\n";
        $headers .= 'Cc: info@fabianoappliances.com' . "\r\n";

        $sentmail = mail($to, $subject, $message, $headers);


        if ($sql) {
            echo "<script>window.location='complaint.php?complaint=" . $complaint_no . "&msg=Successfully Posted'; </script>";
        } else {
            echo "error";
        }
    }

    public function setPaymentDetail($txnid, $firstname, $amount, $email, $status, $paymentdetail, $ordaerno)
    {
        return mysqli_query(GFHConfig::$link, "INSERT INTO `bank_transaction` SET `amount`='$amount',`order_no`='$ordaerno',`email`='$email',`status`='$status',`transaction_no`='$txnid',`firstname`='$firstname'");

    }


    public function get_transaction($tansaction = "")
    {
        $sql = "SELECT * FROM `bank_transaction` ";
        if (!empty($tansaction)) {
            $sql .= " WHERE `transaction_no`='$tansaction'";
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


}

global $GFH_Admin;
$GFH_Admin = new GFHAdmin();
$GFH_Admin->getsytem();
