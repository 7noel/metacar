{!! Form::hidden('my_company', session('my_company')->id, ['id'=>'my_company']) !!}
{!! Form::hidden('with_tax', 0, ['id'=>'with_tax']) !!}
{!! Form::hidden('company_id', ((isset($car))? $car->company_id : null), ['id'=>'company_id']) !!}
{!! Form::hidden('car_id', ((isset($car))? $car->id : null), ['id'=>'car_id']) !!}
{!! Form::hidden('action', $action, ['id'=>'action']) !!}

@if(!isset($model) and isset($car))
<input type="hidden" name="last_page" value="{{ route('output_orders.index') }}">
@endif

<div class="form-row">
	<div class="col-md-1 col-sm-2">
		{!! Form::label('sn', 'OT', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->sn }}</p>
	</div>
	@if(isset($quote->id))
	<div class="col-md-1 col-sm-2">
		{!! Form::hidden('order_id', $quote->id, ['id'=>'order_id']) !!}
		{!! Form::label('quote_sn', 'Pres.') !!}
		{!! Form::text('quote_sn', $quote->sn, ['class'=>'form-control-sm form-control-plaintext text-center', 'readonly']) !!}
	</div>
	@endif
	<div class="col-md-1 col-sm-2">
		{!! Form::label('sn', 'Placa', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->placa }}</p>
	</div>
	<div class="col-md-1 col-sm-2">
		{!! Form::label('sn', 'Kilometraje', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->kilometraje }}</p>
	</div>
	<div class="col-sm-1">
		{!! Form::label('sn', 'Moneda', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ config('options.table_sunat.moneda.'.$model->currency_id) }}</p>
	</div>
	<div class="col-sm-2">
		{!! Form::label('sn', 'Servicio', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->type_service }}</p>
	</div>
	<div class="col-sm-1 d-none">
		{!! Form::label('sn', 'Preventivo', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->preventivo }}</p>
	</div>
	<div class="col-md-2 col-sm-4">
		{!! Form::label('sn', 'Asesor', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->seller->company_name }}</p>
	</div>
	<div class="col-sm-2">
		{!! Form::label('sn', 'Cond. P.', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->payment_condition->name }}</p>
	</div>
	<div class="col-sm-2">
		{!! Form::label('sn', 'Combustible', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->inventory->combustible }}</p>
	</div>
	<div class="col-sm-2">
		{!! Form::label('sn', 'Comprobante', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->inventory->comprobante }}</p>
	</div>
	<div class="col-sm-2">
		{!! Form::label('sn', 'F. Entrega', ['class'=>'font-weight-bold']) !!}
		<p class="form-control-sm">{{ $model->inventory->entrega }}</p>
	</div>
</div>

<div class="form-row">
	<div class="col-sm-12">
		<div id="field_inventory_trabajos" class="form-group">
			<label for="inventory_trabajos" class="font-weight-bold">Trabajos</label>
			<textarea class="form-control form-control-sm" id="inventory_trabajos" rows="3" name="inventory[trabajos]" readonly>{{(isset($model->inventory->trabajos))? trim($model->inventory->trabajos):''}}</textarea>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-sm-12">
		<div id="field_inventory_observaciones" class="form-group">
			<label for="inventory_observaciones" class="font-weight-bold">Observaciones</label>
			<textarea class="form-control form-control-sm" id="inventory_observaciones" rows="3" name="inventory[observaciones]" readonly>{{(isset($model->inventory->observaciones))? trim($model->inventory->observaciones):''}}</textarea>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-sm-3">
	@foreach (config('options.inventory.col_1') as $label)
		<div class="">
			@if( isset($model->inventory->$label) and $model->inventory->$label==true )
			<input type="hidden" value="on">
			<label class="" for="{{$label}}">{!! $icons['check'] !!}  {{ $label }}</label>
			@else
			<label class="" for="{{$label}}">{!! $icons['close'] !!}  {{ $label }}</label>
			@endif
		</div>
	@endforeach
	</div>
	<div class="col-sm-3">
	@foreach (config('options.inventory.col_2') as $label)
		<div class="">
			@if( isset($model->inventory->$label) and $model->inventory->$label==true )
			<input type="hidden" value="on">
			<label class="" for="{{$label}}">{!! $icons['check'] !!}  {{ $label }}</label>
			@else
			<label class="" for="{{$label}}">{!! $icons['close'] !!}  {{ $label }}</label>
			@endif
		</div>
	@endforeach
	</div>
</div>

<div class="form-row">
	<div class=" col-sm-12 mt-3 font-weight-bold">Evidencia Fotográfica Recepción</div>
	<div class="col-sm-12" id="carouselExampleControlsFotos">
		@php $fotos_recepcion_items = 0; @endphp
		@foreach($model->inventory->photos as $key => $photo)
			<input type="hidden" name="inventory[photos][0]" value="{{ $photo }}">
			@php $fotos_recepcion_items = $fotos_recepcion_items + 1; @endphp
		@endforeach
	</div>
</div>

<div class="container mt-3 mb-3 col-sm-6">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			@if(isset($model->inventory->photos))
				@foreach($model->inventory->photos as $key => $photo)
				@php
				$activo = ($key==0) ? 'active':'';
				@endphp
				<div class="carousel-item {{ $activo }}" id="carousel_element_{{ $key }}">
					<img class="d-block w-100" id="recepcion_img_{{ $key }}" src="/storage/{{ $photo }}">
				</div>
				@endforeach
			@endif
			<input type="hidden" value="{{ $fotos_recepcion_items }}" id="fotos_recepcion_items">
		</div>
		<button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</button>
	</div>
</div>

