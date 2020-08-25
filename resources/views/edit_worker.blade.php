@extends('admin_main')

@section('content')


<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit worker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">

            	@if(session('success'))
            		<div class="alert alert-success">
            			<h3>{{ session('success') }}</h3>
            		</div>
            	@endif

            	<!-- form start -->
				    <form action="{{ route('edit_worker' )}}" method="post" enctype="multipart/form-data" role="form">
				      @csrf
				      <div class="card-body">

				      	<input type="hidden" name="user_id" value="{{ $data->id }}">

				      	<img id="preimage" src="{{ URL::to('/') }}/images/{{$data->photo }}" height="120px" >

				        <!-- photo -->
				        <div class="form-group">
				          <label for="exampleInputFile">Photo</label>
				          <div class="input-group">
				            <div class="custom-file">
				              <input type="file" name="image" class="custom-file-input" id="exampleInputFile"  onchange="loadfile(event)" value="{{ $data->photo }}">
				              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
				            </div>
				            <div class="input-group-append">
				              <span class="input-group-text" id="">Upload</span>
				            </div>
				          </div>
				        </div>
				      </div>


				        <!-- name -->
				        <div class="form-group">
				          <label for="worker_name">Name</label>
				          <input type="text" name="name" class="form-control" id="worker_name" placeholder="Enter name" value="{{ $data->name }}">
				        </div>

				        @error('name')
				            <div class="alert alert-danger">{{ $message }}</div>
				        @enderror

				        <!-- position -->
				        <div class="form-group">
				          <label for="worker_position">Position</label>
				          <input type="text" name="position" class="form-control" id="worker_position" placeholder="Enter position" value="{{ $data->position }}">
				        </div>

				        @error('position')
				            <div class="alert alert-danger">{{ $message }}</div>
				        @enderror

				        <!-- hire_at -->
				        <div class="form-group">
				          <label for="meeting-time">Hire at:</label>

							<input type="datetime-local" id="meeting-time" name="hire_at" value="{{ str_replace(' ', 'T', $data->hire_at) }}">
				        </div>

				        @error('hire_at')
				            <div class="alert alert-danger">{{ $message }}</div>
				        @enderror

				        <!-- phone -->
				        <div class="form-group">
				          <label for="worker_phone">Phone</label>
				          <input type="text" name="phone" class="form-control" id="worker_phone" placeholder="Enter phone" value="{{ $data->phone }}">
				        </div>

				        @error('phone')
				            <div class="alert alert-danger">{{ $message }}</div>
				        @enderror
				        
				        <!-- email -->
				        <div class="form-group">
				          <label for="exampleInputEmail1">Email address</label>
				          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $data->email }}">
				        </div>

				        @error('email')
				            <div class="alert alert-danger">{{ $message }}</div>
				        @enderror

				        <!-- salary -->
				        <div class="form-group">
				          <label for="salary">Salary</label>
				          <input type="text" name="salary" class="form-control" id="salary" placeholder="Salary" value="{{ $data->salary }}">
				        </div>

				        @error('salary')
				            <div class="alert alert-danger">{{ $message }}</div>
				        @enderror

				        <!-- subordination -->
				        <div class="form-group">
				          <label for="worker_name">Subordination</label>
				          <input type="text" name="subordination" class="form-control" id="subordination" placeholder="Enter subordination" value="{{ $data->subordination }}">
				        </div>


				      <div class="card-footer">
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>

				    </form>

            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
  	function loadfile(event) {
  		var output=document.getElementById('preimage');
  		output.src=URL.createObjectURL(event.target.files[0]);
  	};
  </script>


@endsection