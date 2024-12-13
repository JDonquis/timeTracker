@extends('layouts.dashboard')
@section('content')
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Create new employee</h2>
                        </div>
                        <!-- End All Notification Heading -->
                        
                        <div class="nftmax__item">
                            
                            <form class="form" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax__item-box">
                                            <div class="row nftmax-pcolumn">
                                                <div class="col-xxl-12 col-lg-12 col-12 nftmax-pcolumn__two">
                                                    <div class="nftmax__item-form--main">
                                                        <div class="nftmax__item-heading">
                                                            <h2 class="nftmax__item-title nftmax__item-title--psingle">Profile image</h2>
                                                            <p class="nftmax__item-text nftmax__item-text--single">File types suppported: JPG, JPEG, PNG. Max Size : 2 MB</p>
                                                        </div>

                                                        <div class="nftmax__file-upload mb-4" style="max-width: 100px; min-height: 100px; height: 100px;">
                                                            <div class="upload-files">
                                                                <div class="body" id="drop">
                                                                    <img class="nftmax__file-upload--img" src="img/upload.png" alt="">
                                                                    <p class="pointer-none nftmax__file-text "><span class="fs-6">Drop file<br> or <a href="#" id="triggerFile">Browse</a></span></p>
                                                                    <input type="file" name="photo"/>
                                                                </div>
                                                                <div class="nftmax__file-updated" style="max-width: 100px; width:100px;">
                                                                    <div class="divider">
                                                                        <span><AR>Nice!</AR></span>
                                                                    </div>
                                                                    <div class="list-files"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Full name </label>
                                                            <input class="nftmax__item-input" name="full_name" type="text" placeholder="John Doe" value="{{ old('full_name') }}" required="required">
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">DNI </label>
                                                            <input class="nftmax__item-input" name="DNI" type="text" placeholder="123-45-6789" value="{{ old('DNI') }}" required="required">
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Phone number </label>
                                                            <input class="nftmax__item-input" name="phone_number" type="text" placeholder="(555) 123-4567" value="{{ old('phone_number') }}" required="required">
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Email </label>
                                                            <input class="nftmax__item-input" name="email" type="email" placeholder="test@gmail.com" value="{{ old('email') }}" required="required">
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Address </label>
                                                            <input class="nftmax__item-input" name="address" type="text" placeholder="Urb Juan Crisostomo Falcon" value="{{ old('phone_number') }}" required="required">
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Department </label>
                                                            <select class="form-select input-select-custom" name="department" required aria-label="Department select">
                                                                <option selected>Assign department</option>
                                                                @foreach ($departments as $department )                                                                    
                                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                                @endforeach
                                                              </select>
                                                        </div>

                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Position </label>
                                                            <select class="form-select input-select-custom" name="position" required aria-label="Position select">
                                                                <option selected>Assign position</option>
                                                                @foreach ($positions as $position )                                                                    
                                                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                                                @endforeach
                                                              </select>
                                                        </div>

                                                        
                                                        
                                                    
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nftmax__item-button--group">
                                            <a href="{{ route('employees.index') }}" class="nftmax__item-button--single nftmax__item-button--cancel" >Cancel</a>
                                            <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn" type="submit">Create Now</button>
                                                
                                        </div>
                                    </div>
                                </div>
                            </form>	
                        </div>
@endsection

@section('scripts')
<script src="{{ asset('js/custom-js.js') }}"></script>
@endsection