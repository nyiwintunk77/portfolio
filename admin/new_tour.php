<?php
      
      require_once("../require_file.php");
      require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "NEW TOUR";
      $parent_page = "TOUR MANAGEMENT";
      if(isset($_REQUEST["new_tour_form"]))
      {

            $name = mysqli_real_escape_string($con,$_REQUEST["name"]);
            $type = mysqli_real_escape_string($con,$_REQUEST["type"]);
            $car_id = mysqli_real_escape_string($con,$_REQUEST["car"]);
            $hotel_id = mysqli_real_escape_string($con,$_REQUEST["hotel"]);
            $destination_id = mysqli_real_escape_string($con,$_REQUEST["destination"]);
            $restaurant_id = mysqli_real_escape_string($con,$_REQUEST["restaurant"]);
            $itinerary = mysqli_real_escape_string($con,$_REQUEST["itinerary"]);
            $cost = mysqli_real_escape_string($con,$_REQUEST["cost"]);
            $detail_desc = mysqli_real_escape_string($con,$_REQUEST["detail_desc"]);

           
      




             
             //$file_extension = $logic['obj'] -> find_extension($photo);
                $photo = $_FILES['photo']['name'];
                $tmp = $_FILES['photo']['tmp_name'];
                $file_size = $_FILES['photo']['size'];

                  $image_info = getimagesize($_FILES['photo']['tmp_name']);
                  list($orginal_width, $orginal_height, $orginal_type, $orginal_attr) = $image_info;

                  $img_org_width = $image_info[0];
                  $img_org_height = $image_info[1];                      
                  $limit_file_size = 5000000; // 5MB to check

                  //$logic['obj'] -> check_photo_size($img_org_width,$img_org_height,$file_size,$limit_file_size);

                  $img_allow_extension = array("gif", "png", "jpg", "jpeg");
                  $mime = $image_info['mime'];
                  //$logic['obj'] -> check_photo_extension($mime,$file_extension,$img_allow_extension);

                    require_once(ROOT_URL.'includes/image_edit/phpthumb/ThumbLib.inc.php');

                    $milliseconds = round(microtime(true) * 1000);
                    $temp_name = $milliseconds + $sku;

                    $destination_file_name =  "ph-" . $temp_name . "." . "jpg";
                    

                    $thumb_upload_dir = ROOT_URL . "tour_photos/";

                    $upload_dir = ROOT_URL . "tour_photos/";

          
                    $target_path = $upload_dir . $destination_file_name;
                    
                    move_uploaded_file($tmp, $target_path);
                
                    

                    // get exif data from the original image to fix orientation below
                    
                    $exif = exif_read_data($target_path, 0, true);
                    $thumb_orientation = (int)($thumb_exif['IFD0']['Orientation']);
                    $orientation = (int)($exif['IFD0']['Orientation']);

                    $img_allow_width = 600;
                    $img_allow_height = 600;
                    // Resize if image is too large
                    if ($orginal_width > $img_allow_width || $orginal_height > $img_allow_height) {
                      $thumb = PhpThumbFactory::create($target_path);
                      $thumb->resize($img_allow_width, $img_allow_height);
                      $thumb->save($target_path);
                    }

                    
                   

                    $thumb = PhpThumbFactory::create($target_path);
                    switch($orientation) {
                      case 0: // nothing
                      break;
                      
                      case 1: // nothing
                      break;
                      
                      case 3:
                        $thumb->rotateImageNDegrees(180);
                        $thumb->save($target_path);
                      break;
                      
                      case 6:
                        $thumb->rotateImageNDegrees(-90);
                        $thumb->save($target_path);
                      break;
                      
                      case 8:
                        $thumb->rotateImageNDegrees(90);
                        $thumb->save($target_path);
                      break;
                    }





                $photo = $_FILES['photo_2']['name'];
                $tmp = $_FILES['photo_2']['tmp_name'];
                $file_size = $_FILES['photo_2']['size'];

                  $image_info = getimagesize($_FILES['photo_2']['tmp_name']);
                  list($orginal_width, $orginal_height, $orginal_type, $orginal_attr) = $image_info;

                  $img_org_width = $image_info[0];
                  $img_org_height = $image_info[1];                      
                  $limit_file_size = 5000000; // 5MB to check

                  //$logic['obj'] -> check_photo_size($img_org_width,$img_org_height,$file_size,$limit_file_size);

                  $img_allow_extension = array("gif", "png", "jpg", "jpeg");
                  $mime = $image_info['mime'];
                  //$logic['obj'] -> check_photo_extension($mime,$file_extension,$img_allow_extension);

                    require_once(ROOT_URL.'includes/image_edit/phpthumb/ThumbLib.inc.php');

                    $milliseconds = round(microtime(true) * 1000);
                    $temp_name = $milliseconds + $sku;

                    $destination_file_name_2 =  "ph-" . $temp_name . "." . "jpg";
                    

                    $thumb_upload_dir = ROOT_URL . "tour_photos/";

                    $upload_dir = ROOT_URL . "tour_photos/";

          
                    $target_path = $upload_dir . $destination_file_name_2;
                    
                    move_uploaded_file($tmp, $target_path);
                
                    

                    // get exif data from the original image to fix orientation below
                    
                    $exif = exif_read_data($target_path, 0, true);
                    $thumb_orientation = (int)($thumb_exif['IFD0']['Orientation']);
                    $orientation = (int)($exif['IFD0']['Orientation']);

                    $img_allow_width = 600;
                    $img_allow_height = 600;
                    // Resize if image is too large
                    if ($orginal_width > $img_allow_width || $orginal_height > $img_allow_height) {
                      $thumb = PhpThumbFactory::create($target_path);
                      $thumb->resize($img_allow_width, $img_allow_height);
                      $thumb->save($target_path);
                    }

                    
                   

                    $thumb = PhpThumbFactory::create($target_path);
                    switch($orientation) {
                      case 0: // nothing
                      break;
                      
                      case 1: // nothing
                      break;
                      
                      case 3:
                        $thumb->rotateImageNDegrees(180);
                        $thumb->save($target_path);
                      break;
                      
                      case 6:
                        $thumb->rotateImageNDegrees(-90);
                        $thumb->save($target_path);
                      break;
                      
                      case 8:
                        $thumb->rotateImageNDegrees(90);
                        $thumb->save($target_path);
                      break;
                    }
                    


         $sql = " INSERT INTO tourpackage (name, type, car_id, destination_id, hotel_id, restaurant_id, itinerary, cost, photo, photo_2, detail_desc) values ('$name', '$type', '$car_id', '$destination_id', '$hotel_id', '$restaurant_id', '$itinerary', '$cost', '$destination_file_name', '$destination_file_name', '$detail_desc')";
 
            $result = mysqli_query($con, $sql);
            $rows = mysqli_affected_rows($con);
            if($rows > 0)
            {
                  header("location:" . ADMIN_TOUR_PACKAGES_LINK);
                  exit();
            }


      }
      require_once(ADMIN_ROOT_URL . "admin_files.php");
      
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>fileinput.css">
        <div class="content">
            <div class="container-fluid">

             <h1> New Tour Form</h1>
             <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="new_tour_form">
                  <div class="form-group">
                        
                  <label class="control-label">Tour Name</label>
                  <input type="text" name="name" placeholder="Please Enter Tour Name" class="form-control" required>
                  </div>
                  <div class="form-group">
                        
                  <label class="control-label">Tour Type</label>
                  <input type="text" name="type" placeholder="Please Enter Tour Type" class="form-control" required>
                  </div>


                    <div class="form-group">
                        
                  <label class="control-label">Choose Car</label>
                  <select class="form-control" name="car" >
                    <option value="" >Please Choose Car</option>
                    <?php

          $query = "SELECT * FROM car WHERE deleted = 0";
          $result = mysqli_query($con, $query);
          while ($car_arr = mysqli_fetch_assoc($result)) { 

                ?>
                <option value="<?php echo $car_arr["CarNo"]; ?>"><?php echo $car_arr["name"]; ?></option>
                <?php } ?>
                  </select>
                 
                  </div>



                  <div class="form-group">
                        
                  <label class="control-label">Choose Hotel</label>
                  <select class="form-control" name="hotel" >
                    <option value="" >Please Choose Hotel</option>
                    <?php

          $query = "SELECT * FROM hotel WHERE deleted = 0";
          $result = mysqli_query($con, $query);
          while ($hotel_arr = mysqli_fetch_assoc($result)) { 

                ?>
                <option value="<?php echo $hotel_arr["hotelno"]; ?>"><?php echo $hotel_arr["name"]; ?></option>
                <?php } ?>
                  </select>
                 
                  </div>


                  <div class="form-group">
                        
                  <label class="control-label">Choose Restaurant</label>
                  <select class="form-control" name="restaurant" >
                    <option value="" >Please Choose Restaurant</option>
                    <?php

          $query = "SELECT * FROM restaurant WHERE deleted = 0";
          $result = mysqli_query($con, $query);
          while ($restaurant_arr = mysqli_fetch_assoc($result)) { 

                ?>
                <option value="<?php echo $restaurant_arr["id"]; ?>"><?php echo $restaurant_arr["name"]; ?></option>
                <?php } ?>
                  </select>
                 
                  </div>



                  <div class="form-group">
                        
                  <label class="control-label">Choose Destination</label>
                  <select class="form-control" name="destination" >
                    <option value="" >Please Choose Destination</option>
                    <?php

          $query = "SELECT * FROM destination WHERE deleted = 0";
          $result = mysqli_query($con, $query);
          while ($destination_arr = mysqli_fetch_assoc($result)) { 

                ?>
                <option value="<?php echo $destination_arr["id"]; ?>"><?php echo $destination_arr["places"]; ?></option>
                <?php } ?>
                  </select>
                 
                  </div>


                   <div class="form-group">
                        
                  <label class="control-label">Tour Cost ( $ )</label>
                  <input type="number" name="cost" placeholder="Please Enter Tour Cost" class="form-control" required>
                  </div>

                  <div class="form-group">
                        
                  <label class="control-label">Itinerary</label>
                  <textarea  name="itinerary" placeholder="Please Enter Itinerary" class="form-control" required></textarea>
             </div>

              <div class="form-group">
                        
                  <label class="control-label">Detail Description</label>
                  <textarea style="min-height: 300px;"  name="detail_desc" placeholder="Please Enter Detail Description" class="form-control" required></textarea>
             </div>


                  
                  <div class="form-group">
                    <label class="control-label">Upload Tour Photo</label>
                    <input id="file-4" type="file" name="photo"  class="file-loading" required>
                  </div>
                   <div class="form-group">
                    <label class="control-label">Upload Another Photo</label>
                    <input id="file-5" type="file" name="photo_2"  class="file-loading" required>
                  </div>
                  <div class="form-group">
                        <button type="submit" class="btn btn-info">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
             </form>
                    </div>
      

      



</div>


<?php include(ADMIN_ROOT_URL . "admin_footer.php"); ?>


  
  
<script src="<?php echo JS_URL; ?>jquery.inputmask.bundle.js"></script>
<script src="<?php echo JS_URL; ?>inputmask/phone-codes/phone.js"></script>
<script src="<?php echo JS_URL; ?>scale.fix.js"></script>

<script src="<?php echo JS_URL;?>fileinput.js"></script>


<script type="text/javascript">
      jQuery(function(){


           $('#a_datetime').inputmask("datetime");
           $('#d_datetime').inputmask("datetime");


           jQuery("#file-4").fileinput({
        showCaption: false,
        minFileCount: 0,
        maxFileCount: 5,
        viewDetail: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "image",
        showUpload: false,
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        allowedFileExtensions: ["jpg", "png", "gif"]
        });

             jQuery("#file-5").fileinput({
        showCaption: false,
        minFileCount: 0,
        maxFileCount: 5,
        viewDetail: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "image",
        showUpload: false,
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        allowedFileExtensions: ["jpg", "png", "gif"]
        });



    });
        </script>