@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
						<p style="font-size: 80px; color:darkcyan;">{!! $icon !!}</p>
						<h2 class="mb-3">{{ $title }}</h2>
						<p>{{ $msj }}</p>
						<a href="#" class="btn btn-outline-info">Volver</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')



@endsection