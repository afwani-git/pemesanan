@extends('layout.pendaftaran')


@section('content')
    <div class="container">
    	<div class="row d-flex justify-content-center mt-lg-5">
    		<div class="col-md-4">
    			<div class="card">
    				<div class="card-header">
						Login Admin    					
    				</div>
    				<div class="card-body">
    					<form method="POST" action="/auth" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    						<div class="form-group">
    							<label for="email">
    								Email
    							</label>
    							<input type="email" name="email" class="form-control">
    						</div>
							<div class="form-group">
    							<label for="password">
    								Password
    							</label>
    							<input type="password" name="password" class="form-control">
    						</div>
    						<div class="form-group">
    							<input value="login"  type="submit" name="submit" class="btn btn-primary btn-block">
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection