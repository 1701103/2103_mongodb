<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Trains</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <br>
                    <a href="addTrain.php" class="button">Add</a>

                </div>
                <div class="content-body">
                    <?php
                    $query = "SELECT * FROM mrt_station";
                    $result = $mysqli->query($query);
                    $row = $result->fetch_assoc();
                    ?>


                    <table id="myTable">
                        <tr>
                            <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
                            <th onclick="sortTable(0)">Station ID</th>
                            <th onclick="sortTable(1)">Station Name</th>
                            <th onclick="sortTable(2)">Station Line</th>
                            <th>Edit/Delete</th>

                        </tr>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['station_id']; ?></td>
                                    <td><?php echo $row['station_name']; ?></td>
                                    <td><?php echo $row['station_line']; ?></td>
                                    <td><a class="button" href='updateTrain.php?trainID=<?php echo $row['station_id']; ?>'>Edit</a><a class="button" href='doDeleteTrain.php?trainID="<?php echo $row['station_id']; ?>"'>Delete</a></td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo "No results.";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>
