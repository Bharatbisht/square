<?php 
/**
 * @package upload_plugin
 */
/*
Plugin Name: Upload File
Plugin URI: https://squarestakeff.com/
Description: Upload your files
Version :1.0.0
Author: Bharat Bisht
*/

defined('ABSPATH') or die();

class Upload_file {
    

   public function register() {

        //connect the style.css
       
        add_action('admin_menu', array( $this, 'add_admin_pages')); 
       
         add_action('wp_ajax_submit_form' , array( $this, 'submit_form'));

          add_action('wp_ajax_nopriv_submit_form' , array( $this, 'submit_form'));

    }

    public function submit_form() {
       
      //database connectivity

      echo "your post is accepted";

      wp_die();
    }


     public function add_admin_pages() {
        
        add_menu_page( 'Aerial Plugin', 'Aerial_Upload' , 'manage_options', 'aerial_upload_plugin',
         array( $this, 'admin_index' ), 'dashicons-store', 110);
     
    }

        function admin_index() {

         require_once plugin_dir_path( __FILE__ ). '/admin_page.php';
      
       }

        public function create_table() {

              global $wpdb;
            $table_name = $wpdb->prefix . 'sandbox';
              $sql = "CREATE TABLE Aerial_upload_images (
                      ID int,
                      IMAGE_DIR varchar(255),
                      USER_ID varchar(255),
                      DATE date,
                      PRIMARY KEY (ID)
                    )";

                    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                       dbDelta( $sql );

        }

        public function activate() {
           
          flush_rewrite_rules();
              
          }


      public function deactivate() {
           
            flush_rewrite_rules();
            
            }
  
           public function drag() {
              
              wp_enqueue_style('mypluginstyle',plugins_url('/assets/mystyle.css',__FILE__));
             
              wp_enqueue_script('mypluginscript',plugins_url('/assets/app.js',__FILE__));
             
                
             ?>
<html>
 <head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<section>
  <form id="formdata" action="#" method="POST" data-url="<?php echo admin_url('admin-ajax.php') ?>" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Upload File</label>
            <div class="preview-zone hidden">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <div><b>Preview</b></div>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                      <i class="fa fa-times"></i> Reset This Form
                    </button>
                  </div>
                </div>
                <div class="box-body"></div>
              </div>
            </div>
            <div class="dropzone-wrapper">
              <div class="dropzone-desc">
                <i class="glyphicon glyphicon-download-alt"></i>
                <p>Choose an image file or drag it here.</p>
              </div>
              <input type="file" name="img_logo" class="dropzone">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" name="submit" class="btn btn-primary pull-right">Upload</button>
        </div>
       
      </div>
    </div>
    <input type="hidden" name="action" value="submit_form">
  </form>
</section>
</body>
</html>

 <?php
        }
        
}

if( class_exists ('Upload_file')) {

    $upload = new Upload_file();
    
       $upload->register();
       
         add_shortcode( 'drag_drop', array($upload,'drag') );

}



register_activation_hook(__FILE__, array($upload,'activate'));


register_activation_hook(__FILE__, array($upload,'create_table'));


register_deactivation_hook(__FILE__, array($upload,'deactivate'));

