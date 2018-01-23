<!-- Modal -->
<div id="newEvents" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="newEvent" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Event</h4>
        </div>
        <div class="modal-body">
          <label>Date</label>
          <div class="input-group date form_date col-md-2" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" type="text" name="eventDate" id="eventDate" value="" readonly>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
            <input type="hidden" name="eventDate2" id="dtp_input2" value="" />
          <label>Title</label>
          <input type="text" name="eventTitle" id="eventTitle" class="form-control">
          <br>
          <label>Description</label>
          <textarea name="eventTextArea" id="eventTextArea" class="form-control" rows="5"></textarea>
          <br>
          <label>Status</label>
          <select id="eventStatus" name="eventStatus" class="form-control" required="">
              <option value="1" selected="">Show</option>
              <option value="0">Hide</option>
            </select>
            <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="event_id" id="event_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>