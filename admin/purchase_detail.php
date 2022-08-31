<?php
	
	require_once("../require_file.php");
    require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "PURCHASE DETAIL";
    $parent_page = "PURCHASE MANAGEMENT";
    $id = (int)($_GET["id"]);
    if($_REQUEST["role"] == "update_stat")
    {
        $stat = $_REQUEST["stat"];
      $sql = "UPDATE booking SET  status = '" . $stat . "' WHERE id = " . $id;
   
        $result = mysqli_query($con,$sql);
        if($result > 0)
        {
            header("location:" . ADMIN_PURCHASE_DETAIL_LINK . "?id=" . $id);
            exit();
        }


    }
	
    

    
   
    $query = "SELECT * FROM booking WHERE id = " . $id . " AND deleted = 0 ORDER BY id DESC";
            $result = mysqli_query($con, $query);
            $booking_arr = mysqli_fetch_assoc($result);

                $package_id = $booking_arr["package_id"];
                $user_id = $booking_arr["user_id"];
                $passengers = $booking_arr["passengers"];
                $status = $booking_arr["status"];
                $departure = $booking_arr["departure"];
                $Departure = reformat_datetime($departure);
                switch($status)
                {
                    case "Paid":
                    $paid_status = "PayPal";
                    break;
                    default: 
                    $paid_status = "Not Available";
                    break;
                }
               
            $pack_res = mysqli_query($con, "SELECT * FROM tourpackage WHERE id = " . $package_id . " AND deleted = 0");

            $pack_arr = mysqli_fetch_assoc($pack_res);
            $package_name = $pack_arr["name"];


              $user_res = mysqli_query($con, "SELECT * FROM customer WHERE id = " . $user_id . " AND deleted = 0");

            $user_arr = mysqli_fetch_assoc($user_res);
            $customer = $user_arr["name"];
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	?>
    <div class="content">

            <div class="container-fluid">
                 <h2>PURCHASE DETAIL (Booking No. <?php echo $id; ?> )</h2>

                 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><a href="<?php echo  ADMIN_PURCHASE_MANAGE_LINK; ?>">&laquo; Back To Purchase List</a></h4>

                            
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                   
                                    <tbody>
                                        <tr>
                                            <td>Customer Name</td>
                                            <td><?php echo $customer; ?></td>
                                           
                                   
                                        </tr>
                                        <tr>
                                            <td>Package Name</td>
                                            <td><a target="__blank" href="<?php echo CLIENT_TOUR_LINK . "?id=" . $package_id; ?>"><?php echo $package_name; ?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                            <td>Num of Passengers</td>
                                            <td><?php echo $passengers; ?></td>
                                           
                                   
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <select onchange="window.location.href='<?php echo ADMIN_PURCHASE_DETAIL_LINK . "?id=" . $id . "&role=update_stat&stat="; ?>' + jQuery(this).val();"  >
                                                    <option <?php if($status == "Booking"){ echo "selected"; } ?>>Booking</option>
                                                    <option <?php if($status == "Pending"){ echo "selected"; } ?>>Pending</option>
                                                    <option  <?php if($status == "Paid"){ echo "selected"; } ?> >Paid</option>
                                                    <option <?php if($status == "Canceled"){ echo "selected"; } ?>>Canceled</option>
                                                </select>
                                            </td>
                                            
                                          
                                        </tr>
                                         <tr>
                                            <td>Paid By</td>
                                            <td><?php echo $paid_status; ?></td>
                                           
                                   
                                        </tr>
                                        <tr>
                                            <td>Departure</td>
                                            <td><?php echo reformat_datetime($departure); ?></td>
                                           
                                   
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    


                </div>

             </div>
         </div>
    <?php 

    require_once(ADMIN_ROOT_URL . "admin_footer.php");