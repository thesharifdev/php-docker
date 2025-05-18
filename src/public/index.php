<?php
$host = 'mysql'; // Use service name from docker-compose.yml
$dbname = 'srf';
$username = 'srf';
$password = 'srf';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        address TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "Table 'users' created successfully.\n";

    function insertUser($pdo, $name, $email, $address) {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, address) VALUES (:name, :email, :address)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':address' => $address
            ]);
            return "User added successfully.";
        } catch (PDOException $e) {
            return "Error adding user: " . $e->getMessage();
        }
    }

    $result = insertUser($pdo, "Johcsdn Doe", "jofadshn@example.com", "1fa23 Main St, City");
    echo $result;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pdo = null;
?>