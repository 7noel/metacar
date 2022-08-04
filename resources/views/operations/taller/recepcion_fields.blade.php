<div class="form-row">
	<div class="col-md-1 col-sm-2">
		{!! Form::label('sn', 'OT') !!}
		@if(isset($model) and $model->order_type == 'output_orders')
		{!! Form::text('sn', null, ['class'=>'form-control-sm form-control-plaintext text-center', 'readonly']) !!}
		@else
		{!! Form::text('sn', '',['class'=>'form-control-sm form-control-plaintext text-center', 'readonly']) !!}
		@endif
	</div>
	@if(isset($quote->id))
	<div class="col-md-1 col-sm-2">
		{!! Form::hidden('order_id', $quote->id, ['id'=>'order_id']) !!}
		{!! Form::label('quote_sn', 'Pres.') !!}
		{!! Form::text('quote_sn', $quote->sn, ['class'=>'form-control-sm form-control-plaintext text-center', 'readonly']) !!}
	</div>
	@endif
	<div class="col-md-1 col-sm-2">
		{!! Field::text('placa', ((isset($car))? $car->placa : null), ['label' => 'Placa', 'class'=>'form-control-sm text-uppercase', 'required']) !!}
	</div>
	<div class="col-md-1 col-sm-2">
		{!! Field::number('kilometraje', null, ['label' => 'Kilom.', 'class'=>'form-control-sm text-uppercase', 'required']) !!}
	</div>
	<div class="col-sm-1">
		{!! Field::select('currency_id', config('options.table_sunat.moneda'), (isset($model) ? null : 1), ['empty'=>'Seleccionar', 'label'=>'Moneda', 'class'=>'form-control-sm', 'required']) !!}
	</div>
	<div class="col-sm-2">
		{!! Field::select('type_service', config('options.types_service'), ['empty'=>'Seleccionar', 'label'=>'Servicio', 'class'=>'form-control-sm', 'required']) !!}
	</div>
	<div class="col-sm-1 d-none">
		{!! Field::select('preventivo', config('options.preventivos'), ['empty'=>'Seleccionar', 'label'=>'Preventivo', 'class'=>'form-control-sm']) !!}
	</div>
	<div class="col-md-2 col-sm-4">
		@if(isset(\Auth::user()->employee->job_id) and (\Auth::user()->employee->job_id == 8 or \Auth::user()->id==3))
		{!! Field::select('seller_id', [\Auth::user()->employee->id => \Auth::user()->employee->full_name], ['empty'=>'Seleccionar', 'label'=>'Asesor', 'class'=>'form-control-sm', 'required']) !!}
		@else
		{!! Field::select('seller_id', $sellers, ['empty'=>'Seleccionar', 'label'=>'Asesor', 'class'=>'form-control-sm', 'required']) !!}
		@endif
	</div>
	<div class="col-md-2 col-sm-4">
		{!! Field::select('repairman_id', $repairmens, ['empty'=>'Seleccionar', 'label'=>'Técnico', 'class'=>'form-control-sm', 'required']) !!}
	</div>
	<div class="col-sm-2">
		{!! Field::select('payment_condition_id', $payment_conditions, (isset($model) ? null : 1), ['empty'=>'Seleccionar', 'label'=>'Cond. P.', 'class'=>'form-control-sm', 'required']) !!}
	</div>
	<div class="col-md-2 col-sm-4">
		{!! Field::text('attention', ((isset($car))? $car->contact_name : null), ['label' => 'Atención', 'class'=>'form-control-sm text-uppercase']) !!}
	</div>
	<div class="col-md-4 col-sm-6">
		{!! Field::text('comment', ['label' => 'Comentarios', 'class'=>'form-control-sm text-uppercase']) !!}
	</div>
	<div class="col-sm-2">
		<div id="field_inventory_combustible" class="form-group">
			<label for="inventory_combustible">
				Combustible
			</label>
			<input class="" id="inventory_combustible" name="inventory[combustible]" type="range" step='25' value="{{(isset($model->inventory['combustible']))? $model->inventory['combustible']:''}}">
		</div>
	</div>
	<div class="col-sm-2">
		{!! Field::select('inventory[comprobante]', ['FACTURA'=>'FACTURA', 'BOLETA'=>'BOLETA'], (isset($model->inventory['comprobante']) ? $model->inventory['comprobante'] : ''), ['empty'=>'SIN COMPROBANTE', 'label'=>'Comprobante', 'class'=>'form-control-sm']) !!}
	</div>
	<div class="col-sm-2">
		{!! Field::date('inventory[entrega]', (isset($model->inventory['entrega']) ? $model->inventory['entrega'] : date('Y-m-d')), ['label'=>'F. Entrega', 'class'=>'form-control-sm']) !!}
	</div>
</div>

<div class="form-row">
	<div class="col-sm-12">
		<div id="field_inventory_trabajos" class="form-group">
			<label for="inventory_trabajos">Trabajos</label>
			<textarea class="form-control form-control-sm" id="inventory_trabajos" rows="3" name="inventory[trabajos]">{{(isset($model->inventory['trabajos']))? trim($model->inventory['trabajos']):''}}</textarea>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-sm-12">
		<div id="field_inventory_observaciones" class="form-group">
			<label for="inventory_observaciones">Observaciones</label>
			<textarea class="form-control form-control-sm" id="inventory_observaciones" rows="3" name="inventory[observaciones]">{{(isset($model->inventory['observaciones']))? trim($model->inventory['observaciones']):''}}</textarea>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-sm-3">
	@foreach (config('options.inventory.col_1') as $label)
		<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="{{$label}}" name="inventory[{{$label}}]" {{ ((isset($model->inventory[$label]) and $model->inventory[$label]==true))?'checked':'' }}>
			<label class="custom-control-label" for="{{$label}}">{{ $label }}</label>
		</div>
	@endforeach
	</div>
	<div class="col-sm-3">
	@foreach (config('options.inventory.col_2') as $label)
		<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="{{$label}}" name="inventory[{{$label}}]" {{((isset($model->inventory[$label]) and $model->inventory[$label]==true))?'checked':''}}>
			<label class="custom-control-label" for="{{$label}}">{{ $label }}</label>
		</div>
	@endforeach
	</div>
</div>

<div class="form-row mb-3">
	<div id="carouselRecepcion" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		</div>
		<a class="carousel-control-prev" href="#carouselRecepcion" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselRecepcion" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
</div>

<div class="form-row mt-3">
	<div class=" col-sm-12">FOTOS</div>
	<div class="col-sm-12" id="carouselRecepcionFotos">
		<input type="file" class="form-control-file" accept="image/*" capture="camera" onchange="loadFile(event, 'carouselRecepcion')">
		
	</div>
</div>