@extends('layouts/afterlogin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	<section class="content">
		<div class="container-fluid">
		
			<div class="row">
			 <div class="card-body">
			@if (session('status'))
							<h6 class="alert alert-success">{{ session('status') }}</h6>
						@endif
			   <a href="{{ URL('add_user') }}"><button class="btn btn-success  float-right">Add USer</button></a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Picture</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
					@foreach($users as $data)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$data->name}}</td>
							<td><img src="{{url('uploads').'/'.$data->picture}}" width="70"></td>
							<td>{{$data->email}}</td>
							<td><a href="{{url('edit_user/'.$data->id)}}">Edit</a></td>
						</tr>
					@endforeach
                  
                  </tbody>
                
                </table>
              </div>
			  
			</div>
		</div>
	</section>
@endsection
