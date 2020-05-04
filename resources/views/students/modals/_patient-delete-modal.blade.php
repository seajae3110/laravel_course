<!-- Modal -->
<div class="modal fade" id="patient-delete-modal-{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to discharge patient? {{ $patient->full_name }}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('students.destroyPatient', array('id'=>$patient->id)) }}" method="post">
        @csrf
          <div class="modal-body">

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Discharged! </button>
          </div>
      </form>
    </div>
  </div>
</div>