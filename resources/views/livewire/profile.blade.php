<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile {{ $name }} {{ $lastname }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="storage/{{ auth ()->user()->profile_photo_path }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $name }} {{ $lastname }}</h3>

                                <p class="text-muted text-center">{{ $name }} {{ $lastname }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Team</strong>

                                <p class="text-muted">
                                    ประวัติ....ทีม
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> สาขา</strong>

                                <p class="text-muted">การจัดการ,วิทย์คอม</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> รายชื่อทีม</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">name 1</span>
                                    <span class="tag tag-success">name 2</span>
                                    <span class="tag tag-info">name 3</span>
                                    <span class="tag tag-warning">name 4</span>
                                    <span class="tag tag-primary">name 5</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                            data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="settings">
                                        <form wire:submit.prevent="UpdateProfile" class="form-horizontal">
                                            <div class="form-group row">
                                                <div>
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            {{ session('message') }}
                                                        </div>
                                                    @elseif (session()->has('error'))
                                                    <div class="alert alert-success">
                                                        {{ session('error') }}
                                                    </div>
                                                        @endif
                                                </div>

                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" wire:model="name" class="form-control"
                                                        id="inputName" placeholder="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Lastname</label>
                                                <div class="col-sm-10">
                                                    <input type="text" wire:model="lastname" class="form-control"
                                                        id="inputName2" placeholder="lastname">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" wire:model="photo" class="form-control"
                                                        id="inputName2" placeholder="lastname">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
