<?php
require_once 'db_connection.php';
require_once 'consts.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
  if (isset($_GET['edit_client_name'])) {
    $name = $_GET['edit_client_name'];
    $sql = "SELECT * FROM clients WHERE name = '" . $name . "'";
    $client = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($client);
    $row['enable'] = $row['enable'] == 1 ? true : false;
    $row['type'] = $TYPES[$row['type'] - 1];
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
  } else {
    $clients = mysqli_query($conn, "SELECT * FROM clients");
    if (mysqli_num_rows($clients) > 0) {
      $rows   = array();
      while ($row = mysqli_fetch_assoc($clients)) {
        $row['enable'] = $row['enable'] == 1 ? true : false;
        $row['type'] = $TYPES[$row['type'] - 1];
        $rows[] = $row;
      }
      echo json_encode($rows, JSON_UNESCAPED_UNICODE);
    } else {
      echo -1;
    }
  }
} else if ($method == 'POST') {
  if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['diversity'])) {

    $name = ucwords($_POST['name']);
    $type = array_search($_POST['type'], $TYPES) + 1;
    $enable = !isset($_POST['enable']) ? 0 : 1;
    $diversity = $_POST['diversity'];

    if (!isset($_POST['edit_client_name'])) {
      $sql = "Insert into clients (name, type, enable) values ('$name', $type, $enable)";
      $sql2 = "Insert into diversities_clients (client_name, diversity_name) values ('$name', '$diversity')";
    } else {
      $edit_name = $_POST['edit_client_name'];
      $sql = "Update clients Set name='$name', type=$type, enable=$enable Where name='$edit_name'";
      $sql2 = "Update diversities_clients set client_name='$edit_name', diversity_name='$diversity' Where item_id = $id";
    }
  } else if (isset($_POST['delete_client_name'])) {
    $delete_name = $_POST['delete_client_name'];
    $sql = "Delete from clients Where name='$delete_name'";
    $sql2 = "Delete from diversities_clients Where item_id='$delete_name'";
  }

  $clients = mysqli_query($conn, $sql);
  $clients_diversities = mysqli_query($conn, $sql2);

  if ($clients && $clients_diversities) {
    header('location: ../index.php');
  } else {
    echo "<script type='text/javascript'>
      alert('Client Allready Exist');
      window.location = '../index.php';
     </script>";
  }
}
