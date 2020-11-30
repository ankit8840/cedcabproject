<?php
require 'class.php';
$conn1 = new Riderequests();

$conn1->connect('localhost', 'root', '', 'newtasks');
$ride=$conn1->select();
if(isset($_REQUEST['picksort'])){
    $sort=$_REQUEST['picksort'];
    echo '<script>alert("'.$sort.'")</script>';
    $ride=$conn1->name($sort);
    header("Refresh:0; url=booking.php");
}
if(isset($_REQUEST['datesort'])){
    $sort=$_REQUEST['datesort'];
    $ride=$conn1->dateby($sort);
    header("Refresh:0; url=booking.php");
}
if(isset($_REQUEST['faresort'])){
    $sort=$_REQUEST['faresort'];
    $ride=$conn1->fareby($sort);
    header("Refresh:0; url=booking.php");
}
?>
<?php require 'adminnav.html'?>
<div id="tiles">
    <h1 style="color:white">All Rides</h1>
    <div class="dropdown sort">
        <button class="dropbtn sortbtn">Sort By</button>
            <div class="dropdown-content sortcontent">
                <a href="booking.php?picksort=pickup">Name</a>
                <a href="booking.php?datesort=ride_date">Date</a>
                <a href="booking.php?faresort=total_fare">Fare</a>
            </div>
    </div>
    <table id="usertbl">
    <tr>
        <td>RideID</td>
        <td>Ride_Date</td>
        <td>Pickup</td>
        <td>Drop</td>
        <td>Distance</td>
        <td>Luggage</td>
        <td>Fare</td>
    </tr>
    <?php if ($ride->num_rows>0) :?>
     <?php while ($row = $ride->fetch_assoc()) :?>
        
        <tr>
            <td><?php echo $row['ride_id']?></td>
            <td><?php echo $row['ride_date']?></td>
            <td><?php echo $row['pickup']?></td>
            <td><?php echo $row['droploc']?></td>
            <td><?php echo $row['total_distance']?></td>
            <td><?php echo $row['luggage']?></td>
            <td><?php echo $row['total_fare']?></td>
        </tr>
     <?php endwhile;?>
     <?php endif;?>
    </table>
</div>
<script>
    function req(){
        
    }
</script>

