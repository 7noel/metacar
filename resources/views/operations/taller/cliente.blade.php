@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<h5 class="{{ config('options.styles.card_header') }}">ORDEN DE TRABAJO {{ $model->sn }}
				</h5>
				<div class="card-body">
					@include('operations.taller.partials.fields_recepcion')

					{!! Form::model($model, ['route'=> 'output_orders.store' , 'method'=>'PUT', 'class'=>'', 'enctype'=>"multipart/form-data"]) !!}
						@if(Request::url() != URL::previous())
						<input type="hidden" name="last_page" value="{{ URL::previous() }}">
						@endif
						@if($model->status == 'PEND')
						<p class="font-weight-bold">¿Todo en orden? Si deseas continuar con la orden de trabajo presiona la opción "SI", de lo contrario presiona la opción "NO" y el asesor encargaDO revisará tu caso.</p>
						<div class="form-row mb-3">
							<div class="col-sm-12">
								<div class="custom-control custom-radio">
									<input type="radio" id="aprobacion1" name="aprobacion" class="custom-control-input">
									<label class="custom-control-label" for="aprobacion1">SI</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" id="aprobacion2" name="aprobacion" class="custom-control-input">
									<label class="custom-control-label" for="aprobacion2">NO</label>
								</div>
							</div>
						</div>
						<input type="hidden" name="status" value="DIAG">
						@endif
						@if( in_array($model->status, ['PEND', 'APROB']) )
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-outline-success" id="submit">{!! $icons['save'] !!} GRABAR</button>
							</div>
						</div>
						@endif
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')



@endsection