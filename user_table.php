<style>
    table,
    th,
    td {
        border: 2px solid black;
    }

    tr {
        margin: 5px;
    }
</style>
<?php
echo "running table read";
include('read_db.php');

?>
<table>
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
            $email = $row['email'];
            $FName = $row['FName'];
            $LName = $row['LName'];
            $Phone = $row['Phone'];

            echo "<tr>";
            echo "<td>" . $email . "</td>";
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