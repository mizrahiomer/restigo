<div class="modal fade" id="delete_client_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <input hidden id='delete_client_name'></input>
        <div class='h4'>Are you sure you want to delete ?</div>
        <div class='text-muted'>You will not be able to recover it</div>
      </div>
      <div class="text-center mb-3">
        <button id='delete_client' class="btn btn-success shadow">Yes, I'm Sure</button>
        <button class="btn btn-danger shadow" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>