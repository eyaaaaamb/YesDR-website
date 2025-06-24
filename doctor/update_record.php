<div class="form-popup" id="editRecordForm">
    <h3>Edit Medical Record</h3>
    <form action="#" method="post">
      <div class="form-group">
        <label for="recordAppointmentId">Appointment ID</label>
        <input type="text" id="recordAppointmentId" name="appointmentId" value="A001" readonly>
      </div>
      <div class="form-group">
        <label for="diagnosis">Diagnosis</label>
        <input type="text" id="diagnosis" name="diagnosis" value="Hypertension" required>
      </div>
      <div class="form-group">
        <label for="treatment">Treatment</label>
        <textarea id="treatment" name="treatment" rows="3" required>Medication and lifestyle changes</textarea>
      </div>
      <div class="form-group">
        <label for="prescriptions">Prescriptions</label>
        <textarea id="prescriptions" name="prescriptions" rows="3" required>Lisinopril 10mg daily</textarea>
      </div>
      <div class="form-actions">
        <button type="button" class="btn" onclick="closeForm('editRecordForm')">Cancel</button>
        <button type="submit" class="btn">Update</button>
      </div>
    </form>
  </div>
