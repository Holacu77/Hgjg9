<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_candidate'])) {
    $candidate_name = $_POST['candidate_name'];

        // إدخال اسم المرشح في قاعدة البيانات
            $sql = "INSERT INTO candidates (name) VALUES ('$candidate_name')";
                if ($conn->query($sql) === TRUE) {
                        echo "<p style='color: green;'>تم إضافة المرشح بنجاح!</p>";
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
                                                    <title>إضافة مرشح</title>
                                                        <link rel="stylesheet" href="style.css">
                                                        </head>
                                                        <body>

                                                        <h1>إضافة مرشح جديد</h1>

                                                        <form method="POST">
                                                            <label for="candidate_name">اسم المرشح:</label>
                                                                <input type="text" name="candidate_name" required><br>

                                                                    <button type="submit" name="add_candidate">إضافة المرشح</button>
                                                                    </form>

                                                                    <!-- زر الرجوع إلى الصفحة الرئيسية -->
                                                                    <div class="return-btn">
                                                                        <a href="index.php"><button>الرجوع إلى الصفحة الرئيسية</button></a>
                                                                        </div>

                                                                        </body>
                                                                        </html>