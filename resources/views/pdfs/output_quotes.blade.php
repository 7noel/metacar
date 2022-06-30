<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/jpeg" href="./img/logo_metacar.png" />

	<title>Presupuesto: {{ $model->sn }}-{{ $model->created_at->formatLocalized('%Y') }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
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
		<div class="item-left">
			<img src="./img/logo_metacar.png" alt="" width="180px">
		</div>
		<div>
			<h1 class="center">
				PRESUPUESTO: {{ str_pad($model->sn, 3, '0', STR_PAD_LEFT) }} - {{ $model->created_at->formatLocalized('%Y') }}
			</h1>
			
		</div>
	</div>
	<div>
		<div>
			<strong class="label">Señor(a):</strong><span class="data-header">{{ $model->company->company_name }}</span>
		</div>
		<div>
			<strong class="label">Dirección:</strong><span class="data-header">{{ $model->company->address . ' ' . $model->company->ubigeo->departamento . '-' . $model->company->ubigeo->provincia . '-' . $model->company->ubigeo->distrito }}</span>
		</div>
		<div>
			<strong class="label">{{ config('options.client_doc.'.$model->company->id_type) }}:</strong><span class="data-header-1">{{ $model->company->doc }}</span>
			<strong class="label">Placa:</strong><span class="data-header">{{ $model->car->placa }}</span>
		</div>
		<div>
			<strong class="label">F. Emisión:</strong><span class="data-header-1">{{ $model->created_at->format('d/m/Y') }}</span>
			<strong class="label">Marca/Modelo:</strong><span class="data-header">{{ $model->car->modelo->brand->name.' '.$model->car->modelo->name }}</span>
		</div>
		<div>
			<strong class="label">Condiciones:</strong><span class="data-header-1">{{ config('options.payment_conditions.'.$model->payment_condition_id) }}</span>
			<strong class="label">Color:</strong><span class="data-header">{{ $model->car->color }}</span>
		</div>
		<div>
			<strong class="label">Servicio:</strong><span class="data-header-1">{{ $model->type_service }}</span>
			<strong class="label">Año:</strong><span class="data-header">{{ $model->car->year }}</span>
		</div>
		<div>
			<strong class="label">Asesor:</strong><span class="data-header-1">{{ $model->seller->company_name }}</span>
			<strong class="label">VIN:</strong><span class="data-header">{{ $model->car->vin }}</span>
		</div>
		@if(trim($model->comment)!="")
		<div>
			<strong class="label">Comentario:</strong><span class="data-header">{{$model->comment}}</span>
		</div>
		@endif
	</div>
	<br>
	<div class="container-items">
		<table class="table-items">
			<thead>
				<tr>
					<th class="th1 border center">ITEM</th>
					<th class="th2 border center">DESCRIPCIÓN</th>
					<th class="th3 border center">CANT.</th>
					<th class="th4 border center">P. UNIT.</th>
					<th class="th6 border center">TOTAL</th>
				</tr>
			</thead>
			<tbody>
				@php $cat='' @endphp
				@php $items=1 @endphp
				@foreach(collect($model->custom_details)->sortBy('categoria') as $key => $detail)
					@if($detail->categoria != $cat)
						<tr><td class="border padding" colspan="5"><strong>{{ $detail->categoria }}</strong></td></tr>
						@php $cat = $detail->categoria @endphp
					@endif
					<tr>
						<td class="border center">{{ $items }}</td>
						<td class="border">{{ strtoupper($detail->txtProduct) }}</td>
						<td class="border center">{{ $detail->quantity }}</td>
						<td class="border center">{{ $detail->value }}</td>
						<td class="border center">{{ $detail->total }}</td>
					</tr>
					@php $items++; @endphp
				@endforeach
				<tr>
					<td colspan="5">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td class="border center">SUB TOTAL</td>
					<td class="border center">{{ config('options.table_sunat.moneda_symbol.'.$model->currency_id)." ".number_format($model->subtotal,2) }}</td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td class="border center">IGV</td>
					<td class="border center">{{ config('options.table_sunat.moneda_symbol.'.$model->currency_id)." ".number_format($model->tax,2) }}</td>
				</tr>
				<tr>
					<td colspan="3"></td>
					<td class="border center"><strong>TOTAL</strong></td>
					<td class="border center"><strong>{{ config('options.table_sunat.moneda_symbol.'.$model->currency_id)." ".number_format($model->total, 2) }}</strong></td>
				</tr>
			</tbody> 
		</table>

		<br>
		<table class="table-quote-total" style="margin-left: 537px;">
			<tbody>
			</tbody>
		</table>
		<div>
			<b>OBSERVACIONES:</b><br>
			PRESUPUESTO EN {{ config('options.table_sunat.moneda.'.$model->currency_id) }} E INCLUIDO IGV <br>
			PRESUPUESTO SUJETO A VARIACION <br>
			VÁLIDO POR 15 DÍAS
		</div>

	</div>
	<footer>
		<div><strong>Cuentas: </strong></div>
		@foreach($cuentas as $cta)
			<div>
				<strong>{{ config('options.tipo_banco.'.$cta->type) }}</strong>
				{{ $cta->name }} - N° {{ $cta->number }} - 
				<strong>CCI N°</strong>
				{{ $cta->cci }} - {{ config('options.table_sunat.moneda.'.$cta->currency_id) }}
			</div>
		@endforeach
	</footer>
</body>
</html>