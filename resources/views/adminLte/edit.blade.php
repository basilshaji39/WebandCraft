@include('Layouts.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('Layouts.mainnavbar')

        @include('Layouts.sidenavbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('Layouts.contentheader')
            <!-- Main content -->
            <section class="content">
                <form method="post" action="/employee/{{ $emp_tbl->id }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="container-fluid">

                        @if(session('successmsg'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <p style="text-align: center">{{ session('successmsg') }}</p>
                                            </div>

                                             </div>
                                        </div>
                                    </div>
                                @endif
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">{{ $card_title }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" value="{{ $emp_tbl->name }}" name="name"
                                                class="form-control" placeholder="Enter Employee Name">
                                            @if ($errors->has('name'))
                                                <span id="InputName-error" class="span-error"
                                                    role="alert">{{ $errors->first('name') }}</span>
                                            @endif

                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" value="{{ $emp_tbl->email }}" name="email"
                                                class="form-control" placeholder="Enter Email" readonly>
                                            @if ($errors->has('email'))
                                                <span id="InputEmail-error" class="span-error"
                                                    role="alert">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <select name="designation" class="form-control select2"
                                                style="width: 100%;">
                                                @foreach ($designation as $item)
                                                    <option value="{{ $item->id }}"
                                                        <?php if($emp_tbl->designation == $item->id){
                                                            echo 'selected';
                                                            } ?>
                                                            >{{ $item->designation }}
                                                        </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('designation'))
                                                <span id="InputDesignation-error" class="span-error"
                                                    role="alert">{{ $errors->first('designation') }}</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-md-12">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <img src="{{ asset('storage/images/' . $emp_tbl->image) }}" alt=""
                                                width="100%" height="600px">
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Change Image</label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <span id="InputImage-error" class="span-error"
                                                    role="alert">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('Layouts.tempfooter')
    </div>
    <!-- ./wrapper -->
    @include('Layouts.footer')
