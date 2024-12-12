@extends('layouts.dashboard')
@section('content')
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Create new type of hour</h2>
                        </div>
                        <!-- End All Notification Heading -->
                        
                        <div class="nftmax__item">
                            
                            <form class="form" action="{{ route('type_hours.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            <div class="row nftmax-pcolumn">
                                                <div class="col-xxl-12 col-lg-12 col-12 nftmax-pcolumn__two">
                                                    <div class="nftmax__item-form--main">
                                                    
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Name</label>
                                                            <input class="nftmax__item-input" name="name" type="text" placeholder="Overtime" value="{{ old('name') }}" required="required">
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Category </label>
                                                            <select class="form-select input-select-custom" name="type" aria-label="Category select">
                                                                <option selected value="1">Normal</option>
                                                                <option value="2">Time Paid Off</option>

                                                              </select>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nftmax__item-button--group">
                                            <a href="{{ route('type_hours.index') }}" class="nftmax__item-button--single nftmax__item-button--cancel" >Cancel</a>
                                            <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn" type="submit">Create Now</button>
                                                
                                        </div>
                                    </div>
                                </div>
                            </form>	
                        </div>
@endsection

@section('scripts')
@endsection