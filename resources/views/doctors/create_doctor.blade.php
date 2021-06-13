
 @extends('admin.layout.master')
 @section('title','Create New Doctor')
 @section('content')
 <div class="container">
   

     <div class="card">
            <div class="card-header">
                <h3>Create New Doctor</h3>
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
                <form action="{{route('store.doctor')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Doctor Name</label>
                        <input type="text" name="name" value="{{old('name')}}"
                        class="form-control" autocomplete="off">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>phone</label>
                        <input type="text" name="phone" value="{{old('phone')}}"
                         class="form-control" autocomplete="off">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{old('address')}}"
                        class="form-control" autocomplete="off">
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Create">
                    </div>
                    
                </form>
            </div>

     </div>


 </div>

 @stop
