<!-- Modal -->
<div class="modal fade" id="patient-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('patients.storePatient') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                @csrf
                <input class="form-control mb-2" name="first_name" placeholder="First Name"/>
                <input class="form-control mb-2" name="middle_name" placeholder="Middle Name"/>
                <input class="form-control mb-2" name="last_name" placeholder="Last Name"/>
                Cause<br>&emsp;
                <select class="form-control mb-2" name="reasons" placeholder="">
                  <option value="Mild">Common Illness (Allergies, Colds and Flu,etc.) </option>
                  <option value="Infectious diseases">Infectious diseases (bacteria, viruses, fungi or parasites)</option>
                  <option value="Deficiency diseases">Deficiency diseases (Malnutrition)</option>
                  <option value="Hereditary diseases">Hereditary diseases (Genetic & Non-Genetic)</option>
                </select>
                <select class="form-control mb-2" name="senior" placeholder="">
                  <option>Senior or not?</option>
                  <option value="Senior(22% Off)">Seniort Citizen</option>
                  <option value="Average(0% Off)">Average</option>
                </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Patient </button>
      </div>
      </form>
    </div>
  </div>
</div>
