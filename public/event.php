<?php
    /*
     *
     * @author Apeksha Gothawal, Arpita Karkera
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
        $query = "SELECT ev.event_name, ev.description, ev.start_date, ev.end_date, ev.start_time, ev.end_time, ev.venue, cat.category_name, com.committee_name, ev.incharge1_name, ev.incharge1_contact, ev.incharge2_name, ev.incharge2_contact, ev.cost, ev.refreshment, ev.note FROM events as ev INNER JOIN categories as cat ON ev.category = cat.category_id INNER JOIN committees as com ON ev.committee = com.committee_id WHERE ev.event_id = $event_id";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) == 1) {
            $event = mysqli_fetch_array($result);
            $query = "SELECT count(*) FROM registrations WHERE user_id = ".$_SESSION['user_id']." AND event_id = ".$_SESSION['event_id'];
            $result = mysqli_query($dbc, $query);
            if ($result == 1)
              $registered = true;
            else
              $registered = false;
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

  <div class="container">
    <div>
      <p>EV<?php echo htmlspecialchars(str_pad($event_id, 3, '0', STR_PAD_LEFT)); ?><span style="float: right; vertical-align: middle; background-color: rgb(205,234,254); border-radius: 5px; padding: 0.5%;"><span class="glyphicon glyphicon-tag"></span><?php echo htmlspecialchars($event['category_name']); ?></span></p>
      <?php
        if ($registered) {
      ?>
          <button type="button" class="btn btn-primary" style="float: right;">Registered</button>
      <?php
        } else {
      ?>
          <a href="../controls/register.php"><button type="button" class="btn btn-primary" style="float: right;">Register</button></a>
      <?php
        }
      ?>
      <h2><?php echo htmlspecialchars($event[event_name]); ?></h2>
      <p>by <?php echo htmlspecialchars($event['committee_name']); ?></p>
    </div>
    <div>
        <img src="<?php echo '../images/'.str_pad($event_id, 3, 0, STR_PAD_LEFT).'.jpg'; ?>">
    </div>
    <div class="description">
        <p><?php echo htmlspecialchars($event['description']); ?></p>
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
        <p><span>Note</span><br><?php echo htmlspecialchars($event['note']); ?></p>
    </div>
    <div>
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
          <button type="button" class="btn btn-primary" style="max-width: 300px;">Registered</button>
      <?php
        } else {
      ?>
          <a href="../controls/register.php"><button type="button" class="btn btn-primary" style="max-width: 300px;">Register</button></a>
      <?php
        }
      ?>
    </div>
  </div>
<?php
  require_once(__DIR__ . '/../includes/footer.php');
?>