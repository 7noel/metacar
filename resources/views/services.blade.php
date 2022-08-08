@extends('layouts.app')

@section('content')
<div class="container">

@php
$models_1 = $models->where('status', 'PEND');
$models_2 = $models->where('status', 'DIAG');
$models_3 = $models->where('status', 'REPU');
$models_4 = $models->where('status', 'APROB');
$models_5 = $models->where('status', 'REPAR');
$models_6 = $models->where('status', 'CONTR');
$models_7 = $models->where('status', 'ENTR');

@endphp
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="recepcion-tab" data-toggle="tab" data-target="#recepcion" type="button" role="tab" aria-controls="recepcion" aria-selected="true">{!! $icons['car'] !!} <br> <span class="badge badge-light">{{ $models_1->count() }}</span> </button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="diagnostico-tab" data-toggle="tab" data-target="#diagnostico" type="button" role="tab" aria-controls="diagnostico" aria-selected="false">{!! $icons['view'] !!} <br> <span class="badge badge-light">{{ $models_2->count() }}</span> </button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="repuestos-tab" data-toggle="tab" data-target="#repuestos" type="button" role="tab" aria-controls="repuestos" aria-selected="false"><i class="fas fa-box"></i> <br> <span class="badge badge-light">{{ $models_3->count() }}</span> </button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="aprobacion-tab" data-toggle="tab" data-target="#aprobacion" type="button" role="tab" aria-controls="aprobacion" aria-selected="false"><i class="fas fa-check"></i> <br> <span class="badge badge-light">{{ $models_4->count() }}</span> </button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="reparacion-tab" data-toggle="tab" data-target="#reparacion" type="button" role="tab" aria-controls="reparacion" aria-selected="false"><i class="fas fa-wrench"></i> <br> <span class="badge badge-light">{{ $models_5->count() }}</span> </button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="control-tab" data-toggle="tab" data-target="#control" type="button" role="tab" aria-controls="control" aria-selected="false"><i class="fa-regular fa-circle-check"></i> <br> <span class="badge badge-light">{{ $models_6->count() }}</span> </button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="entrega-tab" data-toggle="tab" data-target="#entrega" type="button" role="tab" aria-controls="entrega" aria-selected="false"><i class="fas fa-door-open"></i> <br> <span class="badge badge-light">{{ $models_7->count() }}</span> </button>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="recepcion" role="tabpanel" aria-labelledby="recepcion-tab">
					<h3>RECEPCIÓN <a href="{{ route('recepcion.create') }}" type="button" class="btn btn-primary btn-sm btn-circle">{!! $icons['add'] !!}</a></h3>
					<div class="row">
						@foreach ($models_1 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }}
										<a href="{{ route( 'recepcion.edit' , $model) }}" type="button" class="btn btn-outline-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" type="button" class="btn btn-outline-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->created_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>


				</div>
				<div class="tab-pane fade" id="diagnostico" role="tabpanel" aria-labelledby="diagnostico-tab">
					<h3>DIAGNÓSTICO</h3>
					<div class="row">
						@foreach ($models_2 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }} 
										<a href="https://wa.me/+51{{ $model->company->mobile }}?text={{ route( 'order_client' , $model) }}" target="_blank" class="btn btn-outline-info btn-sm btn-circle">{!! $icons['whatsapp'] !!}</a>
										<a href="{{ route( 'recepcion.edit' , $model) }}" class="btn btn-outline-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" class="btn btn-outline-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->diag_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="repuestos" role="tabpanel" aria-labelledby="repuestos-tab">
					<h3>REPUESTOS</h3>
					<div class="row">
						@foreach ($models_3 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }}
										<a href="{{ route( 'recepcion.edit' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->repu_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="aprobacion" role="tabpanel" aria-labelledby="aprobacion-tab">
					<h3>APROBACION</h3>
					<div class="row">
						@foreach ($models_4 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }}
										<a href="{{ route( 'recepcion.edit' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->approved_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="reparacion" role="tabpanel" aria-labelledby="reparacion-tab">
					<h3>REPARACION</h3>
					<div class="row">
						@foreach ($models_5 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }}
										<a href="{{ route( 'recepcion.edit' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->repar_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header pb-0 pt-0" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Mecánica
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0 pt-0" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Planchado
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Some placeholder content for the second accordion panel. This panel is hidden by default.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0 pt-0" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Pintura
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0 pt-0" id="armado-tab">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Armado
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="armado-tab" data-parent="#accordionExample">
      <div class="card-body">
        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0 pt-0" id="pulido-tab">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Pulido
        </button>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="pulido-tab" data-parent="#accordionExample">
      <div class="card-body">
        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
      </div>
    </div>
  </div>
</div>
				</div>
				<div class="tab-pane fade" id="control" role="tabpanel" aria-labelledby="control-tab">
					<h3>CONTROL</h3>
					<div class="row">
						@foreach ($models_6 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }}
										<a href="{{ route( 'recepcion.edit' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->checked_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="entrega" role="tabpanel" aria-labelledby="entrega-tab">
					<h3>ENTREGA</h3>
					<div class="row">
						@foreach ($models_7 as $model)
						<div class="col-sm-6 col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">#{{ $model->sn }} - {{ $model->car->modelo->brand->name }} {{ $model->car->modelo->name }} {{ $model->car->placa }}
										<a href="{{ route( 'recepcion.edit' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle">{!! $icons['edit'] !!}</a>
										<a href="{{ route( 'change_status_order' , $model) }}" type="button" class="btn btn-info btn-sm btn-circle"><i class="fa-solid fa-arrow-right"></i></a>
									</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $model->company->company_name }}</h6>
									<p class="card-text">{{ $model->send_at->diffForHumans() }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>
</div>



@endsection

@section('scripts')


@endsection