<!DOCTYPE html>

<?php 
include('../dbconnect.php');
session_start();
if(!isset($_SESSION['accessgranted']))
{
  header("location:../login.php");
}

$id = $_SESSION['userid'];
$querry = mysql_query("SELECT * FROM accounts where user_id = $id");
while($rows = mysql_fetch_assoc($querry))
{
  $_SESSION['fname'] = $rows['fname'];
}
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Charts - SB Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Add custom CSS here -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

  <!-- Datepicker -->
  <link href="../datepicker/foundation-datepicker.css" rel="stylesheet">
  <script src="../datepicker/foundation-datepicker.js"></script>

  <!-- Data tables -->
  <link rel="stylesheet" type="text/css" href="css/media/css/jquery.dataTables.css">

  <script type="text/javascript" language="javascript" src="css/media/js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="css/media/js/jquery.dataTables.js"></script>
  <script>

  $(document).ready(function() 
  {
    $('#examples1').dataTable();
  } 
  );

  </script>

</head>

<body>
  <?php
      $NumOfOrdersRightNow = 500; // this is the business rule 500 is the limit for 15 days
      $baseAddtoDate = 14;        // this is the base

      $sql = "SELECT * FROM product_orders where status = 1"; // count the number of active orders
      $result = mysql_query($sql);
      $numberOfRows = mysql_num_rows($result);
      if($numberOfRows == 0)      // if 0 make it + 1;
      {
        $numberOfRows = 1;
      }

      $addToBase = ceil($numberOfRows / 500); // round off the number;

      $addToDate = $baseAddtoDate + $addToBase; 
      echo "<input type='hidden' name='addtodate' id='addtodate' value='$addToDate'>";
      ?>

      <?php @include('admin-header.php'); ?> <!-- Include header -->

      <div style="margin-left:18%; margin-top:5%">
        <h2> Orders </h2>

        <ul id="myTab" class="nav nav-tabs" >
          <li class="active"><a href="#service-one" data-toggle="tab">Customer Orders</a></li>
          <li><a href="#service-two" data-toggle="tab">Accepted Orders</a></li>
          <li><a href="#service-three" data-toggle="tab">Paid Orders</a></li>
          <li><a href="#service-four" data-toggle="tab">Order history</a></li>
        </ul>
      </div>

      <div class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
              <p>One fine body</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div id="myTabContent" class="tab-content" style="padding-left: 18%; padding-top:20px; padding-right:20px;">
            <div class="tab-pane fade in active" id="service-one">
              <table  id="examples1"  class="table table-hover" align="right" id="example" width="100%" >
                <th align="center">Customer Name <i class="fa fa-sort"></i></th>
                <th align="center">Product Information<i class="fa fa-sort"></i></th>
                <th colspan="2" align="center"> ACTION </th> 

                <?php
                $q = mysql_query("SELECT * FROM product_orders where status = 0");
                while($rows = mysql_fetch_assoc($q))
                {
                  $id = $rows['oid'];
                  $product = $rows['product'];
                  $date = $rows['date'];
                  $status = $rows['status'];
                  $custnum = $rows['customer_num'];
                  $price = $rows['tprice'];

                  $sequerry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                  while($r = mysql_fetch_assoc($sequerry))
                  { 
                    $fnames = $r['fname'];
                    $lnames = $r['lname'];
                  }

                  echo '<tr>';
                  echo '<td>'.$lnames.' '.$fnames.'</td>';
                  echo '<td>'.$product.'Total Price:'.$price.'</td>';
                  if($status == '1')
                  {
                    echo '<td>'.'<a href=activated.php?id='.$id.'>VIEW TRANSACTION NUMBER</a>'.'</td>';
                  }
                  else if($status =='0')
                  {
                    echo '<td>'.'<a  href=decline.php?id='.$id.'>DECLINE</a>'.'</td>';
                    echo '<td>'.'<a href=accept.php?id='.$id.'>ACCEPT</a>'.'</td>';
                  }
                  echo '</tr>';
                }
                ?>
              </table>
            </div> <!-- End of Service One -->

            <div class="tab-pane fade" id="service-two">
              <table class="table table-hover" align="right" width="100%" >
                <th>Customer Name </th>  
                <th>Order Details </th>   
                <center> <th >Transaction No. </th> </center>
                <center> <th >Expiration Date </th> </center>
                <th>Action</th> 
                <?php
                $qqquerry = mysql_query("SELECT * FROM product_orders where status='1'");
                while($rows = mysql_fetch_assoc($qqquerry))
                {
                  $prod = $rows['product'];
                  $price = $rows['tprice'];
                  $stat = $rows['status'];
                  $trans = $rows['trans_num'];
                  $id = $rows['oid'];
                  $date = $rows['date'];
                  $custnum = $rows['customer_num'];

                  $qqueerry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                  while($rowss = mysql_fetch_assoc($qqueerry))
                  { 
                    $fname = $rowss['fname'];
                    $lname = $rowss['lname'];
                  }

                  echo '<tr>';
                  echo '<td>'.$fname.' '.$lname.'</td>';
                  echo '<td>'.$prod.'Total Price:'.$price.'</td>';
                  echo '<td>'.$trans.'</td>';
                  ?>

                  <td>
                   <form action="paid.php?id=<?php echo $id?>" method="POST">
                    <div class='input-daterange input-group' id='datepicker' data-date='{{ date('Y-m-d') }}T' data-date-format='yyyy-mm-dd'>
                      <input type='text' class='form-control' name='end' value='' id='dpd2' style='text-align: center'  placeholder='Input Release Date' onchange='checkInput(this.value,this.id)' value='dsd'>
                    </div>
                  </td>

                  <td>

                    <div class="form-group col-md-9">
                      <div class="input-daterange input-group" id="datepicker" data-date="{{ date('Y-m-d') }}T" data-date-format="yyyy-mm-dd"  style="display:none;">
                        <input type="text" class="form-control" name="start" value="" id="dpd1" style="text-align: center" placeholder="Click to select date" onchange="checkInput(this.value,this.id)">
                      </div>
                    </div>

                    <input type="submit" value="PAID" name="submit" class="btn btn-success"/>
                  </form>
                </td>
                <?php
                echo '</tr>';
              }
              ?>
            </table>
          </div> <!-- End of Service Two-->

          <div class="tab-pane fade" id="service-three">
            <table id="examples3" class="table table-hover" align="right" width="100%" >
              <thead>
                <th>Customer Name </th>  
                <th>Order Details </th>   
                <th>Release Date </th>
                <th>ACTION</th> 
              </thead>
              <?php

              $querrry = mysql_query("SELECT * FROM product_orders where status='2'");
              while($rowss = mysql_fetch_assoc($querrry))
              {
                $prod = $rowss['product'];
                $price = $rowss['tprice'];
                $stat = $rowss['status'];
                $trans = $rowss['trans_num'];
                $id = $rowss['oid'];
                $date = $rowss['date'];
                $custnum = $rowss['customer_num'];


                $queerrry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                while($rowsss = mysql_fetch_assoc($queerrry))
                { 
                  $fname = $rowsss['fname'];
                  $lname = $rowsss['lname'];
                }
                echo '<tr>';


                echo '<td>'.$fname.' '.$lname.'</td>';
                echo '<td>'.$prod.'Total Price:'.$price.'</td>';
                echo '<td> </td>';

                ?>

                <td>
                  <form action=" " method="POST">

                    <input type="submit" value="Finish" name="finish" class="btn btn-success"/>

                  </form>
                </td>
                <?php
                echo '</tr>';


                if(isset($_POST['finish'])){ 
                  mysql_query("UPDATE product_orders set status='3' ,date=NOW() WHERE oid = $id");
                  mysql_query("INSERT INTO order_history set customer_num='$custnum',product='$prod',date_ordered='$date',date_finished='NOW()',price='$price'");

                }


              }         
              ?>


            </table>
          </div> <!-- End of Service Three -->

          <div class="tab-pane fade" id="service-four">
            <table id="examples4" class="table table-hover" align="right" width="100%" >
              <thead>
                <th>NAME </th>  
              </thead>
              <?php

              $queerry = mysql_query("SELECT * FROM product_orders where status='3'");
              while($rowwss = mysql_fetch_assoc($queerry))
              {
                $prod = $rowwss['product'];
                $price = $rowwss['tprice'];
                $stat = $rowwss['status'];
                $trans = $rowwss['trans_num'];
                $id = $rowwss['oid'];
                $date = $rowwss['date'];
                $custnum = $rowwss['customer_num'];


                $queeerrry = mysql_query("SELECT * FROM accounts where user_id = $custnum");
                while($rowwsss = mysql_fetch_assoc($queeerrry))
                { 
                  $fname = $rowwsss['fname'];
                  $lname = $rowwsss['lname'];
                }
                echo '<tr>';
                echo '<td>'.'<a href=orderhistory.php?id='.$id.'>'.$fname.' '.$lname.'</a>'.'</td>';

                ?>


                <?php
                echo '</tr>';

              }
              ?>
            </table>
          </div> <!-- End of Service Four -->
        </div>
      </div>
    </div>
  </body>
  </html>

  <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
  <script src="js/morris/chart-data-morris.js"></script>
  <script src="js/tablesorter/jquery.tablesorter.js"></script>
  <script src="js/tablesorter/tables.js"></script>
  <script src="../datepicker/foundation-datepicker.js"></script>


  <script>
  $(function () {
        // implementation of disabled form fields
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate() + 1, 0, 0, 0, 0);

        var checkin = $('#dpd1').fdatepicker(
        {
          onRender: function (date) 
          {
                //return date.valueOf() > now.valueOf() ? 'disabled' : '';
              }

            }).on('changeDate', function (ev) {
              if (ev.date.valueOf() > checkout.date.valueOf()) 
              {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 15);
                checkout.update(newDate);
              }
              checkin.hide();
              $('#dpd2')[0].focus();
            }).data('datepicker');

            var checkout = $('#dpd2').fdatepicker({
              onRender: function (date) {
            // return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
            if(date.valueOf() < checkin.date.valueOf())
            {
              return 'disabled';
            }

          }
        }).on('changeDate', function (ev) {
          checkout.hide();

        }).data('datepicker');

        // Dito nag pa plus ng date.
        var newDate = new Date();
        var addtodate = document.getElementById('addtodate').value;

        newDate.setDate(newDate.getDate() + parseInt(addtodate));
        checkout.update(newDate);
        //alert(addtodate);
      });

function checkInput(value,inputId)
{

  var dateInput = new Date(value);
  var dateTodayTemp = document.getElementById('date_today').value;
  var dateToday = new Date(dateTodayTemp);
  if(dateInput > dateToday)
  {
    document.getElementById('invalidDate').style.display = 'block';
    document.getElementById("dpd1").value = dateTodayTemp;
    document.getElementById("dpd2").value = dateTodayTemp;

  }
}

function hideAlert()
{
  document.getElementById('invalidDate').style.display = 'none';
}
</script>