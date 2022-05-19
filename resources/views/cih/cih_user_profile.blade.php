@extends('cih.cih_master')
@section('cih')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>


    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Cih Profile Edit</h4>
                    <br> <br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('cih.profile.store') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Cih User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="username" class="form-control"
                                                            value="{{ $cih->username }}" required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Cih Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $cih->email }}" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col md 6 -->



                                        </div>
                                        <!-- end row  -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_image" class="form-control"
                                                            required="" id="image">
                                                    </div>
                                                </div>
                                                <div>
                                                    <!-- end col md 6 -->

                                                    <div class="col-md-6">
                                                        <img id="showImage"
                                                            src="{{ !empty($cihData->profile_image)? url('upload/cih_images/' . $editData->profile_image): url('upload/no_image.jpg') }}"
                                                            style="width: 100px; height: 100px;">

                                                        <div>
                                                            <!-- end col md 6 -->
                                                        </div>
                                                        <!-- end row  -->
                                                        <div class="text-xs-right">
                                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                                value="Update">
                                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>


    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
