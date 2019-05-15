@extends('layouts.layout')
@section('title') 
	Checkout 
@endsection
@section('content')
	<div class="row mb-5">
		<div class="col-lg-12">
			<h2>{{ $movie->title }}</h2>
		</div>
		<div class="col-lg-12">
			<h5>{{ $movie->release_date }}</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h4>CHECKOUT</h4>
			<hr>
			<div class="row">
				<div class="col-lg-5">
					<form action="#" method="#">
						@csrf
						<input type="hidden" id="inputMovieId" value="{{ $movie->_id}}">
						<label for="inputBranch" class="sr-only">Branch</label>
				        <div class="input-group mb-2">
				            <select class="custom-select" id="inputGroupSelectBranch" name="branch">
				                <option disabled selected>Select Branch</option>
				                @if(!isset($theatre))
					                
					                @foreach($theatres as $theatre_list)

					                	<option value="{{ $theatre_list->_id }}">{{ $theatre_list->branch }}</option>
					                
					                @endforeach

					            @else
					            	
					            	@foreach($theatres as $theatre_list)
					            		
					            		@if($theatre->_id == $theatre_list->_id)

					            		<option value="{{ $theatre_list->_id }}" selected>{{ $theatre_list->branch }}</option>
					            		
					            		@endif
					                	
					                	<option value="{{ $theatre_list->_id }}">{{ $theatre_list->branch }}</option>
					                
					                @endforeach

				                @endif
				            </select>
				            <div class="input-group-append">
				                <label class="input-group-text" for="inputGroupSelectBranch">Branch</label>
				            </div>
				        </div>
				        
			        </form>
			    </div>
			    <div class="col-lg-4">
				    <label for="inputDate" class="sr-only">Date</label>
			        <div class="input-group mb-2">
			            <select class="custom-select" id="inputGroupSelectDate" name="date">
			                <option disabled selected>Select Date</option>
			                @if(!empty($schedules))
				                @foreach($schedules as $schedule)
				                	<option value="{{ $theatre->_id }}">{{ $schedule->dates }}</option>
				                @endforeach
			                @endif
			            </select>
			            <div class="input-group-append">
			                <label class="input-group-text" for="inputGroupSelectDate">Date</label>
			            </div>
			        </div>
			    </div>
			    <div class="col-lg-3">
				    <label for="inputTimeDate" class="sr-only">Time</label>
			        <div class="input-group mb-2">
			            <select class="custom-select" id="inputGroupSelectTime" name="time">
			                <option disabled selected>Select Time</option>
			                @if(!empty($schedules))
				                @foreach($schedules as $schedule)
				                	<option value="{{ $theatre->_id }}">{{ $schedule->dates }}</option>
				                @endforeach
			                @endif
			            </select>
			            <div class="input-group-append">
			                <label class="input-group-text" for="inputGroupSelectTime">Time</label>
			            </div>
			        </div>
			    </div>
	        </div> 
        </div>
	</div>
@endsection
@section('custom_script')

<script src="{{ asset('js/checkout.js') }}"></script>


@endsection