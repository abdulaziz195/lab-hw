<?php
$db = new PDO('mysql:host=localhost;dbname=students', 'root', '');

if (empty($_POST['full_name'])) {
  echo '<p>Please enter your full name.</p>';
} else if (empty($_POST['email'])) {
  echo '<p>Please enter your email address.</p>';
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '<p>Please enter a valid email address.</p>';
} else {

  $sql = 'INSERT INTO students (full_name, email, gender) VALUES (?, ?, ?)';
  $stmt = $db->prepare($sql);
  $stmt->execute(array($_POST['full_name'], $_POST['email'], $_POST['gender']));
  echo '<p>Your information has been successfully submitted.</p>';
}
?>