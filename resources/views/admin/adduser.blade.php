@extends('layouts/afterlogin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     </div>
	</div>
			
				<div class="row">
					<div class="card-body">
				
						
			       <form action="{{ url('store') }}"  method = "POST" enctype="multipart/form-data">
			   {{csrf_field()}}

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
				  </div>
					@error('name')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror 
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                  </div>
				  @error('email')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
				  @error('password')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="picture">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
				   @error('picture')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
					<input type="submit" class="btn btn-primary" name="Submit">
                </div>
              </form>	
					</div>
				</div>
			
	
	
@endsection
