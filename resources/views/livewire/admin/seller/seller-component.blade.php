<div>
    <style>
        thead tr {
            background: rgb(219, 219, 219);
        }
        #customSwitchSuccess {
            font-size: 25px;
        }
        input.sinput {
            width: 275px;
            padding: 10px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sellers List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sellers List</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                                <label class="font-weight-normal" style="">Show</label>
                                <select name="sortuserresults" class="sinput" id="" wire:model="sortingValue">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label class="font-weight-normal" style="">entries</label>
                            </div>

                            <div class="col-md-6 col-sm-12 mb-2 search_cont">
                                <label class="font-weight-normal mr-2">Search:</label>
                                <input type="search" class="sinput" placeholder="Search"
                                    wire:model="searchTerm" />
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table custom_tbl">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        {{-- <th>Phone</th> --}}
                                        <th>Email Address</th>
                                        <th>Verification Info</th>
                                        <th>Approval</th>
                                        <th>Num. of Products</th>
                                        <th>Due to seller</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl = $sellers->perPage() * $sellers->currentPage() - ($sellers->perPage() - 1);
                                    @endphp
                                    @if ($sellers->count() > 0)
                                        @foreach ($sellers as $seller)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $seller->name }}</td>
                                                <td>{{ $seller->email }}</td>
                                                <td>
                                                    @if ($seller->application_status == 1)
                                                        <a href="{{ route('admin.seller.shopVerificationInfo', ['seller_id'=>$seller->id]) }}"><span class="badge bg-info" style="font-size: 12.5px;">Show</span></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (shop($seller->id)->verification_status == 1)
                                                        <span class="text-success">Approved</span>
                                                    @else
                                                        <span class="text-danger">Not-Approved</span>
                                                    @endif
                                                </td>
                                                <td>{{ sellerProducts($seller->id)->count() }}</td>
                                                <td>0</td>
                                                <td style="text-align: center;">
                                                    <button type="button" class="btn btn-outline-info btn-icon-circle btn-icon-circle-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu" style="width: auto;">
                                                        <a class="dropdown-item" href="" wire:click.prevent="showProfile({{ $seller->id }})">Profile</a>

                                                        <a class="dropdown-item"  href="javascript:void(0)" target="_blank"
                                                        onclick="event.preventDefault(); document.getElementById('login-form_{{ $seller->id }}').submit();">Log in as this seller</a>

                                                        <form id="login-form_{{ $seller->id }}" style="display: none;" method="POST" action="{{ route('loginAsSeller') }}">
                                                            @csrf
                                                            <input type="text" name="email" value="{{ seller($seller->id)->email }}" id="email">
                                                            <input type="text" name="password" value="{{ seller($seller->id)->password }}" id="password">
                                                        </form>

                                                        <a wire:click.prevent="editSeller({{ $seller->id }})" class="dropdown-item" type="button">Edit Seller</a>
                                                        @if ($seller->disabled == 0)
                                                            <a wire:click.prevent="disableConfirmation({{ $seller->id }})" class="dropdown-item" type="button">Disable Seller</a>
                                                        @else
                                                            <a wire:click.prevent="enableConfirmation({{ $seller->id }})" class="dropdown-item" type="button">Enable Seller</a>
                                                        @endif
                                                        
                                                        
                                                        <a wire:click.prevent="deleteConfirmation({{ $seller->id }})" class="dropdown-item" type="button">Delete Seller</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No data available!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $sellers->links('pagination-links-table') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="sellerProfileModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @if ($profile != '')
                        <div class="card">
                            <div class="card-body text-dark">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        @if ($profile->avatar != '')
                                            <img src="{{ $profile->avatar }}" style="height: 150px; width: 150px;" alt="">
                                        @else
                                            <img src="{{ asset('assets/images/placeholder_rounded.png') }}" style="height: 150px; width: 150px;" alt="">
                                        @endif
                                        <br>
                                        <h5>{{ $profile->name }}</h5>
                                        <small>{{ shop($profile->id)->name }}</small>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <h5>About <strong>{{ $profile->name }}</strong></h5>
                                        <div class="dropdown-divider"></div>
                                        <p class="pb-0 mb-0">Address: {{ shop($profile->id)->address }}</p>
                                        <h6><a class="text-success" href="{{ route('shop.seller', ['slug'=>shop($profile->id)->slug]) }}">{{ shop($profile->id)->name }}</a></h6>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <h5>Payout Info</h5>
                                        <div class="dropdown-divider"></div>
                                        <p class="mb-1">Bank Name:</p>
                                        <p class="mb-1">Bank Account Name:</p>
                                        <p class="mb-1">Bank Account Number:</p>
                                        <p class="mb-1">Bank Routing Number:</p>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>Total Products</td>
                                                <td>{{ sellerProducts($profile->id)->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Orders</td>
                                                <td>{{ sellerOrders($profile->id)->count() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Sold Amount</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Wallet Balance</td>
                                                <td>0</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editSellerModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Seller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='updateSeller'>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3">Seller Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model='name' />
                                @error('name')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3">Seller Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" wire:model='email' />
                                @error('email')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3">Seller Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model='password' />
                                @error('password')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3">Profile Picture</label>
                            <div class="col-sm-9">
                                <input class="form-control mb-2" type="file" wire:model="profile_picture">
                                @error('profile_picture')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="profile_picture" wire:target="profile_picture" wire:key="profile_picture" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($profile_picture)
                                    <img src="{{ $profile_picture->temporaryUrl() }}" width="80" class="mt-2 mb-2" />
                                @else
                                    @if ($uploaded_profile_picture)
                                        <img src="{{ $uploaded_profile_picture }}" width="80" class="mt-2 mb-2" />
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-sm btn-primary">{!! loadingStateWithText('updateSeller', 'Update') !!}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="sellerDeleteConfirmation" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">Delete Confirmation</h5>
                </div>
                <div class="modal-body p-3" style="border: 1px solid grey;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Are you sure, you want to delete this seller?</h5>
                            <small class="text-muted">Note: All products of this seller will be deleted</small>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-sm btn-danger" wire:click.prevent="deleteSeller" wire:loading.attr='disabled'>{!! loadingStateWithProcess('deleteSeller', 'Yes, Delete') !!}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="sellerDisableConfirmation" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">Disable Seller</h5>
                </div>
                <div class="modal-body p-3" style="border: 1px solid grey;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Are you sure, you want to disable this seller?</h5>
                            <small class="text-muted">Note: All products of this seller will be unpublished</small>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-sm btn-danger" wire:click.prevent="disableSeller" wire:loading.attr='disabled'>{!! loadingStateWithProcess('disableSeller', 'Yes, Disable') !!}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="sellerEnableConfirmation" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">Enable Seller</h5>
                </div>
                <div class="modal-body p-3" style="border: 1px solid grey;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Are you sure, you want to enable this seller?</h5>
                            <small class="text-muted">Note: All products of this seller will be published</small>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-sm btn-danger" wire:click.prevent="enableSeller" wire:loading.attr='disabled'>{!! loadingStateWithProcess('enableSeller', 'Yes, Enable') !!}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        //SWL
        window.addEventListener('show-seller-delete-confirmation', event => {
            $('#sellerDeleteConfirmation').modal('show');
        });
        window.addEventListener('show-seller-disable-confirmation', event => {
            $('#sellerDisableConfirmation').modal('show');
        });
        window.addEventListener('show-seller-enable-confirmation', event => {
            $('#sellerEnableConfirmation').modal('show');
        });

        window.addEventListener('showProfile', event => {
            $('#sellerProfileModal').modal('show');
        });

        window.addEventListener('showDeleteLoading', event => {
            $('#sellerDeleting').modal('show');
        });
        window.addEventListener('closeLoader', event => {
            $('#sellerDeleting').modal('hide');
        });

        window.addEventListener('show_edit_modal', event => {
            $('#editSellerModal').modal('show');
        });

        window.addEventListener('close_view_modal', event => {
            $('#sellerProfileModal').modal('hide');
        });

        window.addEventListener('closeModal', event => {
            $('#sellerProfileModal').modal('hide');
            $('#editSellerModal').modal('hide');
            $('#sellerDeleteConfirmation').modal('hide');
            $('#sellerDisableConfirmation').modal('hide');
            $('#sellerEnableConfirmation').modal('hide');
        });

        //Success Delete
        window.addEventListener('sellerDeleted', event => {
            Swal.fire(
                'Deleted!',
                'Seller has been deleted successfully.',
                'success'
            )
        });

        window.addEventListener('sellerDisabled', event => {
            Swal.fire(
                'Disabled!',
                'Seller has been disabled.',
                'success'
            )
        });

        window.addEventListener('sellerEnabled', event => {
            Swal.fire(
                'Enabled!',
                'Seller has been enabled.',
                'success'
            )
        });

        window.addEventListener('sellerUpdated', event => {
            Swal.fire(
                'Success!',
                'Seller updated successfully.',
                'success'
            )
        });

        @if(Session::has('applicationRejected'))
            Swal.fire(
                'Rejected!',
                'Application Rejected Successfully.',
                'success'
            )
        @endif
    </script>
@endpush