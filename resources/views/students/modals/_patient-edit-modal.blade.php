<!-- Modal -->
<div class="modal fade" id="patient-edit-modal-{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('students.updatePatient') }}" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                @csrf
                <input type="hidden" name="id" value="{{ $patient->id }}"/>
                <input class="form-control mb-2" name="first_name" placeholder="First Name" value="{{ $patient->first_name}}" />
                <input class="form-control mb-2" name="middle_name" placeholder="Middle Name" value="{{ $patient->middle_name}}" />
                <input class="form-control mb-2" name="last_name" placeholder="Last Name" value="{{ $patient->last_name}}" />
                Cause<br>&emsp;
                <select class="form-control mb-2" name="reasons" placeholder="">
                  <option value="Mild">Common Illness (Allergies, Colds and Flu,etc.) </option>
                  <option value="Infectious diseases">Infectious diseases (bacteria, viruses, fungi or parasites)</option>
                  <option value="Deficiency diseases">Deficiency diseases (Malnutrition)</option>
                  <option value="Hereditary diseases">Hereditary diseases (Genetic & Non-Genetic)</option>
                </select>
                <select class="form-control mb-2" name="senior" placeholder="Citizenship">
                  <option value="0"> Senior or Not?</option>
                  <option value="Senior(22% Off)">Senior Citizen</option>
                  <option value="Average(0% Off)">Average</option>
                </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Patient </button>
      </div>
      </form>
    </div>
  </div>
</div>