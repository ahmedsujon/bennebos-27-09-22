<div>
    <style>
        thead tr {
            background: rgb(219, 219, 219);
        }
        input.sinput {
            width: 275px;
            padding: 10px;
        }
        #customSwitchSuccess {
            font-size: 20px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sub Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sub Category</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Sub Categories</h4>
                        <button class="card-button btn btn-sm btn-primary" style="padding: 1px 7px;" data-bs-toggle="modal" data-bs-target="#addDataModal"><i class="ti ti-plus"></i> Add Sub Category</button>
                    </div>
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
                                <input type="search" class="sinput" placeholder="Search" wire:model="searchTerm" />
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table custom_tbl">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Banner</th>
                                        <th>Parent Category</th>
                                        <th>Category Name</th>
                                        <th>Total Product</th>
                                        <th>Comission Rate</th>
                                        <th>Featured</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl = ($subcategories->perPage() * $subcategories->currentPage())-($subcategories->perPage() - 1)
                                    @endphp
                                    @if ($subcategories->count() > 0)
                                        @foreach ($subcategories as $category)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td><img style="height: 40px; width: 40px;" src="{{ $category->banner }}" alt=""></td>
                                                <td>{{ category($category->parent_id)->name }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ subCategoryProduct($category->id) }}</td>
                                                <td>{{ $category->commision_rate }}</td>
                                                <td style="text-align: center;">
                                                    <div class="form-check form-switch form-switch-success" wire:click='makeFeatured({{ $category->id }})' style="margin-left: 25px;">
                                                        <input class="form-check-input" type="checkbox" id="customSwitchSuccess" @if($category->featured == 1) checked @endif>
                                                    </div>
                                                </td>
                                                <td style="text-align: center;">
                                                    <div class="button-items">
                                                        <a href="{{ route('admin.subCategoryProducts', ['id'=>$category->id]) }}" type="button" class="btn btn-outline-secondary btn-icon-circle btn-icon-circle-sm" target="_blank"><i class="ti ti-plus"></i></a>

                                                        <a href="#" class="btn btn-outline-primary btn-icon-circle btn-icon-circle-sm"  wire:click.prevent="editData({{ $category->id }})"><i class="ti ti-edit"></i></a>
                                                        
                                                        <a wire:click.prevent="deleteConfirmation({{ $category->id }})" type="button" class="btn btn-outline-danger btn-icon-circle btn-icon-circle-sm"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" style="text-align: center;">No data available!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $subcategories->links('pagination-links-table') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addDataModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeData">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" wire:model="name" wire:keyup="generateSlug" placeholder="Enter name">
                                @error('name')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" wire:model="slug" placeholder="Enter slug">
                                @error('slug')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select  class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-tel-input"
                                class="col-sm-3 col-form-label">Commision
                                Rate</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" wire:model="commision_rate" placeholder="Enter rate" />
                                @error('commision_rate')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Meta
                                Title</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="height: 100px;" wire:model="meta_title" placeholder="Enter meta title"></textarea>
                                @error('meta_title')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Meta
                                Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="height: 100px;" wire:model="meta_description" placeholder="Enter meta description"></textarea>
                                @error('meta_description')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Banner</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="file" wire:model="banner">
                                @error('banner')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="banner" wire:target="banner" wire:key="banner" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($banner)
                                    <img src="{{ $banner->temporaryUrl() }}" width="120" class="mt-2 mb-2" />
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Featured Image <br><small class="text-muted">(290x302)</small></label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="file" wire:model="image">
                                @error('image')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="image" wire:target="image" wire:key="image" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" class="mt-2 mb-2" />
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Icon Image <br><small class="text-muted">(24x24)</small></label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="file" wire:model="icon">
                                @error('icon')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="icon" wire:target="icon" wire:key="icon" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($icon)
                                    <img src="{{ $icon->temporaryUrl() }}" width="40" class="mt-2 mb-2" />
                                @elseif($uploadedIcon != '')
                                    <img src="{{ $uploadedIcon }}" width="40" class="mt-2 mb-2" />
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-sm btn-primary">{!! loadingState('storeData', 'Submit') !!}</button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editDataModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='close'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateData">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" wire:model="name" wire:keyup="generateSlug" placeholder="Enter name">
                                @error('name')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select  class="form-control" wire:model="category_id" disabled>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-tel-input"
                                class="col-sm-3 col-form-label">Commision
                                Rate</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" wire:model="commision_rate" placeholder="Enter rate" />
                                @error('commision_rate')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Meta
                                Title</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="height: 100px;" wire:model="meta_title" placeholder="Enter meta title"></textarea>
                                @error('meta_title')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Meta
                                Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="height: 100px;" wire:model="meta_description" placeholder="Enter meta description"></textarea>
                                @error('meta_description')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Banner</label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="file" wire:model="banner">
                                @error('banner')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="banner" wire:target="banner" wire:key="banner" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($banner)
                                    <img src="{{ $banner->temporaryUrl() }}" width="120" class="mt-2 mb-2" />
                                @elseif($uploadedBanner != '')
                                    <img src="{{ $uploadedBanner }}" width="120"
                                        class="mt-2 mb-2" />
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Featured Image <br><small class="text-muted">(290x302)</small></label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="file" wire:model="image">
                                @error('image')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="image" wire:target="image" wire:key="image" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" class="mt-2 mb-2" />
                                @elseif($uploadedImage != '')
                                    <img src="{{ $uploadedImage }}" width="120" class="mt-2 mb-2" />
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Icon Image <br><small class="text-muted">(24x24)</small></label>
                            <div class="col-sm-8">
                                <input class="form-control mb-2" type="file" wire:model="icon">
                                @error('icon')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror

                                <div wire:loading="icon" wire:target="icon" wire:key="icon" style="font-size: 12.5px;" class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                @if ($icon)
                                    <img src="{{ $icon->temporaryUrl() }}" width="40" class="mt-2 mb-2" />
                                @elseif($uploadedIcon != '')
                                    <img src="{{ $uploadedIcon }}" width="40" class="mt-2 mb-2" />
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" wire:click='close'>Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

@push('scripts')
    <script>
        window.addEventListener('showEditModal', event => {
            $('#editDataModal').modal('show');
        });
        window.addEventListener('closeModal', event => {
            $('#addDataModal').modal('hide');
            $('#editDataModal').modal('hide');
        });

        window.addEventListener('categoryDeleteError', event => {
            Swal.fire(
                'Error!',
                'Can not delete this subcategory.<br>Because this category has active posts or sub-subcategory.<br>Please delete them first.',
                'error'
            )
        });
    </script>
@endpush
