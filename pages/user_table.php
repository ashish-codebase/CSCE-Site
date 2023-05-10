<?php
@session_start();
?>
<style>
    .user th,
    .user td {
        border: 2px solid black;
    }

    .user tr {
        margin: 5px;
    }

    table {
        /* caption-side: bottom; */
        /* border-collapse: collapse !important; */
        /* display: table; */
        /* max-width: 99% !important; */
        /* word-wrap: break-word !important; */
        overflow-wrap: break-word;
        /* inline-size: 100px !important; */
        table-layout: fixed;
        width: 100%;
    }
</style>
<?php
// echo "running table read";
include('read_db.php');

?>
<hr>
<br>
<div class="col-sm">
    <h2>All User's list (You are logged in as "<?php echo $_SESSION['current_user_mail']; ?>").</h2>
    <table class="user">
        <thead>
            <tr>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                $Email = $row['Email'];
                $FName = $row['FName'];
                $LName = $row['LName'];
                $Phone = $row['Phone'];

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

<?php
$conn
?>