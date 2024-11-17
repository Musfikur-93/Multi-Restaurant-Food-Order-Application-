@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                <div class="card-body p-4">
                <form id="myForm" action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-3 mt-lg-0">

                                <div class="mb-3 form-group">
                                    <label for="example-text-input" class="form-label">Category Name</label>
                                    <input class="form-control" type="text" name="category_name" id="example-text-input">
                                </div>

                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Category Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>

                                <div class="mb-3">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="" class="img-fluid rounded-circle d-block" width="100">
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                </div>

                            </div>
                        </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },

            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
                },


            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>

@endsection
