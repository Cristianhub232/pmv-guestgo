@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endsection

@section('main-content')

<section class="section">
    <div class="section-header">
        <h1>{{ __('pre_register.pre_register') }}</h1>
        {{ Breadcrumbs::render('pre-registers/add') }}
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('admin.pre-registers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="first_name">{{ __('pre_register.first_name') }}</label> <span
                                        class="text-danger">*</span>
                                    <input id="first_name" type="text" name="first_name"
                                        class="form-control {{ $errors->has('first_name') ? " is-invalid " : '' }}"
                                        value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="last_name">{{ __('pre_register.last_name') }}</label> <span
                                        class="text-danger">*</span>
                                    <input id="last_name" type="text" name="last_name"
                                        class="form-control {{ $errors->has('last_name') ? " is-invalid " : '' }}"
                                        value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>{{ __('pre_register.email_address') }}</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label>{{ __('pre_register.phone') }}</label> <span
                                        class="text-danger">*</span><span class="text-info"> (With Country Code,Without
                                        + sign)</span>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label>{{ __('visitor.national_identification_no') }}</label> <span class="text-danger">*</span>
                                    <input type="text" name="national_identification_no"
                                        class="form-control @error('national_identification_no') is-invalid @enderror"
                                        value="{{ old('national_identification_no') }}">
                                    @error('national_identification_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="gender">{{ __('pre_register.gender') }}</label> <span
                                        class="text-danger">*</span>
                                    <select id="gender" name="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        @foreach(trans('genders') as $key => $gender)
                                        <option value="{{ $key }}" {{ (old('gender') == $key) ? 'selected' : '' }}>
                                            {{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="employee_id">{{ __('pre_register.select_employee') }}</label> <span
                                        class="text-danger">*</span>
                                    <select id="employee_id" name="employee_id"
                                        class="form-control select2 @error('employee_id') is-invalid @enderror">
                                        @foreach($employees as $key => $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ (old('employee_id') == $employee->id) ? 'selected' : '' }}>
                                            {{ $employee->name }} ( {{ optional($employee->department)->name }} )
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('employee_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label>{{ __('pre_register.expected_date') }}</label> <span
                                        class="text-danger">*</span>
                                    <input type="text" autocomplete="off" id="date-picker" name="expected_date"
                                        class="form-control @error('expected_date') is-invalid @enderror"
                                        value="{{ old('expected_date') }}">
                                    @error('expected_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="expected_time">{{ __('pre_register.expected_time') }}</label> <span
                                        class="text-danger">*</span>
                                    <input id="expected_time" type="text" name="expected_time"
                                        class="form-control  timepicker @error('expected_time') is-invalid @enderror"
                                        value="{{ old('expected_time') }}">
                                    @error('expected_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="comment">{{ __('pre_register.comment') }}</label>
                                    <textarea name="comment" class="summernote-simple form-control height-textarea @error('comment')
                                                      is-invalid @enderror" id="comment">
                                            {{ old('comment') }}
                                        </textarea>
                                    @error('comment')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="address">{{ __('pre_register.address') }}</label>
                                    <textarea name="address" class="summernote-simple form-control height-textarea @error('address')
                                                      is-invalid @enderror" id="address">
                                            {{ old('address') }}
                                        </textarea>
                                    @error('about')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="card-footer ">
                            <button class="btn btn-primary mr-1" type="submit">{{ __('levels.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('js/preregister/create.js') }}"></script>
@endsection
