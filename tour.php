 <?php
 require_once("require_file.php");

        $id = (int)($_GET["id"]);
      $query = "SELECT * FROM tourpackage WHERE id = " . $id . " AND deleted = 0";
            $result = mysqli_query($con, $query);
       $tour_pack_arr = mysqli_fetch_assoc($result);
     
                $car_res = mysqli_query($con,"SELECT * FROM car WHERE CarNo = " . $tour_pack_arr["car_id"] );
                $hotel_res = mysqli_query($con,"SELECT * FROM hotel WHERE hotelno = " . $tour_pack_arr["hotel_id"] );
                $restaur_res = mysqli_query($con,"SELECT * FROM restaurant WHERE id = " . $tour_pack_arr["restaurant_id"] );
                $dest_res = mysqli_query($con,"SELECT * FROM destination WHERE id = " . $tour_pack_arr["destination_id"] );
                 $car_arr = mysqli_fetch_assoc($car_res);
                 $hotel_arr = mysqli_fetch_assoc($hotel_res);
                 $restaur_arr = mysqli_fetch_assoc($restaur_res);
                 $dest_arr = mysqli_fetch_assoc($dest_res);
           
                 $destination = $dest_arr["places"];
                 $duration = $dest_arr["duration"];

                 $name =  $tour_pack_arr["name"];
            $type =  $tour_pack_arr["type"];
            $car_id =  $tour_pack_arr["car_id"];
            $hotel_id =  $tour_pack_arr["hotel_id"];
            $restaurant_id =  $tour_pack_arr["restaurant_id"];
            $destination_id =  $tour_pack_arr["destination_id"];
            $itinerary =  $tour_pack_arr["itinerary"];
            $detail_desc =  $tour_pack_arr["detail_desc"];
            $cost =  $tour_pack_arr["cost"];

            $arrival = $tour_pack_arr["arrival_datetime"];
            $departure = $tour_pack_arr["departure_datetime"];
            $departure = reformat_datetime($departure);
            $arrival = reformat_datetime($arrival);
            $photo = $tour_pack_arr["photo"];
            $photo_2 = $tour_pack_arr["photo_2"];

  $page_title  = $name;


  require("client_files.php");
  ?>
  <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>bootstrap-dialog.min.css">
  <div class="clearfix" style="margin-top: 10px;"></div>


<section class="zo2-row-wrapper zo2-no-class"><section class="container visible-xs visible-sm visible-md visible-lg"><section class="row"><!-- build column: message -->

<!-- jdoc: modules - position: message --><section id="message" class="zo2-col col-sm-12 col-xs-12 content col-md-12 visible-xs visible-sm visible-md visible-lg"><div id="system-message-container">
    </div>
<!-- build row: Component -->

<section id="component" class="zo2-row-wrapper zo2-no-class"><section class="visible-xs visible-sm visible-md visible-lg"><section class="row"><!-- build column: component -->

<!-- jdoc: modules - position: component --><section class="zo2-col zo2-no-class col-md-12 visible-xs visible-sm visible-md visible-lg"><div class="item-page">
            <div class="page-header">
        <h3 style="font-size: 2em;">
                <?php echo $name; ?>                                </h3>
    </div>
        


        
    <!-- Wrapper for slides -->
    <div class="image-container">
        
        <center>
            <img src="<?php echo PHOTO_URL . $photo; ?>" style="display: inline-block;">

         
            <?php if(!empty($photo_2))
            {
                ?>
                <img src="<?php echo PHOTO_URL . $photo_2; ?>" style="display: inline-block;">
            <?php  } ?>
        </center>
    </div>
    
</div>

<div style="clear: both;">&nbsp;</div>
<p><span style="color: #a22faf;font-size: 1.5em;"><strong>Destination: <?php echo $destination; ?></strong></span><br /><span style="color: #a22faf;font-size: 1.5em;"><strong>Duration: <?php echo $duration; ?></strong></span></p>
<p style="font-size: 2em;"> Price : $<?php echo $cost; ?></p>
<p style="text-align: justify;"><?php echo $dest_desc; ?></p>
<p>&nbsp;</p>
<table style="width: 100%;">
<tbody>
<tr>

<td style="text-align: right;"><a id="book_tour" class="btn" style="color:#fff;background:#818eb1;" >Book this tour</a></td>


</tr>
<tr>

<td><h3 style="font-size: 2em;color:#000;"><strong>Itinerary</strong></h3>

    <p><?php echo $itinerary; ?></p>
</td>
</tr>
<tr>
<td>
    <h3 style="font-size: 2em;color:#000;"><strong>Tour Description</strong></h3>

    <p><?php echo $detail_desc; ?></p>
</td>


</tr>

</tbody>
</table>
<p>&nbsp;</p>
<p>
</p>
</div>
</section>

  <?php
  include(INC_URL . "footer.php");?>
<script type="text/javascript" src="<?php echo JS_URL; ?>bootstrap-dialog.min.js"></script>
<script src="<?php echo JS_URL; ?>jquery.inputmask.bundle.js"></script>
<script src="<?php echo JS_URL; ?>scale.fix.js"></script>


<script type="text/javascript">
    jQuery("#book_tour").on("click", function (){


    BootstrapDialog.show({
            title: 'Book Tour',
            message: '<form id="submit_booking">' +
                   ' <div class="form-group">' +
                        '<label class="control-label"> Number of Passengers</label>' +
                        '<input type="hidden" name="id" value="<?php echo $id; ?>">' +
                        '<input type="number" name="passengers" min = "1" max="100" class="form-control" required>' +
                        '</div>' +
                         ' <div class="form-group" >' +
                        '<label class="control-label"> Departure Datetime</label>' +
                        '<input type="text" id="d_datetime" name="departure" onfocus="jQuery(this).start_mask();" class="form-control" required>' +
                        '</div>'+
                        
                    '</form>',
            buttons: [{
                label: 'Book',
                cssClass: 'btn-primary',
                hotkey: 13, // Enter.
                action: function(dialogItself) {
                    form_id = "#submit_booking";
                    package_id = jQuery(form_id + " input[name='id']").val();
                    pass_no = jQuery(form_id + " input[name='passengers']").val();
                    departure = jQuery(form_id + " input[name='departure']").val();
                    if(pass_no == "" || departure == "")
                    {
                        alert("Please Fill All The Fields.");
                        return false;
                    }
                    jQuery.ajax({
                        url : "<?php echo BASE_URL; ?>submit_tour.php",
                        type : "post",
                        data : { "role" : "submit_tour", "pass_no" : pass_no, "package_id" : package_id, "departure" : departure },
                        success : function (result)
                        {
                            if(result.err == 1)
                            {
                             dialogItself.close();
                             var dialogInstance2 = new BootstrapDialog();
                            dialogInstance2.setTitle('Need to be a memeber to Book');
                            dialogInstance2.setMessage(result.msg);
                            dialogInstance2.setType(BootstrapDialog.TYPE_SUCCESS);
                            dialogInstance2.open();
                            }
                            else
                            {
                                dialogItself.close();
                             var dialogInstance2 = new BootstrapDialog();
                            dialogInstance2.setTitle('Booking Success');
                            dialogInstance2.setMessage(result.msg);
                            dialogInstance2.setType(BootstrapDialog.TYPE_SUCCESS);
                            dialogInstance2.open();
                            }
                        },
                        dataType : "json"
                    });

                }
            },
            {
                label: 'Close',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]

        });

    jQuery.fn.start_mask = function ()
    {

    
           jQuery("#d_datetime").inputmask("datetime");
    }
        });
</script>