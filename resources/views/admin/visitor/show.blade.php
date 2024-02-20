@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/id-card-print.css') }}">
@endsection
@section('main-content')

	<section class="section">
        <div class="section-header">
            <h1>{{ __('visitor.visitors') }}</h1>
            {{ Breadcrumbs::render('visitors/show') }}
        </div>

        <div class="section-body">
        	<div class="row">
	   			<div class="col-4 col-md-4 col-lg-4">
			    	<div class="card">
                        <div class="card-header">
                            <a href="#" id="print" class="btn btn-icon icon-left btn-primary"><i class="fas fa-print"></i> {{ __('visitor.print_id_card') }}</a>
                        </div>
					    <div class="card-body ">
                            <div class="img-cards" id="printidcard">
                                <div class="id-card-holder">
                                    <div class="id-card">
                                        <div class="id-card-photo">
                                            @if($visitingDetails->getFirstMediaUrl('visitor'))
                                                <img src="{{ asset($visitingDetails->getFirstMediaUrl('visitor')) }}" alt="">
                                            @else
                                                <img src="{{ asset('images/'.setting('site_logo')) }}" alt="">
                                            @endif
                                        </div>
                                        <h2>{{optional($visitingDetails->visitor)->name}}</h2>
                                        <h3>{{__('C.I .: ')}}{{ $visitingDetails->visitor->national_identification_no}}</h3>
                                        <h3>{{__('Telefono : ')}}{{$visitingDetails->visitor->phone}}</h3>
                                        <h3>{{__('Empresa : ')}}{{$visitingDetails->company_name}}</h3>
                                        <h3>{{__('Direccion : ')}}{{$visitingDetails->visitor->address}}</h3>
                                        <h2>{{__('Visito A: ')}}</h2>
                                        <h3>{{__()}} {{$visitingDetails->employee->name}}</h3>
                                        <hr>
                                        <p><strong>{{ setting('site_name') }} </strong></p>
                                        <p><strong>{{ setting('site_address') }} </strong></p>
                                        <p>{{__('visitor.ph')}}: {{ setting('site_phone') }} | {{__('visitor.email')}}: {{ setting('site_email') }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
					    <!-- /.box-body -->
					</div>
				</div>
	   			<div class="col-8 col-md-8 col-lg-8">
			    	<div class="card">
			    		<div class="card-body">
			    			<div class="profile-desc">
			    				<div class="single-profile">
			    					<p><b>{{ __('visitor.first_name') }}: </b> {{ $visitingDetails->visitor->first_name}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('visitor.last_name') }}: </b> {{ $visitingDetails->visitor->last_name}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('visitor.email') }}: </b> {{ $visitingDetails->visitor->email}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('visitor.phone') }}: </b> {{ $visitingDetails->visitor->phone}}</p>
			    				</div>
                                <div class="single-profile">
			    					<p><b>{{ __('visitor.employee') }}: </b> {{ $visitingDetails->employee->user->name}}</p>
			    				</div>
                                <div class="single-profile">
                                    <p><b>{{ __('visitor.purpose') }}: </b> {{ $visitingDetails->purpose}}</p>
                                </div>
                                <div class="single-profile">
                                    <p><b>{{ __('visitor.company_name') }}: </b> {{ $visitingDetails->company_name}}</p>
                                </div>
                                <div class="single-profile">
                                    <p><b>{{ __('visitor.national_identification_no') }}: </b> {{ $visitingDetails->visitor->national_identification_no}}</p>
                                </div>
			    				<div class="single-profile">
			    					<p><b>{{ __('visitor.date') }}: </b> {{date('d-m-Y', strtotime($visitingDetails->created_at))}}</p>
			    				</div>
                                <div class="single-profile">
			    					<p><b>{{ __('visitor.checkin') }}: </b> {{date('d-m-Y h:i A', strtotime($visitingDetails->checkin_at))}}</p>
			    				</div>
                                @if($visitingDetails->checkout_at)
                                <div class="single-profile">
			    					<p><b>{{ __('visitor.checkout') }}: </b> {{date('d-m-Y h:i A', strtotime($visitingDetails->checkout_at))}}</p>
			    				</div>
                                @endif
                                <div class="single-profile">
                                    <p><b>{{ __('visitor.address') }}: </b> {{ $visitingDetails->visitor->address}}</p>
                                </div>
                                <div class="single-profile">
                                    <p><b>{{ __('levels.status') }}: </b> {{ $visitingDetails->status== App\Enums\VisitorStatus::PENDDING ||  $visitingDetails->status== App\Enums\VisitorStatus::ACCEPT || $visitingDetails->status== App\Enums\VisitorStatus::REJECT ? trans('visitor_statuses.' . $visitingDetails->status) : ''}}</p>                                
                                </div>
                                @if($visitingDetails->disable)
                                <div class="single-profile">
			    					<p><b>{{ __('levels.disabled') }}: </b><span class="badge badge-danger">Visitor Blocked</span></p>
			    				</div>
                                @endif
			    			</div>

                            @if (setting('whatsapp_message'))
                                <div class="float-right">
                                    <a id=waButton href="https://wa.me/{{$visitingDetails->visitor->phone}}?text={!! strip_tags(setting('whatsapp_decline_message')) !!}" target="_blank" class="btn btn-danger">Reject WhatsApp</a>
                                </div> 
								<div class="float-right">
									<a id=waButton href="https://wa.me/{{$visitingDetails->visitor->phone}}?text={!! strip_tags(setting('whatsapp_accept_message')) !!}{{ route('qrcode',$visitingDetails->visitor->phone) }}" target="_blank" class="btn btn-success mr-1">Send WhatsApp</a>
								</div> 
                                
							@endif
			    		</div>
			    	</div>
				</div>
        	</div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <script>
        var idCardCss = "{{ asset('css/id-card-print.css') }}";
    </script>

    <script src="{{ asset('js/visitor/view.js') }}"></script>
@endsection
