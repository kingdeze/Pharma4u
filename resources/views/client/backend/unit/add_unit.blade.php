@extends('client.client_dashboard')
@section('client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Unit</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">Add Unit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12 col-lg-12">
          

                <div class="card">
                    <div class="card-body p-4">
                       
                        <form id="myForm" action="{{route('store.unit') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="example-text-input" class="form-label"> Category Name</label>
                                            <select name="category_id" class="form-select">
                                                <option selected="" disabled="" >Select</option>
                                                @foreach ($category as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="example-text-input" class="form-label"> Product Name</label>
                                        <select name="product_id"  class="form-select">
                                            <option selected="" disabled="">Select</option>
                                            @foreach ($product as $prod)
                                                <option value="{{$prod->id}}">{{$prod->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="example-text-input" class="form-label"> City Name</label>
                                        <select name="city_id" class="form-select">
                                            <option>Select</option>
                                            @foreach ($city as $cit)
                                                <option value="{{$cit->id}}">{{$cit->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label"> Unit Name</label>
                                    <input class="form-control" type="text" name="name" id="example-text-input">
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label"> Price</label>
                                    <input class="form-control" type="text" name="price" id="example-text-input">
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label"> Discount Price</label>
                                    <input class="form-control" type="text" name="discount_price" id="example-text-input">
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label"> Size/Weight/g/ml</label>
                                    <input class="form-control" type="text" name="size" id="example-text-input">
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label"> Unit Quantity</label>
                                    <input class="form-control" type="text" name="qty" id="example-text-input">
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="example-text-input" class="form-label"> Unit Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                <div class="form-group mb-3">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg')}}" alt=""
                                    class=" rounded-circle p-1 bg-primary" width="110">
                                </div>
                            </div>
                            <!-- checkbox -->
                            <div class="form-check mt-2">
                                <input class="form-check-input" name="most_popular" type="checkbox" id="formCheck2" value="1" >
                                <label class="form-check-label" for="formCheck2">
                                    Most Popular
                                </label>
                            </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                Changes</button>
                        </div>

                            </div><!-- end row -->
                         

                            
                        </form>
                            <!-- end card -->
                </div>

                







                <!-- end tab content -->
            </div>
            <!-- end col -->

            <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
               name: {
                    required: true,
                },
                image: {
                    required: true,
                },
                product_id: {
                    required: true,
                },
                 category_id: {
                    required: true,
                },

            },
            messages: {
               name: {
                    required: 'Please Enter Unit Name',
                },
                image: {
                    required: 'Please Select Image',
                },
                product_id: {
                    required: true,
                },
                category_id: {
                    required: true,
                },



            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>


@endsection