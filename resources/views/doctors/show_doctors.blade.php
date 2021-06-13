 @extends('admin.layout.master')
 @section('title','Show All Doctors')
 @section('content')
  
   <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>Show All Doctors</h3>
        </div>

        <div class="card-body">
        @if(Session()->has('deleted'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{ Session()->get('deleted')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif

        @if(isset($doctors) && $doctors->count()>0)
          <table id="doctors" class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Serial</th>
                <th>Doctor Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
           
            <tbody>
            @foreach($doctors as $doctor)
              <tr>
                <td>
                  @php
                    static $s = 1;
                    echo $s++;
                  @endphp 
                </td>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->address}}</td>
                <td class="text-center">
                  <a href="{{route('edit.doctor',$doctor->id)}}"><i class="fas fa-edit"></i></a> / 
                  <!-- <a href="{{route('delete.doctor',$doctor->id)}}"><i class="fas fa-times" style="color:red"></i></a> -->
                   <a href="#deleteModal{{$doctor->id}}" data-toggle="modal"><i class="fas fa-times" style="color:red"></i></a> 
                </td>
                 <!-- Start Delete Modal -->
                 <div class="modal fade" tabindex="-1" id="deleteModal{{$doctor->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{route('delete.doctor',$doctor->id)}}" method="POST">
                         @csrf
                          <div class="modal-body">
                            <p>Are you sure delete doctor <span style="color:blue;font-weight:bold">{{$doctor->name}}</span></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Delete Modal -->
              </tr>
              @endforeach
            </tbody>
           
          </table>
        @else
           {{ 'There is no Doctors..' }}
        @endif
        </div>

        <div >
          <p>{{ $doctors->links() }}</p>
       </div>
   

      </div>
   </div>
   
 @stop
 @section('scripts')
 <script>
  $(document).ready(function() {
    $('#doctors').DataTable();
} );
</script>
@endsection