<?php
require 'class.php';
$id=$_SESSION['userdata']['userid'];
$con = new showuser();
$con->connect('localhost', 'root', '', 'newtasks');
$loc=$con->useraccount($id);
if(isset($_POST['update'])){
    $name=$_POST['name1'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $loc=$con->update($id,$name,$mobile,$password);
    header("Refresh:0; url=useraccount.php");
}
if(isset($_POST['delete'])){
    $loc=$con->delete($id);
    header("Refresh:0; url=useraccount.php");
}
?>
<?php require 'adminnav.html'?>
<div id="tiles">
    <h1 style="color:white">Account Info</h1>
    <table id="tiletab">
    <tr>
        <td>User Id</td>
        <td>User Name</td>
        <td>Name</td>
        <td>Mobile</td>
        <td>Password</td>
        <td>Action</td>
        <td>Action</td>
    </tr>
    <?php if ($loc->num_rows>0) :?>
     <?php while ($row = $loc->fetch_assoc()) :?>
     <form method="POST">
        <tr>
            <td><input id="userid" type="text" value=<?php echo $row['user_id']?> name="userid" size="2"></td>
            <td><input id="username" type="text" value=<?php echo $row['user_name']?> name="username" size="10"></td>
            <td><input type="text" value=<?php echo $row['name']?> name="name1" size="10"></td>
            <td><input type="text" value=<?php echo $row['mobile']?> name="mobile" size="10"></td>
            <td><input type="text" value=<?php echo $row['password']?> name="password" size="5"></td>
            <td><input type="submit" value="UPDATE" name="update"></td>
            <td><input type="submit" value="DELETE" name="delete"></td>
        </tr>
    </form>
     <?php endwhile;?>
     <?php endif;?>
</table>
     </div>
     </body>
<script>
    document.getElementById("userid").readOnly = true; 
    document.getElementById("username").readOnly = true; 
    </script>
    <html>