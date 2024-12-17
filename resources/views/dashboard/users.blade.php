@extends('layouts.dashboard')
@section('content')

                        <div class="nftmax-table mg-top-40">
                            <div class="nftmax-table__heading">
                                <h3 class="nftmax-table__title mb-0">Users <span class="nftmax-table__badge">{{ count($users) }}</span></h3>
                                <ul  class="nav nav-tabs  nftmax-dropdown__list" id="nav-tab" role="tablist">
                                        <a class="nftmax-sidebar_btn nftmax-heading__tabs nav-link "   href="{{ route('usuarios.create') }}" role="button" aria-expanded="false"><button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn" type="submit">New user</button></a>
                                    <li class="nav-item dropdown align-self-center mx-3">
                                        <a class="nftmax-sidebar_btn nftmax-heading__tabs nav-link dropdown-toggle"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><span id="statusFIlter">{{ request()->get('status', 'Active') }}</span> <span class="nftmax-table__arrow--icon"><svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.7" d="M12.4124 0.247421C12.3327 0.169022 12.2379 0.106794 12.1335 0.0643287C12.0291 0.0218632 11.917 0 11.8039 0C11.6908 0 11.5787 0.0218632 11.4743 0.0643287C11.3699 0.106794 11.2751 0.169022 11.1954 0.247421L7.27012 4.07837C7.19045 4.15677 7.09566 4.219 6.99122 4.26146C6.88678 4.30393 6.77476 4.32579 6.66162 4.32579C6.54848 4.32579 6.43646 4.30393 6.33202 4.26146C6.22758 4.219 6.13279 4.15677 6.05312 4.07837L2.12785 0.247421C2.04818 0.169022 1.95338 0.106794 1.84895 0.0643287C1.74451 0.0218632 1.63249 0 1.51935 0C1.40621 0 1.29419 0.0218632 1.18975 0.0643287C1.08531 0.106794 0.990517 0.169022 0.910844 0.247421C0.751218 0.404141 0.661621 0.616141 0.661621 0.837119C0.661621 1.0581 0.751218 1.2701 0.910844 1.42682L4.84468 5.26613C5.32677 5.73605 5.98027 6 6.66162 6C7.34297 6 7.99647 5.73605 8.47856 5.26613L12.4124 1.42682C12.572 1.2701 12.6616 1.0581 12.6616 0.837119C12.6616 0.616141 12.572 0.404141 12.4124 0.247421Z" fill="#374557" fill-opacity="0.6"></path></svg></span></a>
                                        <ul class="dropdown-menu nftmax-sidebar_dropdown">
                                            <a class="dropdown-item list-group-item {{ request()->get('status') == 'Active' ? 'active' : '' }}" href="?status=Active" id="filter-active">Active</a>
                                            <a class="dropdown-item list-group-item {{ request()->get('status') == 'Deleted' ? 'active' : '' }}" href="?status=Deleted" id="filter-deleted">Deleted</a>
                                        </ul>
                                    </li>
                                          
                                    
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">
                                    <!-- NFTMax Table -->
                                    <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                                        <!-- NFTMax Table Head -->
                                        <thead class="nftmax-table__head">
                                            <tr>
                                                <th class="nftmax-table__column-1 nftmax-table__h1">User data</th>
                                                <th class="nftmax-table__column-7 nftmax-table__h7">Status</th>
                                                <th class="nftmax-table__column-7 nftmax-table__h7"></th>
                                                
                                            </tr>
                                        </thead>
                                        <!-- NFTMax Table Body -->
                                        <tbody class="nftmax-table__body">
                                            @foreach ($users as $user )
                                                <tr>
                                                    <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                        <div class="nftmax-table__product">
                                                            <div class="nftmax-table__product-img">
                                                                <img src="{{ asset('storage/users/'.$user->photo) }}" style="object-fit: cover; max-height:45px;" alt="#">
                                                            </div>
                                                            <div class="nftmax-table__product-content">
                                                                <h4 class="nftmax-table__product-title">{{ $user->full_name }}</h4>
                                                                <p class="nftmax-table__product-desc text-capitalize">Role <a href="#">{{ $user->getRoleNames()[0] }}</a></p>
                                                                <p class="nftmax-table__product-desc">Created at <a href="#">{{ $user->created_at->format('F j, Y') }}</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="nftmax-table__column-7 nftmax-table__data-7">
                                                        <div class="nftmax-table__status nftmax-sbcolor">{{ $user->status == 1 ? 'Active' : 'Inactive' }}</div>
                                                    </td>
                                                    <td class="nftmax-table__column-7 nftmax-table__data-7">
                                                        <div class="nftmax-table__status "><a href="{{ route('usuarios.edit',['usuario' => $user->id ]) }}"><svg xmlns="http://www.w3.org/2000/svg" width=21 height=24 viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill=#f539f8 d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></a></div>
                                                    </td>

                                                </tr>

                                            @endforeach
                                           
                                        </tbody>
                                        <!-- End NFTMax Table Body -->
                                    </table>
                                    <!-- End NFTMax Table -->
                                </div>
                            </div>
                        </div>
     
@endsection

@section('scripts')
<script>
 document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            document.getElementById('statusFIlter').innerText = this.innerText;

            document.querySelectorAll('.dropdown-item').forEach(dropdownItem => {
                dropdownItem.classList.remove('active');
            });

            this.classList.add('active');
        });



    });


</script>
@endsection