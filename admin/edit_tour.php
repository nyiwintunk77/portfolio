<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit Tour";
      $parent_page = "TOUR PACKAGES";
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM tourpackage WHERE id = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $tour_arr = mysqli_fetch_assoc($result);

            $name =  $tour_arr["name"];
            $type =  $tour_arr["type"];
            $car_id =  $tour_arr["car_id"];
            $hotel_id =  $tour_arr["hotel_id"];
            $restaurant_id =  $tour_arr["restaurant_id"];
            $destination_id =  $tour_arr["destination_id"];
            $itinerary =  $tour_arr["itinerary"];
            $detail_desc =  $tour_arr["detail_desc"];
            $cost =  $tour_arr["cost"];

      
  
            $photo = $tour_arr["photo"];


          $preview =   "initialPreview: [
                                    '" . PHOTO_URL . $photo . "'
                                    ],
                                     initialPreviewConfig: [
                                    {caption: '" . $photo . "',  width: '120px', key: 1, showZoom: false, showDelete: false},
            
                                    ],
                                    initialPreviewAsData: true,";



                                    $photo_2 = $tour_arr["photo_2"];

          if(!empty($photo_2))
          {
          $preview_2 =   "initialPreview: [
                                    '" . PHOTO_URL . $photo_2 . "'
                                    ],
                                     initialPreviewConfig: [
                                    {caption: '" . $photo_2 . "',  width: '120px', key: 1, showZoom: false, showDelete: false},
            
                                    ],
                                    initialPreviewAsData: true,";
                                  }

	if(isset($_REQUEST["tour_update_form"]))
	{
            $id = (int)($_GET['id']);
            $name = mysqli_real_escape_string($con,$_REQUEST["name"]);
            $type = mysqli_real_escape_string($con,$_REQUEST["type"]);
            $car_id = mysqli_real_escape_string($con,$_REQUEST["car"]);
            $destination_id = mysqli_real_escape_string($con,$_REQUEST["destination"]);
            $hotel_id = mysqli_real_escape_string($con,$_REQUEST["hotel"]);
            $restaurant_id = mysqli_real_escape_string($con,$_REQUEST["restaurant"]);
            $itinerary = mysqli_real_escape_string($con,$_REQUEST["itinerary"]);
            $cost = mysqli_real_escape_string($con,$_REQUEST["cost"]);

           
            $detail_desc = mysqli_real_escape_string($con,$_REQUEST["detail_desc"]);
       
            




             if(!empty($_FILES['photo']['name']))
             {
             //$file_extension = $logic['obj'] -> find_extension($photo);
                $photo = $_FILES['photo']['name'];

               echo $tmp = $_FILES['photo']['tmp_name'];
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
                    $photo_sql = ", photo = '$destination_file_name'";
              }


               if(!empty($_FILES['photo_2']['name']))
             {
             //$file_extension = $logic['obj'] -> find_extension($photo);
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
                    $photo_2_sql = ", photo_2 = '$destination_file_name'";
              }
              

		 $sql = " UPDATE tourpackage SET name = '$name', type = '$type', car_id = '$car_id', hotel_id = '$hotel_id', restaurant_id = '$restaurant_id', destination_id = '$destination_id', itinerary = '$itinerary', cost = '$cost', detail_desc = '$detail_desc' " . $photo_sql . $photo_2_sql . " WHERE id = " . $id;
	   
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
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

             <h1> Edit Tour Form</h1>
             <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="tour_update_form">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                        
                  <label class="control-label">Tour Name</label>
                  <input type="text" name="name" placeholder="Please Enter Tour Name" value="<?php echo $name; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                        
                  <label class="control-label">Tour Type</label>
                  <input type="text" name="type" placeholder="Please Enter Tour Type" value="<?php echo $type; ?>" class="form-control" required>
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
                <option value="<?php echo $car_arr["CarNo"]; ?>" <?php if($car_arr['CarNo'] == $car_id){ echo "selected"; } ?>><?php echo $car_arr["name"]; ?></option>
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
                <option value="<?php echo $hotel_arr["hotelno"]; ?>" <?php if($hotel_arr['hotelno'] == $hotel_id){ echo "selected"; } ?>><?php echo $hotel_arr["name"]; ?></option>
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
                <option value="<?php echo $restaurant_arr["id"]; ?>" <?php if($restaurant_arr['id'] == $restaurant_id){ echo "selected"; } ?>><?php echo $restaurant_arr["name"]; ?></option>
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
                <option value="<?php echo $destination_arr["id"]; ?>" <?php if($destination_arr['id'] == $destination_id){ echo "selected"; } ?>><?php echo $destination_arr["places"]; ?></option>
                <?php } ?>
                  </select>
                 
                  </div>


                   <div class="form-group">
                        
                  <label class="control-label">Tour Cost ( $ )</label>
                  <input type="number" name="cost" value="<?php echo $cost; ?>" placeholder="Please Enter Tour Cost" class="form-control" required>
                  </div>

                  <div class="form-group">
                        
                  <label class="control-label">Itinerary</label>
                  <textarea  name="itinerary" placeholder="Please Enter Itinerary" class="form-control" required><?php echo $itinerary; ?>
                  </textarea>
             </div>
             <div class="form-group">
                        
                  <label class="control-label">Detail Description</label>
                  <textarea style="min-height: 300px;"  name="detail_desc" placeholder="Please Enter Detail Description" class="form-control" required><?php echo $detail_desc; ?></textarea>
             </div>
                 
                  <div class="form-group">
                    <label class="control-label">Upload Tour Photo</label>
                    <input id="file-4" type="file" name="photo"  class="file-loading" >
                  </div>
                  <div class="form-group">
                    <label class="control-label">Upload Another Photo</label>
                    <input id="file-5" type="file" name="photo_2"  class="file-loading" >
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
        <?php echo  $preview; ?>
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
        <?php echo  $preview_2; ?>
        allowedFileExtensions: ["jpg", "png", "gif"]
        });


    });
        </script>