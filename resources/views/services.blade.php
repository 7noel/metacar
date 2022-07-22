@extends('layouts.app-services')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="recepcion-tab" data-toggle="tab" data-target="#recepcion" type="button" role="tab" aria-controls="recepcion" aria-selected="true">{!! $icons['car'] !!}</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="diagnostico-tab" data-toggle="tab" data-target="#diagnostico" type="button" role="tab" aria-controls="diagnostico" aria-selected="false">{!! $icons['view'] !!}</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="repuestos-tab" data-toggle="tab" data-target="#repuestos" type="button" role="tab" aria-controls="repuestos" aria-selected="false"><i class="fas fa-box"></i></button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="aprobacion-tab" data-toggle="tab" data-target="#aprobacion" type="button" role="tab" aria-controls="aprobacion" aria-selected="false"><i class="fas fa-check"></i></button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="reparacion-tab" data-toggle="tab" data-target="#reparacion" type="button" role="tab" aria-controls="reparacion" aria-selected="false"><i class="fas fa-wrench"></i></button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="control-tab" data-toggle="tab" data-target="#control" type="button" role="tab" aria-controls="control" aria-selected="false"><i class="fa-regular fa-circle-check"></i></button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="entrega-tab" data-toggle="tab" data-target="#entrega" type="button" role="tab" aria-controls="entrega" aria-selected="false"><i class="fas fa-door-open"></i></button>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="recepcion" role="tabpanel" aria-labelledby="recepcion-tab">
					<h2>RECEPCION</h2>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<div class="row">
									<div class="form-check radio_check">
										<input class="form-check-input" type="radio" name="radio_select" id="radiosfoto" value="1" checked>
										<label class="form-check-label" for="radiosfoto">Seleccionar Foto</label>
									</div>
									<div class="form-check radio_check">
										<input class="form-check-input" type="radio" name="radio_select" id="radiotfoto" value="0">
										<label class="form-check-label" for="radiotfoto">Tomar Foto</label>
									</div>
								</div>
							</fieldset>
							<div class="container_radio">
								<input type="file" class="form-control-file video_container" name="archivo" id="subirfoto" accept="image/*">
								<video id="video" autoplay="autoplay" class="video_container none"></video>
							</div>
						</div>
						<canvas id="canvas" class="none"></canvas>
				</div>
				<div class="tab-pane fade" id="diagnostico" role="tabpanel" aria-labelledby="diagnostico-tab">
					<h2>DIAGNOSTICO</h2>
				</div>
				<div class="tab-pane fade" id="repuestos" role="tabpanel" aria-labelledby="repuestos-tab">
					<h2>REPUESTOS</h2>
				</div>
				<div class="tab-pane fade" id="aprobacion" role="tabpanel" aria-labelledby="aprobacion-tab">
					<h2>APROBACION</h2>
				</div>
				<div class="tab-pane fade" id="reparacion" role="tabpanel" aria-labelledby="reparacion-tab">
					<h2>REPARACION</h2>
				</div>
				<div class="tab-pane fade" id="control" role="tabpanel" aria-labelledby="control-tab">
					<h2>CONTROL</h2>
				</div>
				<div class="tab-pane fade" id="entrega" role="tabpanel" aria-labelledby="entrega-tab">
					<h2>ENTREGA</h2>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('scripts')


@endsection