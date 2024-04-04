<?php
// Đặt tiêu đề cho việc chấp nhận kết nối từ mọi nguồn
header('Access-Control-Allow-Origin: *');

// Thông tin kết nối với cơ sở dữ liệu
$server = "localhost";
$username = "root";
$password = "";
$database = "db1";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($server, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Thực hiện truy vấn SQL
$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

// Kiểm tra kết quả trả về
if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    // Chuyển mảng kết quả thành JSON
    $json = json_encode($rows);
    // In ra kết quả JSON
    echo '{"products": ' . $json . '}';
} else {
    echo "Không có dữ liệu.";
}

// Đóng kết nối
$conn->close();
?>
