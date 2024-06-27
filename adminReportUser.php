<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user`
    INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`utype_id`
    ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;


?>





    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Report</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">


    </head>

    <body>

        <div class="container mt-3">
            <a href="adminDashboard.php"><img src="Resources/Img/back.png" height="25" alt=""> <img src="Resources/Img/back.png" height="25" alt=""></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">User report</h2>

            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Status</th>


                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo $d["id"] ?></td>
                            <td><?php echo $d["fname"] ?></td>
                            <td><?php echo $d["lname"] ?></td>
                            <td><?php echo $d["email"] ?></td>
                            <td><?php echo $d["mobile"] ?></td>
                            <td><?php echo $d["type"] ?></td>
                            <td><?php if ($d["status"] == 1) {
                                    echo ("Active");
                                } else {
                                    echo ("Inactive");
                                }


                                ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>


            </table>




            
        </div>

        <div class="container d-flex justify-content-end mt-5 mb-5">
            <button class="btn btn-danger col-2" onclick="printDiv();">Print</button>
        </div>


        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a Valid Admin");
}


?>