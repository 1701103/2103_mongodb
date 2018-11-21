<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>MOE Programs</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <br>
                    <a href="addMOEProgram.php" class="button">Add</a>
                </div>
                <div class="content-body">
                    <?php
                    $query = "SELECT * FROM moe_programme";
                    $result = $mysqli->query($query);
                    //$row = $result->fetch_assoc();
                    ?>

                    <table id="myTable">
                        <tr>
                            <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
                            <th onclick="sortTable(0)">Program Name</th>
                            <th onclick="sortTable(1)">School Name</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['program_name']; ?></td>
                                    <td><?php echo $row['school_school_name']; ?></td>
                                    <td><a class="button" href='doDeleteMOEProgram.php?programName=<?php echo $row['program_name']; ?>&schoolName=<?php echo $row['school_school_name'] ?>'>Delete</a></td>

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
