<?php
require_once 'db_connection.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
  if (isset($_GET['edit_diversity_name'])) {
    $name = $_GET['edit_diversity_name'];
    $sql = "SELECT * FROM diversities WHERE name = '$name'";
    $diversity = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($diversity);
    $row['enable'] = $row['enable'] == 1 ? true : false;
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
  } else {
    $diversities = mysqli_query($conn, "SELECT * FROM diversities");
    if (mysqli_num_rows($diversities) > 0) {
      $rows = array();
      while ($row = mysqli_fetch_assoc($diversities)) {
        $row['enable'] = $row['enable'] == 1 ? true : false;
        $row['name'] = str_replace('_', ' ', $row['name']);
        $rows[] = $row;
      }
      echo json_encode($rows, JSON_UNESCAPED_UNICODE);
    } else {
      echo -1;
    }
  }
} else if ($method == 'POST') {
  if (isset($_POST['name'])) {

    $name = ucwords($_POST['name']);
    $name = str_replace(' ', '_', $name);
    $enable = !isset($_POST['enable']) ? 0 : 1;

    if (!isset($_POST['edit_diversity_name'])) {

      $sql = "Insert into diversities (name, enable) values ('$name', $enable)";
    } else {

      $edit_name = $_POST['edit_diversity_name'];
      $edit_name = str_replace(' ', '_', $edit_name);
      $sql = "Update diversities Set name='$name', enable=$enable Where name='$edit_name'";
    }
  } else if (isset($_POST['delete_diversity_name'])) {
    $delete_name = $_POST['delete_diversity_name'];
    $sql = "Delete from diversities Where name='$delete_name'";
  }
  $diversities = mysqli_query($conn, $sql);

  if ($diversities) {
    header('location: ../index.php');
  } else {
    echo "<script type='text/javascript'>
    alert('Diversity Allready Exist');
    window.location = '../index.php';
   </script>";
  }
}
