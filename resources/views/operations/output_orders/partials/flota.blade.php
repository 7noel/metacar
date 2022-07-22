<div class="form-row">
	<div class="col-sm-12 form-inline">
		<table class="table table-hover table-sm">
			<thead>
				<tr>
					<th width="250px">Exterior</th>
					<th>Valores</th>
					<th>Comentario</th>
				</tr>
			</thead>
			<tbody>
			@foreach (config('options.eva_exterior') as $label => $details)
				<tr>
					<td>{{ $label }}</td>
					<td>
					@foreach($details as $item)
						@if($item == 'status')
						<div class="">
							{!! Form::select($item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						</div>
						@elseif($item == 'q')
						@elseif($item == 'comment')
						@else
							{{ $item }} 
							{!! Form::select($label.'_'.$item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						@endif
					@endforeach
					</td>
					<td>
						<input style="width:400px;" class="form-control form-control-sm" type="text" placeholder="">
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<table class="table table-hover table-sm">
			<thead>
				<tr>
					<th width="250px">Interior</th>
					<th>Valores</th>
					<th>Comentario</th>
				</tr>
			</thead>
			<tbody>
			@foreach (config('options.eva_interior') as $label => $details)
				<tr>
					<td>{{ $label }}</td>
					<td>
					@foreach($details as $item)
						@if($item == 'status')
						<div class="">
							{!! Form::select($item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						</div>
						@elseif($item == 'q')
						@elseif($item == 'comment')
						@else
							{{ $item }} 
							{!! Form::select($label.'_'.$item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						@endif
					@endforeach
					</td>
					<td>
						<input style="width:400px;" class="form-control form-control-sm" type="text" placeholder="">
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<table class="table table-hover table-sm">
			<thead>
				<tr>
					<th width="250px">Planchado</th>
					<th>Valores</th>
					<th>Comentario</th>
				</tr>
			</thead>
			<tbody>
			@foreach (config('options.eva_planchado') as $label => $details)
				<tr>
					<td>{{ $label }}</td>
					<td>
					@foreach($details as $item)
						@if($item == 'status')
						<div class="">
							{!! Form::select($item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						</div>
						@elseif($item == 'price')
							{!! Form::number($label.'_'.$item, null, ['class'=> 'form-control form-control-sm', 'step'=>'0.01']) !!}
						@elseif($item == 'comment')
						@else
							{{ $item }} 
							{!! Form::select($label.'_'.$item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						@endif
					@endforeach
					</td>
					<td>
						<input style="width:400px;" class="form-control form-control-sm" type="text" placeholder="">
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<table class="table table-hover table-sm">
			<thead>
				<tr>
					<th width="250px">Pintura</th>
					<th>Valores</th>
					<th>Comentario</th>
				</tr>
			</thead>
			<tbody>
			@foreach (config('options.eva_pintura') as $label => $details)
				<tr>
					<td>{{ $label }}</td>
					<td>
					@foreach($details as $item)
						@if($item == 'status')
						<div class="">
							{!! Form::select($item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						</div>
						@elseif($item == 'price')
							{!! Form::number($label.'_'.$item, null, ['class'=> 'form-control form-control-sm', 'step'=>'0.01']) !!}
						@elseif($item == 'comment')
						@else
							{{ $item }} 
							{!! Form::select($label.'_'.$item, ['R'=>'R', 'C'=>'C', 'OK'=>'OK', 'X'=>'X'], 'X', ['class'=> 'form-control form-control-sm']) !!}
						@endif
					@endforeach
					</td>
					<td>
						<input style="width:400px;" class="form-control form-control-sm" type="text" placeholder="">
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>