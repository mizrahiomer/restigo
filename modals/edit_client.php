<?php
require_once './includes/db_connection.php';

$diversities = mysqli_query($conn, "SELECT name FROM diversities");
if (mysqli_num_rows($diversities) > 0) {
  $rows = array();
  while ($row = mysqli_fetch_assoc($diversities)) {
    $rows[] = $row;
  }
  $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
}
?>

<div class="modal fade" id="edit_client_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="was-validated" action="./includes/clients.php" method="post">
          <input hidden name='edit_client_name' id="edit_client_name">
          <div class="form-group">
            <label for="name">Name</label>
            <input required type="text" class="form-control" id="client_name" name="name" placeholder="Enter Client Name">
            <div class="invalid-feedback">Please Client Enter Name</div>
          </div>

          <div class="form-group">
            <label for="type">Client Type</label>
            <select required class="custom-select" id="client_type" name='type'>
              <option value="">Please Select Client Type</option>
              <?php
              require_once './includes/consts.php';
              foreach ($TYPES as $value) {
                echo "<option value ='$value'>$value</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="diversity">Client Diversity</label>
            <select required class="custom-select" id='client_diversity' name='diversity'>
              <option value="">Please Select Diversity</option>
              <?php
              $rows = json_decode($rows);
              foreach ($rows as $value) {
                echo "<option value ='$value->name'>" . str_replace('_', ' ', $value->name) . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id='client_enable' name='enable' value='1'>
            <label class="form-check-label text-dark" for="enable">Enable</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>