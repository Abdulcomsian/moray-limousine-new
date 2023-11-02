@extends('layouts.master-admin')
@section('title')
    Add Vehicle
@endsection
@section('main-content')
<style>
    .edit-profile-photo{
        height: 13.2rem;
        width: 14rem;
        margin-left: 45px;
    }
    .chosen-container-multi .chosen-choices {
        padding: 10px 5px;
    }
    select{
        outline: 2px solid rgba(203, 203, 203, 0.6) !important;
        font-size: 0.8rem !important;
        color: rgba(0, 0, 0, 0.74) !important;
        margin: 0 !important;
        text-align: left !important;
    }
</style>

<div class="col-md-9">
<div class="row justify-content-center">
    <div class="col-md-12">
        @include('parshall-views._mian-add-vehicle',['route'=> route('vehicle.save'),'docs_route' => route('vehicle.store.docs')])
    </div>
</div>
</div>



<script>
    let loadFile = function(event) {
        let output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
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
    <script>

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
            let edit_id = $(this).next('.delete-img').attr('id');
            $('input[name="edit_id"]').val(edit_id);
            $('input[name="image_name"]').prop('required',false);


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



        let vehicle_loc = $('#location');
        vehicle_loc.chosen({
            'placeholder_text_multiple': 'Select Locations'
        });
        if (typeof locations_data !== 'undefined') {
            vehicle_loc.val(locations_data).trigger("chosen:updated");
        }

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
{{--    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>--}}
@endsection





