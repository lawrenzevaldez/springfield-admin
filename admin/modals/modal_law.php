<!-- Modal -->
<div id="addLaw" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="add_law" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Rules & Regulations</h4>
        </div>
        <div class="modal-body">
          <label>Rule:</label>
          <input type="text" name="lawname" id="lawname" class="form-control">
          <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="law_id" id="law_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>