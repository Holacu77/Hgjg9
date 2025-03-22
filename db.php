<?php
$servername = "sql212.infinityfree.com";
$username = "if0_38579426";   // اسم المستخدم الافتراضي في XAMPP أو WAMP هو "root"
$password = "AtyrWDfUeVsgtE";       // كلمة المرور الافتراضية هي فارغة
$dbname = "if0_38579426_election_db";  // تأكد أن هذه هي قاعدة البيانات التي أنشأتها

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    ?>