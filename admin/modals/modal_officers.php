<!-- Modal -->
<div id="addOfficers" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="addOfficer" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Assign Officer</h4>
        </div>
        <div class="modal-body">
          <label>Full Name:</label>
          <select class="form-control" name="studentFullname" id="studentFullname" required="">
            <option value="" selected="">-Select-</option>
            <?php
              include 'config/db.php';

              $query = "SELECT * FROM students";
              $result = $conn->query($query);
              $result->setFetchMode(PDO::FETCH_ASSOC);
              while ($rows = $result->fetch()) 
              {
                echo '<option value="'.ucwords(trim($rows['first_name']))." ".ucwords(trim($rows['middle_name'])). " ".ucwords(trim($rows['last_name'])).'">'.ucwords(trim($rows['first_name']))." ".ucwords(trim($rows['middle_name']))." ".ucwords(trim($rows['last_name'])).'</option>';
              }

              ?>
          </select>
          <br>
          <label>Club Assgined:</label>
            <select id="studentClubhandle" name="studentClubhandle" class="form-control" required="">
              <option value="" selected="" disabled="">-Select-</option>
              <?php
              include 'config/db.php';

              $query = "SELECT * FROM clubs";
              $result = $conn->query($query);
              $result->setFetchMode(PDO::FETCH_ASSOC);
              while ($rows = $result->fetch()) 
              {
                echo '<option value="'.$rows['club_name'].'">'.$rows['club_name'].'</option>';
              }

              ?>
            </select>
          <br>
          <label>Club Position:</label>
            <select id="studentClubPosition" name="studentClubPosition" class="form-control" required="">
              <option value="" selected="" disabled="">-Select-</option>
              <option value="President">President</option>
              <option value="Vice President">Vice President</option>
              <option value="Secretary">Secretary</option>
              <option value="Treasurer">Treasurer</option>
            </select>
          <br>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="officer_id" id="officer_id">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>   
  </div>
</div>