@extends('layouts.driver')
@section('title')
    {{isset($driver) ? 'Add Vehicle ' : 'Update Vehicle'}}
@endsection
<style>
    input , select{
        margin: 0 !important;
        text-align: left !important;
    }
    .chosen-container-multi .chosen-choices{
        padding: 10px 5px !important;
        margin-top: 1px;
    }
    select.form-control{
        color: #1e1e1e !important;
        font-family: sans-serif;
    }
</style>

@section('content')
    <div class="col-md-9">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0 mt-3" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
    @include('parshall-views._mian-add-vehicle' ,['route' => route('driver.saveVehicle') ,'docs_route' => route('driver.vehicle.docs')] )
            </div></div></div>
                    @endsection
@section('side-bar')
    @include('parshall-views._driver-side-bar')
    @if(isset($vehicle))
        <script>
            let x = 0;
            let locations_data = [];
        </script>
        @foreach ($vehicle->locations as $location)
            <script>
                locations_data[x] = parseInt({{$location->id}});
                x++;

            </script>
        @endforeach
    @endif
@endsection
@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script>
        function initMap() {
            var input = document.getElementById('location');

            // Create the autocomplete object, restricting the search predictions to
            // geographical location types.
            let autocomplete = new google.maps.places.Autocomplete(input, {types: ['geocode']});
            // Set initial restrict to the greater list of countries.
            autocomplete.setComponentRestrictions({'country': ['pk']});
            // place fields that are returned to just the address components.
            autocomplete.setFields(['geometry']);
        }

    </script>
    <script>
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Vehicle Documents js
        //Script For Vehicle Documents
        $('#select-doc').change(function () {
            let doc_title = $(this).val();
            $('.img-doc-title').html(doc_title);
        });

        //On click Edit Document Button
        $('.btn-edit-img').click(function () {
            let img = $(this).val();
            let img_view = $('#output');
            $('#select-doc').val($(this).attr('id')).change();
            img_view.attr('src',img);
            $('.btn-save-img').html('Update Image');
            $('.btn-cancel').show();
            $('.upload-file').removeAttr('required');
            let edit_id = $(this).next('.delete-img').attr('id');
            $('input[name="edit_id"]').val(edit_id);
        });
        //On click Cancel Edit Button
        $('.btn-cancel').click(function () {
            let img_views = $('#output');
            let no_img_png = '{{asset('images/Upload-PNG-Images.png')}}';
            $('.btn-save-img').html('Save Image');
            $('#select-doc').val(null);
            img_views.attr('src',no_img_png);
            $('.upload-file').attr('required','required');
            $('input[name="edit_id"]').val(null);
            $(this).hide();

        });



        $('#location').chosen({
            'placeholder_text_multiple': 'Select Locations'
        });
        if (typeof locations_data !== 'undefined') {
            $('#location').val(locations_data).trigger("chosen:updated");
        }

        $('#sel1').change(function(){
            let categoryUrl = '{{url('admin/get-categories-title')}}/';
            let id = $(this).val();
            if(id !== 0 || id !== '0'){
                getTitlesList(categoryUrl,id);
            }else{
                $('#vehicle-title').children().remove().end();
            }
        });

        function getTitlesList(categoryURl,id){
            $.ajax({
                type: 'get',
                url: categoryURl+id,
                success: function (response) {
                    console.log(response);
                    let types = response;
                    $('#vehicle-title').children().remove().end();
                    for (let i = 0; i < types.length ; i++){
                        $('#vehicle-title').append(`<option value="${types[i].title}">
                                       ${types[i].title}
                                  </option>`);
                    }
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgV-mkhz5pqHJrtexHQXJdV12D8nGefoI&libraries=places&callback=initMap" async defer></script>
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
@endsection
