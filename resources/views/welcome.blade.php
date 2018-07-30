@extends('layouts.app')

@section('content')
<div class="center_box cb">
				<div class="uo_tabs cf">
					<a href="#"><span>profile</a>
					<a href="#"><span>Reviews</span></a>
					<a href="#"><span>orders</span></a>
					<a href="#" class="active"><span>My Address</span></a>
					<a href="#"><span>Settings</span></a>
				</div>
				<div class="page_content bg_gray">
					<div class="uo_header">
						<div class="wrapper cf">
							<div class="wbox ava">
								<figure><img src="imgc/user_ava_1_140.jpg" alt="Helena Afrassiabi" /></figure>
							</div>
							<div class="main_info">
								<h1>Helena Afrassiabi</h1>
								<div class="midbox">
									<h4>560 points</h4>
									<div class="info_nav">
										<a href="#">Get Free Points</a>
										<span class="sepor"></span>
										<a href="#">Win iPad</a>
									</div>
								</div>
								<div class="stat">
									<div class="item">
										<div class="num">30</div>
										<div class="title">total orders</div>
									</div>
									<div class="item">
										<div class="num">14</div>
										<div class="title">total reviews</div>
									</div>
									<div class="item">
										<div class="num">0</div>
										<div class="title">total gifts</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="uo_body">
						<div class="wrapper">
							<div class="uofb cf">
								<div class="l_col adrs">
                                    @include('inc.messages')
									<h2>Add New Address</h2>
									
									<form action="{{ route('address.store') }}" method="POST">
										<div class="field">
											<label>Name *</label>
											<input type="text" name="name" value="" palceholder="" class="vl_empty" />
										</div>
										<div class="field">
											<label>Your city *</label>
											<select name="city" class="vl_empty">
												<option class="plh"></option>
                                                @if(isset($cities) and count($cities) > 0)
                                                @foreach($cities as $index => $city)
												<option>{{ $city->name }}</option>
                                                @endforeach
                                                @endif
											</select>
										</div>
										<div class="field">
											<label>Your area *</label>
											<select name="area">
												<option class="plh"></option>
                                                @if(isset($areas) and count($areas) > 0)
                                                @foreach($areas as $area)
												<option>{{ $area->name }}</option>
                                                @endforeach
                                                @endif
											</select>
										</div>
										
										<div class="field">
											<label>Street</label>
											<input type="text" name="street" value="" palceholder="" class="vl_empty" />
										</div>
										<div class="field">
											<label>House # </label>
											<input type="text" name="house" value="" palceholder="House Name / Number" />
										</div>
										
										<div class="field">
											<label class="pos_top">Additional information</label>
											<textarea name="additional_info"></textarea>
										</div>
										
										<div class="field">
											<input type="hidden" name="_token" value="{{ csrf_token() }}" />
										</div>
										
										<div class="field">
											<input type="submit" value="add address" class="green_btn" />
										</div>
									</form>
								</div>
								
								<div class="r_col">
									<h2>My Addresses</h2>									
									
                                    @if(isset($addresses) and count($addresses) > 0)
									<div class="uo_adr_list">
                                        @foreach($addresses as $address)
                                        <div class="item">
                                            <h3>{{ $address->name }}</h3>
                                            <p>{{ $address->city->name }}, {{ $address->area->name }}{{ ! empty($address->street) ? ', ' . $address->street : '' }}{{ ! empty($address->house) ? ', ' . $address->house : '' }}{!! ! empty($address->additional_info) ? ', ' . nl2br(e($address->additional_info)) : '' !!}</p>
                                            <div class="actbox">
                                                <a href="{{ route('address.delete', $address->id) }}" class="bcross"></a>
                                            </div>
                                        </div>
                                        @endforeach
									</div>
                                    @endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection('content')
