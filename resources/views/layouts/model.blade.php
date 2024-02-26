

    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#exampleModal{{ $album->id }}">
    Delete/Move
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <label for="exampleSelectGender">Action</label>
                <select class="form-control" id="exampleSelectGender" name="action">
                <option value="Delete" >Delete Album</option>

                <optgroup label="Move To Another Album">
                    @foreach ( $albums as $album ){

                        <option value="{{ $album->name}}">{{ $album->name}}</option>
                    }

                    @endforeach

                </select>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="{{ route('albums.destroy',$album->id) }}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
