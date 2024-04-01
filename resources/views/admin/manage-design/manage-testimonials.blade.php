@extends('layouts.master-admin')

@section('title', 'Testimonials')

@section('css')
    <style>
        .invalid-feedback {
            display: none;
        }

        .table thead th {
            font-weight: bold;
        }

        .action-button {
            width: 30px;
            height: 30px;
            display: inline-block;
            border-radius: 5px;
            text-align: center;
        }

        .action-button i {
            margin-top: 7px;
            vertical-align: middle;
        }

        #editSubtype {
            display: none;
        }

        .btn-danger {
            color: #fff;
            background-color: #ff274b !important;
            border-color: #ff1a41 !important;
        }

        .file-input-container {
            border: 1px solid #00000036;
            height: 99%;
            border-radius: 5px;
            padding: 14px;
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Of All Testimonials</h4>
                        </div>
                        <div class="card-body">
                            <div class="forms add-card">
                                <form id="addSubtype" action="{{ route('save.testimonial') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <input type="text" name="vehicle-designed-by"
                                                placeholder="Vehicle Designed By">
                                            @error('vehicle-designed-by')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="file-input-container">
                                                <label for="vehicle-designed-logo">Choose Vehicle Company Logo:</label>
                                                <input type="file" name="vehicle-designed-logo" accept="image/*"
                                                    style="width: 50%;" required>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <input type="text" name="vehicle-designed-title" placeholder="Vehicle Title">
                                            @error('vehicle-designed-title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="file-input-container">
                                                <label for="vehicle-designed-image">Choose Vehicle Main Image:</label>
                                                <input type="file" name="vehicle-designed-image" accept="image/*"
                                                    style="width: 50%;" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" name="vehicle-designed-image-click-link"
                                                placeholder="Vehicle Image Click Link">
                                            @error('vehicle-designed-image-click-link')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit">
                                        Add Testimonial
                                    </button>
                                </form>
                            </div>

                            {{-- card for update testimonial  --}}
                            <div class="forms edit-card" style="display: none;">
                                <form id="addSubtype" action="{{ route('update.testimonial') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="testimonial_id" id="testimonialId" value="">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <input type="text" name="vehicle-designed-by" id="designBy"
                                                placeholder="Vehicle Designed By">
                                            @error('vehicle-designed-by')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="file-input-container">
                                                <label for="vehicle-designed-logo">Choose New Company Logo:</label>
                                                <input type="file" name="vehicle-designed-logo" accept="image/*"
                                                    style="width: 50%;">
                                                <img src="" alt="no image" style="width: 4rem;height: 4rem" class="img-thumbnail" id="logoImage">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <input type="text" name="vehicle-designed-title" id="designTitle" placeholder="Vehicle Title">
                                            @error('vehicle-designed-title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="file-input-container">
                                                <label for="vehicle-designed-image">Choose New Main Image:</label>
                                                <input type="file" name="vehicle-designed-image" accept="image/*"
                                                    style="width: 50%;">
                                                <img src="" alt="no image" style="width: 4rem;height: 4rem" class="img-thumbnail" id="mainImage">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" name="vehicle-designed-image-click-link" id="designLink"
                                                placeholder="Vehicle Image Click Link">
                                            @error('vehicle-designed-image-click-link')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit">
                                        Update Testimonial
                                    </button>
                                </form>
                            </div>
                            <span class="d-none">
                                {{ $counter = 1 }}
                            </span>
                            <table class="table table-bordered table-striped table-responsive-sm pt-5 mt-3">
                                <thead>
                                    <tr>
                                        <th style="text-wrap: wrap;">Sr#</th>
                                        <th style="text-wrap: wrap;">Vehicle Designed By Text</th>
                                        <th style="text-wrap: wrap;">Vehicle Company Logo</th>
                                        <th style="text-wrap: wrap;">Vehicle Name</th>
                                        <th style="text-wrap: wrap;">Vehicle Main Image</th>
                                        <th style="text-wrap: wrap;">Company Profile Link</th>
                                        <th style="text-wrap: wrap;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $testimonial)
                                        <tr>
                                            <td style="text-wrap: wrap;">{{ $counter++ }}</td>
                                            <td style="text-wrap: wrap;">{{ $testimonial->vehicle_designed_by }}</td>
                                            <td style="text-wrap: wrap;"><img
                                                    src="{{ asset('files/testimonials_images/' . $testimonial->vehicle_designed_logo) }}"
                                                    alt="no image" style="width: 4rem;height: 4rem" class="img-thumbnail">
                                            </td>
                                            <td style="text-wrap: wrap;">{{ $testimonial->vehicle_designed_name }}</td>
                                            <td style="text-wrap: wrap;"><img
                                                    src="{{ asset('files/testimonials_images/' . $testimonial->vehicle_designed_image) }}"
                                                    alt="no image" style="width: 4rem;height: 4rem" class="img-thumbnail">
                                            </td>
                                            <td style="text-wrap: wrap;">{{ $testimonial->vehicle_designed_click_link }}
                                            </td>
                                            <td>
                                                <a href="#" id="" class="bg-dark action-button" onclick="editFunction({{$testimonial->id}})"
                                                    title="Edit Image">
                                                    <i class="fa fa-edit text-white"></i>
                                                </a> /
                                                <a href="#" class="bg-danger action-button"
                                                    onclick="deleteFunction({{$testimonial->id}})" title="Delete Image">
                                                    <i class="fa fa-trash text-white"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function deleteFunction(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{url('admin/testimonials/delete/')}}/" + element;
                    window.location.href = url;
                }
            });
        }

        function editFunction(element){
            document.getElementsByClassName('add-card')[0].style.display = 'none';
            document.getElementsByClassName('edit-card')[0].style.display = 'block';
            let id = element;
            $.ajax({
                url: "{{url('admin/testimonials/show-edit/')}}",
                method: 'POST',
                data: {id: id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    console.log(data);
                    if(data){
                        document.getElementById('designBy').value = data.vehicle_designed_by;
                        document.getElementById('designTitle').value = data.vehicle_designed_name;
                        document.getElementById('designLink').value = data.vehicle_designed_click_link;
                        document.getElementById('testimonialId').value = data.id;
                        document.getElementById('logoImage').src = "{{asset('files/testimonials_images/')}}/" + data.vehicle_designed_logo;
                        document.getElementById('mainImage').src = "{{asset('files/testimonials_images/')}}/" + data.vehicle_designed_image;
                    }

                }
            })
        }
    </script>
@endsection
