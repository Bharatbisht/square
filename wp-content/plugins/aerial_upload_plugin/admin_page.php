<h1>Upload Files</h1>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<br>
<div class="row">
<div class="col-sm-3">
   <h5><u>ID</u></h5>
   </div>
   <div class="col-sm-3">
   <h5><u>Upload Photo</u></h5>
   </div>
   <div class="col-sm-3">
   <h5><u>User Name</u></h5>
   </div>
   <div class="col-sm-3">
     <h5><u>Date</u></h5>
   </div>
</div>
<br>
<?php 
 global $wpdb;
 
 //query
 
 $data = $wpdb->get_results("SELECT * FROM `Aerial_upload_images`");


           foreach($data as $a) {
   ?>
      <div class = "row">
         <div class="col-sm-3">
        <?php echo($a->ID);?>            
          </div>
          <div class="col-sm-3">
          <?php echo($a->USER_ID); ?>       
          </div>
          <div class="col-sm-3">
          
          <img src="<?php echo $a->IMAGE_DIR; ?>" height= '100' width ='100'>

          </div>
          <div class="col-sm-3">
          <?php echo($a->DATE); ?>
          </div>
      </div>    
       <?php } ?>