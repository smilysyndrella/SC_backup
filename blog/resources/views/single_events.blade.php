	
	

	<link href="<?php echo URL::asset('/css/meetup_style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo URL::asset('/bootstrap.3.3.6/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"><link href="<?php echo URL::asset('/css/animate.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo URL::asset('/font-awesome.4.6.1/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

<?php
$date=date('jS F Y',strtotime($events['event_date']));
$time=$events['event_time'];
$events_cost_for_attending_paid=$events['event_cost'];
$events_venue=$events['event_venue'];
$the_content=$events['event_content'];


 ?>
	
<section class="full">
	<div class="container event_single">
		<div class="row">	

			</div>	
			<div class="col-md-12 col-sm-12>">
				<div class="article-body">
				
				<h1>{{ $events['event_title'] }}</h1>
				<div class="row highligh_row" >
					<?php
					if(!empty($date)){ ?>							  	
						<p class="event_title"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="event_info"><?php echo $date; ?></span></p>
						 <?php }
					?>

					<?php 
					if(!empty($time)){ ?>
			            <p class="event_title event_time"><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="econtents"><?php echo $time; ?></span></p>
			            <?php }
			            ?>

					<?php
					if(!empty($events_cost_for_attending_paid)){ ?>
			            <p class="rate_single"><i class="event-irupee">&#x20B9;</i><?php echo $events_cost_for_attending_paid; ?></p>
			            <?php }
			            else{ ?>
			            	<p class="rate_single"> Free</p>
			            <?php }
					?>	
					<p class="rate_single" data-post="" data-cost="<?php echo '200' ?>" onclick="buy_ticket(this)">RSVP</p>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<?php 
						if(!empty($events_venue)){ ?>
				            <p class="venue_details"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> <span class="econtents"><?php echo $events_venue; ?></span></p>
				            <?php } ?>	     
			        </div>
			       
			    </div>
			         <hr>
			          <div class="col-md-12">
				        <?php
				        	echo $the_content;
				         ?> 
				    </div> 
				    <hr>   
				    <div style="text-align:center;" >
				    <button data-post="" data-toggle="modal" data-target="#myModal" data-cost="<?php echo '200'; ?>" class="view_all_btn hvr-underline-from-center" >RSVP</button>
			        </div>
			       
			       
			        	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			

				</div><!--end of article snippet-->
			</div>
			
		</div>
	
	
</section>



