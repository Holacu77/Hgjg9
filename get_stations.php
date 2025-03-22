<?php
include 'db.php';

$center_id = $_GET['center_id'] ?? null;

if ($center_id) {
    $stations = $conn->query("SELECT * FROM stations WHERE center_id = $center_id");

        $stations_array = [];
            while ($row = $stations->fetch_assoc()) {
                    $stations_array[] = $row;
                        }

                            echo json_encode($stations_array);
                            }
                            ?>