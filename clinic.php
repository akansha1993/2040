<?php include('includes/header.php'); ?> 
<div class="container">
   <div class="row">

<script type="text/javascript">
    function change_url(val) {
        window.location=val;
    }
</script>
<style type="text/css">
   .form-group{width: 100%;float: left;}
</style>
<div class="col-md-8 col-md-offset-2" style="margin-top: 50px;margin-bottom: 50px;">
<div class="col-md-4">
   <h4>Signup as</h4>
</div>
<div class="col-md-8">
   <select class="form-control" onchange="change_url(this.value);">
    <option value="join.php" >Doctor’s Registration </option>
    <option value="physio1.php">Physiotherapist/Occupational therapist/prosthetist/orthotist/speech therapist</option>
    <option value="vendor.php">Vendor registration</option>
    <option value="clinic.php" selected>Clinic</option>
</select>
</div>
</div>
<div class="clearfix"></div>

<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<form role="form">

  <!--   <h1>doctor</h1> -->
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
           


                        <div class="form-group ">
                           <label class="control-label col-md-2 col-md-offset-1" for="name">Clinic Name:</label>
                           <div class="col-md-8">
                              <input type="text" class="form-control" id="name" placeholder="Enter Clinic Name" name="name">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2 col-md-offset-1" for="mob"> Owner of the Clinic:</label>
                           <div class="col-md-8">          
                              <input type="text" class="form-control" id="mob" placeholder="Enter AOwner of the Clinic" name="mob">
                           </div>
                        </div>
                        <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-1" for="mob">Mobile No:</label>
                                    <div class="col-md-8">
                                       <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">+91</span>
                                          <input type="number" class="form-control" placeholder="Enter Your Phone Number">
                                       </div>
                                    </div>
                                 </div>
                        <div class="form-group">
                           <label class="control-label col-md-2 col-md-offset-1" for="qua">E-mail Id:</label>
                           <div class="col-md-8">          
                              <input type="text" class="form-control" id="qua" placeholder="Enter E-mail Id" name="qua">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2 col-md-offset-1" for="spe">City:</label>
                           <div class="col-md-8">          
                              <input type="text" class="form-control" id="spe" placeholder="Enter City" name="spe">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2 col-md-offset-1" for="city"> Address of the clinic:</label>
                           <div class="col-md-8">          
                              <input type="text" class="form-control" id="city" placeholder="Enter Address of the clinic" name="city">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2 col-md-offset-1" for="city">   Clinic registration no.:</label>
                           <div class="col-md-8">          
                              <input type="text" class="form-control" id="city" placeholder="Enter Clinic registration no" name="city">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2 col-md-offset-1" for="city">  TIN/GSTIN.:</label>
                           <div class="col-md-8">          
                              <input type="text" class="form-control" id="city" placeholder="Enter TIN/GSTIN" name="city">
                           </div>
                        </div>
                              </div>
                           </div>
                           <button class="btn btn-primary nextBtn btn-lg" type="button" style="border-radius: 0;padding: 5px 40px;margin-top: 10px;float: right">Next</button>
                        </div>
                     </div>
                  </div>
                  <div class="row setup-content" id="step-2">
                     <div class="col-xs-12">
                        <div class="col-md-12">
                     

               <form id="form1" runat="server">
                           <h3 style="text-align: center;">Upload Documents</h3>

               <div class="row" style="margin-top: 50px;">
               <div class="col-md-4">
               <img id="image_upload_preview" class="img-responsive" src="http://placehold.it/100x100" alt="your image" / style="height: 100px;width: 100px;margin: 0 auto">
               <input type='file' id="inputFile" / style="margin-bottom: 10px; padding: 5px 5px 5px 5px; margin-left:137px;">
               </div>
               <div class="col-md-4">
               <img id="image_upload_preview1" class="img-responsive" src="http://placehold.it/100x100" alt="your image" / style="height: 100px;width: 100px;margin: 0 auto">
               <input type='file' id="inputFile1" / style="margin-bottom: 10px; padding: 5px 5px 5px 5px; margin-left:137px;">
               </div>
               <div class="col-md-4">
               <img id="image_upload_preview2" class="img-responsive" src="http://placehold.it/100x100" alt="your image" / style="height: 100px;width: 100px;margin: 0 auto">
               <input type='file' id="inputFile2" / style="margin-bottom: 10px; padding: 5px 5px 5px 5px; margin-left:137px;">
               </div>
               <div class="col-md-4">
               <img id="image_upload_preview3" class="img-responsive" src="http://placehold.it/100x100" alt="your image" / style="height: 100px;width: 100px;margin: 0 auto">
               <input type='file' id="inputFile3" / style="margin-bottom: 10px; padding: 5px 5px 5px 5px; margin-left:137px;">
               </div>
               </div>
               </form>
              <button class="btn btn-primary  btn-lg" type="button" style="border-radius: 0;padding: 5px 40px;margin-top: 10px;float: right">submit</button>
               </div>
               </div>
               </div>
        










               
                               
                             
                          
                
            </div>
        </div>
    </div>


</form>
</div>


   </div>
   </div>


<script type="text/javascript">
   $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

<?php include('includes/footer.php'); ?> 

<script type="text/javascript">
   function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
           reader.onload = function (e) {
              $('#image_upload_preview').attr('src', e.target.result);
          }
   
          reader.readAsDataURL(input.files[0]);
      }
   }
   
   $("#inputFile").change(function () {
      readURL(this);
   });
</script> 
<script type="text/javascript">
   function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
           reader.onload = function (e) {
              $('#image_upload_preview1').attr('src', e.target.result);
          }
   
          reader.readAsDataURL(input.files[0]);
      }
   }
   
   $("#inputFile1").change(function () {
      readURL1(this);
   });
</script> 
<script type="text/javascript">
   function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
           reader.onload = function (e) {
              $('#image_upload_preview2').attr('src', e.target.result);
          }
   
          reader.readAsDataURL(input.files[0]);
      }
   }
   
   $("#inputFile2").change(function () {
      readURL2(this);
   });
</script> 
<script type="text/javascript">
   function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
           reader.onload = function (e) {
              $('#image_upload_preview3').attr('src', e.target.result);
          }
   
          reader.readAsDataURL(input.files[0]);
      }
   }
   
   $("#inputFile3").change(function () {
      readURL3(this);
   });
</script> 


