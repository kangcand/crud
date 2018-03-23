@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('mahasiswa.update',$mhs->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Mahasiswa</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $mhs->nama }}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nim') ? ' has-error' : '' }}">
			  			<label class="control-label">NIM</label>	
			  			<input type="text" value="{{ $mhs->nim }}" name="nim" class="form-control"  required>
			  			@if ($errors->has('nim'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nim') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('dosen_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Dosen</label>	
			  			<select name="dosen_id" class="form-control">
			  				@foreach($dosen as $data)
			  				<option value="{{ $data->id }}" {{ $selectedDosen == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('dosen_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dosen_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('hobi') ? ' has-error' : '' }}">
			  			<label class="control-label">Hobi</label>	
			  			<select name="hobi[]" class="form-control js-example-basic-multiple" multiple="multiple">
			  				@foreach($hobi as $data)
			  				<option value="{{ $data->id }}"{{ (in_array($data->id, $selected)) ? ' selected="selected"' : '' }}>{{ $data->hobi }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('hobi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hobi') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection