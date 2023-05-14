<?php
@session_start();
$database = new PDO('sqlite:./Data/WebsiteDatabase.db');

$query_txt = "SELECT * FROM `users`";
$result = $database->query($query_txt);
?>
<hr>
<br>
<div class="col-sm">
    <h2>All User's list (You are logged in as "<?php echo $_SESSION['current_user_mail']; ?>").</h2>
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="table table-active">
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            function stripString($inpString){
                return substr($inpString, 0, 3)."*******";
            }
            foreach ($result as $row) {
                if ($row['Email']!=$_SESSION['current_user_mail']){
                    $Email = stripString($row['Email']);
                    $FName = stripString($row['FName']);
                    $LName = stripString($row['LName']);
                    $Phone = stripString($row['Phone']);
                }
                else{
                    $Email = $row['Email'];
                    $FName = $row['FName'];
                    $LName = $row['LName'];
                    $Phone = $row['Phone'];
                }
                echo "<tr>";
                echo "<td>" . $Email . "</td>";
                echo "<td>" . $FName . "</td>";
                echo "<td>" . $LName . "</td>";
                echo "<td>" . $Phone . "</td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
    </div>

</div>