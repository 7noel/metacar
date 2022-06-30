<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>INVENTARIO: {{ $model->sn }}-{{ $model->created_at->formatLocalized('%Y') }}</title>
	<link rel="stylesheet" href="./css/order_pdf.css">
</head>
<body>
	<script type="text/php">
	if ( isset($pdf) ) {
		$pdf->page_script('
			$font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
			$pdf->text(270, 810, "Página $PAGE_NUM de $PAGE_COUNT", $font, 8);
		');
	}
	</script>
	<div class="header">
		<div class="item-left2 d-block col_1">
			<img src="./img/logo_metacar.png" alt="" width="180px">
			<div class="company_name">{{ $model->mycompany->company_name }}</div>
			<div>{{ $model->mycompany->address}}</div>
			<div>{{ $model->mycompany->ubigeo->departamento.' - '.$model->mycompany->ubigeo->provincia.' - '.$model->mycompany->ubigeo->distrito }}</div>
			@if($model->mycompany->phone != '')
			<div>Central Telefónica: {{ $model->mycompany->phone }}</div>
			@endif
			@if($model->mycompany->mobile != '')
			<div>Cel: {{ $model->mycompany->mobile }}</div>
			@endif
			@if($model->mycompany->email != '')
			<div>Correo: {{ $model->mycompany->email }}</div>
			@endif
		</div>
		<div class="d-block col_2">
				ORDEN DE SERVICIO<br>
				{{ str_pad($model->sn, 3, '0', STR_PAD_LEFT) }} - {{ $model->created_at->formatLocalized('%Y') }}
		</div>
	</div>
	<div>
		<div>
			<strong class="label">F. Emisión:</strong><span class="data-header-1">{{ $model->created_at->format('d/m/Y') }} {{ $model->created_at->format('h:i a') }}</span>
			<strong class="label">Placa:</strong><span class="data-header">{{ $model->car->placa }}</span>
		</div>
		<div>
			<strong class="label">Señor(a):</strong><span class="data-header-1">{{ $model->company->company_name }}</span>
			<strong class="label">Marca/Modelo:</strong><span class="data-header">{{ $model->car->modelo->brand->name.' '.$model->car->modelo->name }}</span>
		</div>
		<div>
			<strong class="label">{{ config('options.client_doc.'.$model->company->id_type) }}:</strong><span class="data-header-1">{{ $model->company->doc }}</span>
			<strong class="label">Año:</strong><span class="data-header">{{ $model->car->year }}</span>
		</div>
		<div>
			<strong class="label">Dirección:</strong><span class="data-header-1">{{ $model->company->address . ' ' . $model->company->ubigeo->departamento . '-' . $model->company->ubigeo->provincia . '-' . $model->company->ubigeo->distrito }}</span>
			<strong class="label">VIN:</strong><span class="data-header">{{ $model->car->vin }}</span>
		</div>
		<div>
			<strong class="label">Servicio:</strong><span class="data-header-1">{{ $model->type_service }}</span>
			<strong class="label">Kilometraje::</strong><span class="data-header">{{ number_format($model->kilometraje) }} km</span>
		</div>
		<div>
			<strong class="label">Responsable:</strong><span class="data-header-1">{{ $model->repairman->company_name }}</span>
			@if(isset($model->inventory['entrega']) and trim($model->inventory['entrega'])!="")
			<strong class="label">F. Entrega::</strong><span class="data-header">{{ date('d/m/Y', strtotime($model->inventory['entrega'])) }}</span>
			@endif
		</div>
		@if(trim($model->comment)!="")
		<div>
			<strong class="label">Comentario:</strong><span class="data-header">{{ $model->comment }}</span>
		</div>
		@endif
	</div>
	@if(isset($model->inventory['trabajos']) and trim($model->inventory['trabajos']) != '')
	<div class="trabajos">
		<p class="uppercase">
			<strong>Trabajos:</strong>
		</p>
		<div>
			<span>{!! nl2br($model->inventory['trabajos']) !!}</span>
		</div>
	</div>
	@endif
	@if(isset($model->inventory['observaciones']) and trim($model->inventory['observaciones']) != '')
	<div class="observaciones">
		<p>
			<strong class="uppercase">Observaciones:</strong> <span>{!! nl2br($model->inventory['observaciones']) !!}</span>
		</p>
	</div>
	@endif
		
	<div class="">
		<?php 
		$check = '<div style="font-family: DejaVu Sans, sans-serif;">✔</div>';
		$aspa = '<div style="font-family: DejaVu Sans, sans-serif;">✗</div>';
		$columnas = 4;
		 ?>
		<p class="uppercase">
			<strong>Inventario de recepción:</strong>
		</p>
		<div class="col_inv">
			<table class="table-inventory">
			@foreach (config('options.inventory.col_1') as $label)
				<tr>
					<td class='col-check border'>
						{!! ((isset($model->inventory[$label]) and $model->inventory[$label]==true)) ? $check : "&nbsp;" !!}
					</td>
					<td class='col-description'>{{ $label }}</td>
				</tr>
			@endforeach
			</table>
		</div>
		<div class="col_inv">
			<table class="table-inventory">
			@foreach (config('options.inventory.col_2') as $label)
				<tr>
					<td class='col-check border'>
						{!! ((isset($model->inventory[$label]) and $model->inventory[$label]==true)) ? $check : "&nbsp;" !!}
					</td>
					<td class='col-description'>{{ $label }}</td>
				</tr>
			@endforeach
			</table>

					<p>Combustible: {{ $model->inventory['combustible'] }} %</p>
		</div>
		<div class='col_img'>
			<img src="{{ (\Storage::disk('public')->exists('ot_'.$model->id.'.jpg'))?asset('/storage/ot_'.$model->id.'.jpg'):asset('/img/inventory.jpeg') }}" alt="" class="inventory-image">
		</div>
	</div>
	@if(1==0)
	<div class="combustible">
		<img width="170px" src="{{ asset('/img/combustible.jpeg') }}" alt="">
	</div>
	@endif
	<div>
		<div class="col_footer_1">
			@if(isset($model->inventory['comprobante']) and trim($model->inventory['comprobante'])!="")
			<div>
				<p><strong>Cliente solicita:</strong><span> {{ $model->inventory['comprobante'] }}</span></p>
			</div>
			@endif
			<div align="">
				<br>
				<small>- Para trabajos de terceros los autorizo enviar mi vehículo a un taller de su confianza y elección.</small>
				<br>
				<small>- Con la presente autorizo el trabajo arriba descrito junto con las piezas de repuesto y otros materiales necesarios para efectuarlo y autorizo a Uds. a sus empleados a operar el vehículo arriba específicado en las calles o carreteras para probarlo y revisarlo.</small>
			</div>
			
		</div>
		<div class="col_footer_2">
			<div class="firmas">
				<div class="firma">CLIENTE</div>
			</div>
		</div>
	</div>

	<footer>
	</footer>
</body>
</html>