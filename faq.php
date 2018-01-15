<?php include 'includes/header.php'; ?>
	<style>
    /*******************************
* Does not work properly if "in" is added after "collapse".
* Get free snippets on bootpen.com
*******************************/
    .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
        background: #00796B;
        color: #fff;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }

</style>
	<!-- help-page -->
	<div class="faq-_winkagile">
		<div class="container"> 
			<h3 class="_winkls-title _winkls-title1">Frequently asked questions(FAQ)</h3>
            <div class="container demo">


                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

               
          <?php $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `faq`");
          $i=1;
while ($na=mysqli_fetch_array($sql)) {?>
  
         <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?php echo $i?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i?>" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <?php echo $na['question']; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                 <?php echo $na['ans'];?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; }?>
 
                </div><!-- panel-group -->


            </div><!-- container -->
			<!-- script for tabs -->
			<!--<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.faq > li > ul'),
						   menu_a  = $('.faq > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>-->
            <script>
                function toggleIcon(e) {
                    $(e.target)
                        .prev('.panel-heading')
                        .find(".more-less")
                        .toggleClass('glyphicon-plus glyphicon-minus');
                }
                $('.panel-group').on('hidden.bs.collapse', toggleIcon);
                $('.panel-group').on('shown.bs.collapse', toggleIcon);
            </script>
			<!-- script for tabs -->   
		</div>
	</div>
	<!-- //login-page --> 

<?php include 'includes/footer.php'; ?>