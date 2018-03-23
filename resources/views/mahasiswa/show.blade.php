@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Title</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $mhs->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Content</label>
						<input type="text" name="title" class="form-control" value="{{ $mhs->nim }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Dosen</label>
						<input type="text" name="title" class="form-control" value="{{ $mhs->Dosen->nama }}"  readonly>
			  		</div>
			  		<div class="form-group">
                    <strong>Hobi</strong><br>@foreach($mhs->Hobi as $data){{ $data->hobi }}, @endforeach

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection