<!-- Modal -->
<div class="modal fade" id="add-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('students.store') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Hospital Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                @csrf
                <input class="form-control mb-2" name="first_name" placeholder="First Name"/>
                <input class="form-control mb-2" name="middle_name" placeholder="Middle Name"/>
                <input class="form-control mb-2" name="last_name" placeholder="Last Name"/>
                <label>Clinical Job</label>
                <select class="form-control mb-2" name="clinical_job" placeholder="Hospital Job">
                  <option value="0">Select Hospital Job</option>
                  <option value="Physician/Doctors">Physician/Doctors</option>
                  <option value="Nurse">Nurse</option>
                  <option value="Techs">Techs</option>
                  <option value="Therapist">Therapist</option>
                  <option value="Medical Assistant">Medical Assistant</option>
                  <option value="Pharmacist">Pharmacist</option>
                  <option value="Medical Tech">Medical Tech</option>
                  <option value="Dietitian">Dietitian</option>
                </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Staff </button>
      </div>
      </form>
    </div>
  </div>
</div>