<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:login.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <table>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>email</td>
                <td>action</td>
            </tr>
            <?php
            require 'connection.php';
            $query1 = mysqli_query($connect, "SELECT * FROM `users`");
            while ($users = mysqli_fetch_array($query1)) {
            ?>
                <tr>
                    <td><?php echo $users["id"]; ?></td>
                    <td><?php echo $users["name"]; ?></td>
                    <td><?php echo $users["email"]; ?></td>
                    <td>
                    <td><?php echo "<img width='100px' height='100px' src='uploads/{$users["image"]}' alt='Uploaded Image'>"; ?></td>

                    </td>

                    <td>
                        <a href="delete_user.php?id=<?php echo $users["id"] ?>">Delete</a>
                        <a href="edit_user.php?id=<?php echo $users["id"] ?>">edit</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            <a href="logout.php">logout</a>
        </table>
    </body>

    </html>

<?php } ?>