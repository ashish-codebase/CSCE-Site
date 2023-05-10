<style>
    .user table,
    .user th,
    .user td {
        border: 2px solid black;
    }

    .user tr {
        margin: 5px;
    }
</style>
<?php
// echo "running table read";
include('read_db.php');

?>
<hr>
<br>
<h2>All User's list (visible only if user is logged-in).</h2>
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

<?php
    $conn
?>