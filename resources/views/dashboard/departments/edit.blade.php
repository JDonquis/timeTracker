@extends('layouts.dashboard')
@section('content')
<div class="nftmax-inner__heading">
    <h2 class="nftmax-inner__page-title">Edit {{ $department->name }}</h2>
</div>
<!-- End All Notification Heading -->

<div class="nftmax-personals">
    <h2 class="nftmax-personals__title">Deparment Info</h2>
    <div class="row">
        <div class="col-lg-3 col-md-2 col-12 nftmax-personals__list">
            <div class="nftmax-psidebar">
                <!-- Features Tab List -->
                <div class="list-group nftmax-psidebar__list" id="list-tab" role="tablist">
                    <a class="list-group-item active" data-bs-toggle="list" href="#id1" role="tab"><span class="nftmax-psidebar__icon"><svg width="15" height="20" viewBox="0 0 15 20" class="fill-current" xmlns="http://www.w3.org/2000/svg"><path d="M10.8692 11.6667H4.13085C3.03569 11.668 1.98576 12.1036 1.21136 12.878C0.436961 13.6524 0.00132319 14.7023 0 15.7975V20H15.0001V15.7975C14.9987 14.7023 14.5631 13.6524 13.7887 12.878C13.0143 12.1036 11.9644 11.668 10.8692 11.6667Z"></path><path d="M7.49953 10C10.261 10 12.4995 7.76145 12.4995 5.00002C12.4995 2.23858 10.261 0 7.49953 0C4.7381 0 2.49951 2.23858 2.49951 5.00002C2.49951 7.76145 4.7381 10 7.49953 10Z"></path></svg></span><span class="nftmax-psidebar__title">Department Info</span></a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9 col-md-10 col-12  nftmax-personals__content">
            <div class="nftmax-ptabs">
            
                <div class="nftmax-ptabs__inner">
                    <div class="tab-content" id="nav-tabContent">
                        <!--  Features Single Tab -->
                        <div class="tab-pane fade show active" id="id1" role="tabpanel">
                            <form action="{{ route('departments.update',['department' => $department->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="nftmax-ptabs__separate">
                                            <div class="nftmax-ptabs__form-main">
                                                	
                                                
                                                <div class="nftmax__item-form--group">
                                                    <label class="nftmax__item-label">Department</label>
                                                    <input class="nftmax__item-input" name="name" type="text" value="{{ old('name',$department->name) }}" required="required">
                                                </div>
                                                
                                                
                                                <div class="nftmax-ptabs__social">
                                                    <h4 class="nftmax-ptabs__accounts-heading text-danger">Danger Zone </h4>
                                                    
                                                    <div class="nftmax-ptabs__verified">
                                                        <div class="nftmax-ptabs__verified-content">
                                                            <h4 class="nftmax-ptabs__accounts-heading">Delete department </h4>
                                                            <p class="nftmax__item-fee-text">Delete this department forever </p>
                                                        </div>
                                                       
                                                        
                                                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $department->id }}').submit();" class="nftmax__item-button--single nftmax__item-button--cancel align-self-end">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="nftmax__item-button--group nftmax__ptabs-bottom">
                                    <a href="{{ route('departments.index') }}" class="nftmax__item-button--single nftmax__item-button--cancel">Cancel </a>
                                    <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius " type="submit">Update department</button>
                                </div>
                            </form>

                            <form id="delete-form-{{ $department->id }}" action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                        
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection