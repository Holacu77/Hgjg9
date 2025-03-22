<?php
include 'db.php';

// جلب جميع المراكز
$centers = $conn->query("SELECT * FROM centers");

$results = [];

while ($center = $centers->fetch_assoc()) {
    $center_id = $center['id'];

        // جلب المحطات المرتبطة بالمركز
            $stations = $conn->query("SELECT * FROM stations WHERE center_id = $center_id");

                while ($station = $stations->fetch_assoc()) {
                        $station_id = $station['id'];

                                // جلب الأصوات للمرشحين في هذه المحطة
                                        $votes = $conn->query("SELECT c.name AS candidate_name, v.vote_count FROM votes v 
                                                                        JOIN candidates c ON v.candidate_id = c.id
                                                                                                        WHERE v.station_id = $station_id");

                                                                                                                while ($vote = $votes->fetch_assoc()) {
                                                                                                                            $results[$vote['candidate_name']] = ($results[$vote['candidate_name']] ?? 0) + $vote['vote_count'];
                                                                                                                                    }
                                                                                                                                        }
                                                                                                                                        }

                                                                                                                                        ?>

                                                                                                                                        <!DOCTYPE html>
                                                                                                                                        <html lang="ar">
                                                                                                                                        <head>
                                                                                                                                            <meta charset="UTF-8">
                                                                                                                                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                                                                                                                    <title>عرض النتائج</title>
                                                                                                                                                        <link rel="stylesheet" href="style.css">
                                                                                                                                                        </head>
                                                                                                                                                        <body>

                                                                                                                                                        <h1>نتائج الأصوات</h1>

                                                                                                                                                        <table>
                                                                                                                                                            <thead>
                                                                                                                                                                    <tr>
                                                                                                                                                                                <th>اسم المرشح</th>
                                                                                                                                                                                            <th>إجمالي الأصوات</th>
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                        </thead>
                                                                                                                                                                                                            <tbody>
                                                                                                                                                                                                                    <?php foreach ($results as $candidate_name => $total_votes) { ?>
                                                                                                                                                                                                                                <tr>
                                                                                                                                                                                                                                                <td><?php echo $candidate_name; ?></td>
                                                                                                                                                                                                                                                                <td><?php echo $total_votes; ?></td>
                                                                                                                                                                                                                                                                            </tr>
                                                                                                                                                                                                                                                                                    <?php } ?>
                                                                                                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                                                                                                        </table>

                                                                                                                                                                                                                                                                                        <!-- زر الرجوع إلى الصفحة الرئيسية -->
                                                                                                                                                                                                                                                                                        <div class="return-btn">
                                                                                                                                                                                                                                                                                            <a href="index.php"><button>الرجوع إلى الصفحة الرئيسية</button></a>
                                                                                                                                                                                                                                                                                            </div>

                                                                                                                                                                                                                                                                                            </body>
                                                                                                                                                                                                                                                                                            </html>