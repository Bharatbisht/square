<h1>Upload Files</h1>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<br>
<div class="row">
   <div class="col-sm-4">
   <h6>Upload Photo</h6>
   </div>
   <div class="col-sm-4">
   <h6>User Name</h6>
   </div>
   <div class="col-sm-4">
     <h6>Date</h6>
   </div>
</div>

<?php 
 global $wpdb;
 $table_name = $wpdb->prefix . 'sandbox';
 
 //query
 
 $sql = "SELECT * FROM `Aerial_upload_plugin`";

         require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
           $data = dbDelta( $sql );

           foreach($data as $a) {
?>
<div class="row">
   <div class="col-sm-4">
   <p><?php echo $a['IMAGE_DIR'];  ?></p>
   </div>
   <div class="col-sm-4">
   <p><?php echo $a['USER_ID']; ?> </p>
   </div>
   <div class="col-sm-4">
     <p> <?php echo $a['DATE']; ?></p>
   </div>
</div>

           <?php } ?>