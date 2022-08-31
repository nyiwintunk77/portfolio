<?php 
  require_once("require_file.php");

  $keyword = $_GET["keyword"];
    $page_title = $keyword;
  require("client_files.php");
  ?>

<div style="margin-top: 10px"></div>
<div class="container">

<!-- jdoc: modules - position: component --><section class="zo2-col zo2-no-class col-md-12 visible-xs visible-sm visible-md visible-lg"><div class="item-page">
  <nav aria-label="breadcrumb" role="navigation" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
  </ol>
</nav>
			<div class="page-header">


<div class="custom"  >
  <h3 class="moduletitle" style="padding:10px;text-align: center;"><span>Search Results For "<?php echo $keyword; ?>"</span></h3>
<?php
 $query = "SELECT tp.* FROM tourpackage tp, destination d WHERE tp.destination_id = d.id AND (d.places LIKE '%" . $keyword . "%' || tp.name LIKE '%" . $keyword . "%') AND d.deleted = 0 ORDER BY tp.id DESC LIMIT 8";

            $result = mysqli_query($con, $query);
            $affected_rows  = mysqli_affected_rows($con);
      if($affected_rows >= 1)
      {
            while ($tour_pack_arr = mysqli_fetch_assoc($result)) { 
                $car_res = mysqli_query($con,"SELECT * FROM car WHERE CarNo = " . $tour_pack_arr["car_id"] );
                $hotel_res = mysqli_query($con,"SELECT * FROM hotel WHERE hotelno = " . $tour_pack_arr["hotel_id"] );
                $restaur_res = mysqli_query($con,"SELECT * FROM restaurant WHERE id = " . $tour_pack_arr["restaurant_id"] );
                 $car_arr = mysqli_fetch_assoc($car_res);
                 $hotel_arr = mysqli_fetch_assoc($hotel_res);
                 $restaur_arr = mysqli_fetch_assoc($restaur_res);
?>
<div class="col-md-3">
<div class="htu">
<h3><a href="<?php echo CLIENT_TOUR_LINK . "?id=" . $tour_pack_arr["id"]; ?>"><?php echo $tour_pack_arr["name"]; ?></a><br /><br /></h3>
</div>
<div class="bimg"><img src="<?php echo PHOTO_URL . $tour_pack_arr["photo"]; ?>" alt="glimpse-01" /></div>
<div class="htu" style="text-align: justify;"><?php echo $tour_pack_arr["itinerary"]; ?>
<p style="text-align: right;"><a href="<?php echo CLIENT_TOUR_LINK . "?id=" . $tour_pack_arr["id"]; ?>">Read More</a></p>
</div>
</div>
<?php } 
}
else
  { ?>

    <div class="alert alert-danger text-center">
      OOps! No result for "<?php echo $keyword; ?>"
    </div>
<?php } ?>
<div style="clear: both;"><br /><br /></div></div>


</div>
</div>
</section>
<?php 
     include(INC_URL . "footer.php"); ?>