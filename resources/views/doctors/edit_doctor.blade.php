
 @extends('admin.layout.master')
 @section('title','Create New Doctor')
 @section('content')
 <div class="container">
   

     <div class="card">
            <div class="card-header">
                <h3>Edit Doctor</h3>
                @if(Session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{ Session()->get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="card-body">
                <form action="{{route('update.doctor',$doctor->id)}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Doctor Name</label>
                        <input type="text" name="name" value="{{$doctor->name}}"
                        class="form-control" autocomplete="off">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>phone</label>
                        <input type="text" name="phone" value="{{$doctor->phone}}"
                         class="form-control" autocomplete="off">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{$doctor->address}}"
                        class="form-control" autocomplete="off">
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>

     </div>


 </div>

 @stop
