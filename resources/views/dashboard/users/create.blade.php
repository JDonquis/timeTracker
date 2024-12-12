@extends('layouts.dashboard')
@section('content')
                        <!-- All Notification Heading -->
                        <div class="nftmax-inner__heading">
                            <h2 class="nftmax-inner__page-title">Create new user</h2>
                        </div>
                        <!-- End All Notification Heading -->
                        
                        <div class="nftmax__item">
                            
                            <form class="form" action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
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
                                                        
                                                    
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nftmax__item-button--group">
                                            <a href="{{ route('usuarios.index') }}" class="nftmax__item-button--single nftmax__item-button--cancel" >Cancel</a>
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