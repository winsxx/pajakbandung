@extends('master')

@section('title')
Login
@endsection
>>>>>>> edbef5fdb96f10d80e75b1c5c561bce512f03c51
@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

<<<<<<< HEAD
            <div class="form-group">
                <label class="col-md-4 control-label">Nomor KTP</label>
                <div class="col-md-6">
                    <input class="form-control" name="no_ktp" value="{{ old('no_ktp') }}">
                </div>
            </div>
=======
						<div class="form-group">
							<label class="col-md-4 control-label">NPWPD</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
>>>>>>> edbef5fdb96f10d80e75b1c5c561bce512f03c51

            <div class="form-group">
                <label class="col-md-4 control-label">Sandi</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>


<<<<<<< HEAD
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Login</button>

                </div>
            </div>
        </form>
    </div>
=======
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div row>
									<div class="col-md-3 btn-hor">
										<a class="btn btn-default" href="{{ url('/password/email') }}">Forgot Your Password?</a>
									</div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-default">Login</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
>>>>>>> edbef5fdb96f10d80e75b1c5c561bce512f03c51				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
