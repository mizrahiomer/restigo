<div class="modal fade" id="edit_diversity_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="was-validated" action="./includes/diversities.php" method="post">
          <input hidden name='edit_diversity_name' id="edit_diversity_name">
          <div class="form-group">
            <label for="name">Name</label>
            <input required type="text" class="form-control" id="diversity_name" name="name" placeholder="Enter Diversity Name">
            <div class="invalid-feedback">Please Diversity Enter Name</div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id='diversity_enable' name='enable' value='1'>
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