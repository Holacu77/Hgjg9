<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_center'])) {
    $center_name = $_POST['center_name'];
        $stations_count = $_POST['stations_count'];

            // إدخال المركز في قاعدة البيانات
                $sql = "INSERT INTO centers (name) VALUES ('$center_name')";
                    if ($conn->query($sql) === TRUE) {
                            $center_id = $conn->insert_id;

                                    // إضافة المحطات
                                            for ($i = 1; $i <= $stations_count; $i++) {
                                                        $sql_station = "INSERT INTO stations (center_id, station_number) VALUES ('$center_id', '$i')";
                                                                    $conn->query($sql_station);
                                                                            }

                                                                                    echo "<p style='color: green;'>تم إضافة المركز والمحطات بنجاح!</p>";
                                                                                        } else {
                                                                                                echo "<p style='color: red;'>خطأ: " . $conn->error . "</p>";
                                                                                                    }
                                                                                                    }
                                                                                                    ?>

                                                                                                    <!DOCTYPE html>
                                                                                                    <html lang="ar">
                                                                                                    <head>
                                                                                                        <meta charset="UTF-8">
                                                                                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                                                                                <title>إضافة مركز</title>
                                                                                                                    <link rel="stylesheet" href="style.css">
                                                                                                                    </head>
                                                                                                                    <body>

                                                                                                                    <h1>إضافة مركز جديد</h1>

                                                                                                                    <form method="POST">
                                                                                                                        <label for="center_name">اسم المركز:</label>
                                                                                                                            <input type="text" name="center_name" required><br>

                                                                                                                                <label for="stations_count">عدد المحطات:</label>
                                                                                                                                    <input type="number" name="stations_count" required><br>

                                                                                                                                        <button type="submit" name="add_center">إضافة المركز</button>
                                                                                                                                        </form>

                                                                                                                                        <!-- زر الرجوع إلى الصفحة الرئيسية -->
                                                                                                                                        <div class="return-btn">
                                                                                                                                            <a href="index.php"><button>الرجوع إلى الصفحة الرئيسية</button></a>
                                                                                                                                            </div>

                                                                                                                                            </body>
                                                                                                                                            </html>