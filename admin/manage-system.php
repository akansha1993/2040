<?php
require_once('includes/config.php');
require_once('includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $sys['system_name'];?> Admin</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->
    <?php require_once('includes/css.inc'); ?>

    <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->
<?php require_once('includes/header.inc'); ?>

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div>
    <!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
    <?php if(isset($_POST['name'])){
        $GFH_Admin->update_sytem();
    }?>
<?php
if(isset($_GET['delete']))
{
    $GFH_Admin->deleteclient($_GET['delete']);
}?>
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-underline">
                            <div class="card-head">

                                <header>Manage System</header>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form form-validate floating-label" enctype="multipart/form-data">
                                    <?php
                                        $sl=mysqli_query($GFH_Admin::$link,"SELECT * FROM  `system` LIMIT 0,1");
                                        $naa=mysqli_fetch_array($sl);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" value="<?php echo isset($naa['system_name'])?$naa['system_name']:'';?>" name="name"
                                                       required="" aria-required="true">
                                                <label for="Email1">Systme Title </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" value="<?php echo isset($naa['email'])?$naa['email']:'';?>">
                                                <label>Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="file" multiple name="image" style="width: 0.1px; height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  />
                                                <label style="
    color: #f1e5e6;
    background-color: #d3394c;" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Choose a file…</span></label>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="gplus_link" value="<?php echo isset($naa['gplus_link'])?$naa['gplus_link']:'';?>">
                                                <label>Google Link</label>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fb_link" value="<?php echo isset($naa['fb_link'])?$naa['fb_link']:'';?>">
                                                <label>Facbook Link</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="twitter_link" value="<?php echo isset($naa['twitter_link'])?$naa['twitter_link']:'';?>">
                                                <label>Twittar Link</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="linked_link" value="<?php echo isset($naa['linked_link'])?$naa['linked_link']:'';?>">
                                                <label>Linked in Link</label>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="marchant_key" name="marchant_key" class="form-control"  value="<?php echo isset($naa['marchant_key'])?$naa['marchant_key']:'';?>" />
                                                <label for="select1">Marchant Key</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input id="marchant_key" name="sault" class="form-control" value="<?php echo isset($naa['sault'])?$naa['sault']:'';?>"/>
                                                <label for="select1">Sault</label>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="phone" value="<?php echo isset($naa['phone'])?$naa['phone']:'';?>">
                                                    <label>Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" value="<?php echo isset($naa['email'])?$naa['email']:'';?>">
                                                    <label>Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4>Address</h4>
                                                <textarea name="address" class="form-control control-12-rows summernote"
                                                          placeholder="Enter text ..."><?php echo isset($naa['address'])?$naa['address']:''?></textarea>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4>Map</h4>
                                                <textarea name="map_api" class="form-control control-12-rows summernote"
                                                          placeholder="Enter text ..."><?php echo isset($naa['map_api'])?$naa['map_api']:''?></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4>FB Widget</h4>
                                                <textarea name="fb_widget" class="form-control control-12-rows summernote"
                                                          placeholder="Enter text ..."><?php echo isset($naa['fb_widget'])?$naa['fb_widget']:''?></textarea>

                                            </div>
                                        </div>

                                    </div>

                            </div>


                            <div class="card-actionbar">
                                <div class="card-actionbar-row">
                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">
                                        Save Changes
                                    </button>
                                </div>
                            </div>


                            </form>

                            </div>
                        </div>
                    </div>

                </div>
                <!--end .row -->
            </div>
            <!--end .section-body -->
        </section>
    </div>
    <!--end #content-->
    <!-- END CONTENT -->

    <?php require_once('includes/menu.inc'); ?>


</div>
<!--end #base-->
<!-- END BASE -->

<?php require_once('includes/js.inc'); ?>
</body>
</html>
