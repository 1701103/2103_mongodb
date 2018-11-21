<!DOCTYPE html>
<html>
    <?php include "head.php" ?>
    <body>
        <?php include "nav.php" ?>
        <section id="content">
            <?php include "usernameHeader.php" ?>
            <div class="content">
                <div class="content-header">
                    <h1>Schools</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <br>
                    <a href="addSchool.php" class="button">Add</a>
                    
                </div>
                <div class="content-body">
                    <?php
                    $query = "SELECT * FROM school";
                    $result = $mysqli->query($query);
                    ?>


                    <table id="myTable">
                        <tr>
                            <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
                            <th onclick="sortTable(0)">School Name</th>
                            <th onclick="sortTable(1)">Address</th>
                            <th onclick="sortTable(2)">Postal Code</th>
                            <th onclick="sortTable(3)">Zone</th>
                            <th onclick="sortTable(7)">Telephone</th>
                            <th>Edit/Delete</th>
                            
                            
                        </tr>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['school_name']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['postal_code']; ?></td>
                                    <td><?php echo $row['zone']; ?></td>
                                    <td><?php echo $row['telephone_no']; ?></td>
                                    <td><a class="button" href='updateSchool.php?schoolID=<?php echo $row['school_name']; ?>'>Edit</a><a class="button" href='doDeleteSchool.php?schoolID="<?php echo $row['school_name']; ?>"'>Delete</a></td>
                                    
                                    
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
