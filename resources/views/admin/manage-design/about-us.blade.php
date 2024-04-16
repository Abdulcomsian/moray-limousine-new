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
                            <h4 class="card-title">Update About us page content</h4>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('store.about.us.content')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="@isset($data->id) {{$data->id}} @endisset">
                {{-- Section 1  --}}
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Section One</h4>
                            </div>
                            <div class="card-body">
                                <div class="forms add-card">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" name="section_1_heading"
                                                placeholder="Enter Section One Heading" value="@isset($data->section_1_heading) {{$data->section_1_heading}} @endisset">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <textarea name="section_1_description" placeholder="Enter section one description">@isset($data->section_1_description) {{$data->section_1_description}} @endisset</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- section 2  --}}
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Section Two</h4>
                            </div>
                            <div class="card-body">
                                <div class="forms add-card">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" name="section_2_heading"
                                                placeholder="Enter Section Two Heading" value="@isset($data->section_2_heading) {{$data->section_2_heading}} @endisset">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <input class="mb-3" type="text" name="section_2_first_step_heading" placeholder="Enter step one title" value="@isset($data->section_2_first_step_heading) {{$data->section_2_first_step_heading}} @endisset">
                                            <textarea name="section_2_first_step_description" placeholder="Enter step one description">@isset($data->section_2_first_step_description) {{$data->section_2_first_step_description}} @endisset</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <input class="mb-3" type="text" name="section_2_second_step_heading" placeholder="Enter step two title" value="@isset($data->section_2_second_step_heading) {{$data->section_2_second_step_heading}} @endisset">
                                            <textarea name="section_2_second_step_description" placeholder="Enter step two description">@isset($data->section_2_second_step_description) {{$data->section_2_second_step_description}} @endisset</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <input class="mb-3" type="text" name="section_2_third_step_heading" placeholder="Enter step third title" value="@isset($data->section_2_third_step_heading) {{$data->section_2_third_step_heading}} @endisset">
                                            <textarea name="section_2_third_step_description" placeholder="Enter step third description">@isset($data->section_2_third_step_description) {{$data->section_2_third_step_description}} @endisset</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- section 3  --}}
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Section Three</h4>
                            </div>
                            <div class="card-body">
                                <div class="forms add-card">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" name="section_3_heading"
                                                placeholder="Enter Section Three Heading" value="@isset($data->section_3_heading) {{$data->section_3_heading}} @endisset">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <input class="mb-3" type="text" name="section_3_first_step_heading" placeholder="Enter step one title" value="@isset($data->section_3_first_step_heading) {{$data->section_3_first_step_heading}} @endisset">
                                            <textarea name="section_3_first_step_description" placeholder="Enter step one description">@isset($data->section_3_first_step_description) {{$data->section_3_first_step_description}} @endisset</textarea>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="mb-3" type="text" name="section_3_second_step_heading" placeholder="Enter step two title" value="@isset($data->section_3_second_step_heading) {{$data->section_3_second_step_heading}} @endisset">
                                            <textarea name="section_3_second_step_description" placeholder="Enter step two description">@isset($data->section_3_second_step_description) {{$data->section_3_second_step_description}} @endisset</textarea>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="mb-3" type="text" name="section_3_third_step_heading" placeholder="Enter step third title" value="@isset($data->section_3_third_step_heading) {{$data->section_3_third_step_heading}} @endisset">
                                            <textarea name="section_3_third_step_description" placeholder="Enter step third description">@isset($data->section_3_third_step_description) {{$data->section_3_third_step_description}} @endisset</textarea>
                                        </div>

                                        <div class="col-md-3">
                                            @isset($data->section_3_image) 
                                                <img src="{{asset('images/about/' . $data->section_3_image)}}" class="img-fluid"
                                                alt="placeholder iamge">
                                            @endisset                                           
                                            <input class="mb-3 form-control" type="file" name="section_3_image" placeholder="Enter step third title" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 d-flex" style="justify-content: right;">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script type="text/javascript">
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
    </script> --}}
@endsection
