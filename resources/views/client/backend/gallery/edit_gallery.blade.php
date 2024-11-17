@extends('client.client_dashboard')
@section('client')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Menu</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Menu</li>
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
                <form id="myForm" action="{{ route('update.gallery') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $gallery->id }}">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-3 mt-lg-0">


                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Gallery Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>

                                <div class="mb-3">
                                    <img id="showImage" src="{{ asset($gallery->image) }}" alt="" class="img-fluid rounded-circle d-block" width="100">
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



@endsection
