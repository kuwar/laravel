<!DOCTYPE html>
<html>
<head>
	<title>Upload CSV</title>
</head>
<body>

 @if ($errors->has())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        {{ $error }}<br>        
    @endforeach
</div>
@endif

@if(Session::has('success'))
  <div class="alert-box success">
    <h2>{!! Session::get('success') !!}</h2>
  </div>
@endif

<div class="content">
	<form name="upload_csv" method="post" action="/upload/process" enctype="multipart/form-data">
		<div class="row">
		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

			<div class="form-control">
				<label for="contract_csv">Contract CSV *</label>
				<input type="file" name="contract_csv" id="contract_csv" class="form-control">
        <p class="errors">{!!$errors->first('contract_csv')!!}</p>
        @if(Session::has('error'))
          <p class="errors">{!! Session::get('error') !!}</p>
        @endif
			</div>
			<div class="form-control">
				<label for="awarded_csv">Awarded CSV *</label>
				<input type="file" name="awarded_csv" id="awarded_csv" class="form-control">
        <p class="errors">{!!$errors->first('awarded_csv')!!}</p>
        @if(Session::has('error'))
          <p class="errors">{!! Session::get('error') !!}</p>
        @endif
			</div>

			<input type="submit" value="Submit">
		</div>
	</form>
</div>


</body>
</html>