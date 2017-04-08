<?php
    /*
     *
     * @author Apeksha Gothawal, Arpita Karkera,Sunaina Punyani
     * @date 19 December, 2016
     *
     * Event page. Shows details of particular event.
     *
     */

    // authenticate
    require_once(__DIR__ .'/../includes/authenticate.php');

    if (isset($_GET['event'])) {

        // connect to database
        require_once(__DIR__ .'/../includes/dbconfig.php');

        $event_id = mysqli_real_escape_string($dbc, trim($_GET['event']));

        // get event details  from db for given event id
        $query = "SELECT ev.event_name, ev.description, ev.start_date, ev.end_date, ev.start_time, ev.end_time, ev.venue, ev.banner, cat.category_name, com.committee_name, ev.incharge1_name, ev.incharge1_contact, ev.incharge2_name, ev.incharge2_contact, ev.cost, ev.refreshment, ev.note FROM events as ev INNER JOIN categories as cat ON ev.category = cat.category_id INNER JOIN committees as com ON ev.committee = com.committee_id WHERE ev.event_id = $event_id";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) == 1) {
            $event = mysqli_fetch_array($result);
            $query = "SELECT registration_id FROM registrations WHERE user_id = ".$_SESSION['user_id']." AND event_id = ".$event_id;
            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) == 1)
              $registered = true;
            else
              $registered = false;
            $filename = "../banners/".str_pad($event_id, 4, 0, STR_PAD_LEFT).$event['banner'];
			
            if (file_exists($filename)) {
              $source = $filename;
            }
            else {
              $source = "../banners/cover_default.png";
            }
        }
        else
            exit('Event does not exist.');

    }
    else
        exit('Error: event not specified.');

    // render header
    $title = 'Event';
    require_once(__DIR__ .'/../includes/header.php');
?>

  <div class="container" style="padding-bottom:0%;">
  <div class="row">
    <div class="col-sm-6">
      <p style="color: gray;">EV<?php echo htmlspecialchars(str_pad($event_id, 3, '0', STR_PAD_LEFT)); ?></p>
      <p style="max-width: 100px; vertical-align: middle; background-color: rgb(205,234,254); border-radius: 5px; padding: 0.5%; text-align: center;"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;<?php echo htmlspecialchars($event['category_name']); ?></p>
      <h2 style="font-family: 'Raleway', sans-serif;"><?php echo htmlspecialchars($event['event_name']); ?></h2>
      <p>by <?php echo htmlspecialchars($event['committee_name']); ?></p>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-2" style="padding-top:8%;">
      <?php
        if ($registered) {
      ?>
          <button type="button" class="btn btn-primary">Registered</button>
      <?php
        } else {
      ?>
          <a href="../controls/register.php?event=<?php echo htmlspecialchars($event_id); ?>"><button type="button" class="btn btn-primary">Register</button></a>
      <?php
        }
      ?>
      </div>
    </div>  
    </div>
<br>
<?php
/*
  $filename = "../banners/".str_pad($event_id, 3, 0, STR_PAD_LEFT).".jpg";
  if (file_exists($filename)) {
    $source = $filename;
  }
  else {
    $source = "../banners/event_default.jpg";
  }
  */
?>
    <div class="container" style="padding-top:1%;padding-bottom:0%;">
        <img src="<?php echo $source; ?>" class="img-responsive" style="margin: auto;">
    </div>
    <br>
    <div class="container" style="padding-top:2%;">
    <div class="row">
    
    <div class="col-sm-4">
    <div class="schedule">
          <p style="font-size:15px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;
          <?php 
            if (empty($event['end_date'])) 
                echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))); 
            else 
                echo htmlspecialchars(date('d M, Y', strtotime($event['start_date']))).' - '.htmlspecialchars(date('d M, Y', strtotime($event['end_date']))); 
          ?></p>
          <p style="font-size:15px;"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;
          <?php
            if (empty($event['end_time']))
                echo htmlspecialchars(date('H:i A', strtotime($event['start_time'])));
            else
                echo htmlspecialchars(date('H:i A', strtotime($event['start_time']))).' - '.htmlspecialchars(date('H:i A', strtotime($event['end_time'])));;
          ?></p>
          <p style="font-size:15px;"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;
          <?php
            echo htmlspecialchars($event['venue']);
          ?></p>
          
      
    </div>
    <br>
    <?php
        if ($registered) {
      ?>
          <button type="button" class="btn btn-primary">Registered</button>
      <?php
        } else {
      ?>
          <a href="../controls/register.php?event=<?php echo htmlentities($event_id); ?>"><button type="button" class="btn btn-primary">Register</button></a>
      <?php
        }
      ?>
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-6" >
       <div style="float:right;"> 
        <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
        <p>Regitration Fee: 
        <?php
          if ($event['cost'] == 0)
            echo 'FREE';
          else
            echo 'Rs. '.$event['cost'];
        ?>
        </p>
        <p>Refereshments: 
        <?php
          if ($event['refreshment'] == 0)
            echo 'No';
          else
            echo 'Yes';
        ?>
        </p>
        <p>
          For any queries contact event incharge(s):
          <br>
          <?php
            echo $event['incharge1_name']." - ".$event['incharge1_contact'];
            if (!empty($event['incharge2_name']))
              echo "<br>".$event['incharge2_name']." - ".$event['incharge2_contact'];
          ?>
        </p>
        <?php if (!empty($event['note'])) { ?>
          <p><span>Note</span><br><?php echo htmlspecialchars($event['note']); ?></p>
        <?php }?>
    </div>
    </div>
    </div>
    </div>
    
    
  
<?php
  require_once(__DIR__ . '/../includes/footer.php');
?>