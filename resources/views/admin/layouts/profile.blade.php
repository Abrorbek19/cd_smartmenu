@extends("admin.layouts.header")

@section('content')
    <div class="pagetitle">
        <h1>Mening Profilim</h1>

    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ $user->image ? asset('/storage/users/' . $user->image) : 'assets/img/profile-img.jpg' }}" alt="Profile" class="rounded-circle">
                        <h2>{{ auth()->user()->firstname}} {{ auth()->user()->lastname}}</h2>
                        <h3>{{ auth()->user()->username}}</h3>
{{--                        <div class="social-links mt-2">--}}
{{--                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>--}}
{{--                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>--}}
{{--                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>--}}
{{--                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>--}}
{{--                        </div>--}}
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Umumiy ma'lumotlar</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Profilni tahrirlash</button>
                            </li>



                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Profil tafsilotlari:</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Ism Familiya</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->firstname}} {{ auth()->user()->lastname}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->username}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefon raqam</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->phone}}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
{{--                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    @method('PUT')--}}

{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>--}}
{{--                                        <div class="col-md-8 col-lg-9">--}}
{{--                                            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'assets/img/profile-img.jpg' }}" alt="Profile">--}}
{{--                                            <div class="pt-2">--}}
{{--                                                <input type="file" name="image" class="form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Ism</label>--}}
{{--                                        <div class="col-md-8 col-lg-9">--}}
{{--                                            <input name="firstname" type="text" class="form-control" id="firstname" value="{{ $user->firstname }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Familiya</label>--}}
{{--                                        <div class="col-md-8 col-lg-9">--}}
{{--                                            <input name="lastname" type="text" class="form-control" id="lastname" value="{{ $user->lastname }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="row mb-3">--}}
{{--                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Telefon raqam</label>--}}
{{--                                        <div class="col-md-8 col-lg-9">--}}
{{--                                            <input name="phone" type="text" class="form-control" id="phone" value="{{ $user->phone }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary">Tahrirlash</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}



                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profil rasm</label>
                                        <div class="col-md-8 col-lg-9">
                                            <!-- Display image preview if there's an existing image -->
                                            <img id="imagePreview" src="{{ $user->image ? asset('/storage/users/' . $user->image) : 'assets/img/profile-img.jpg' }}" alt="Profile Image" style="max-width: 100px; max-height: 100px; object-fit: cover;">
{{--                                            <div class="pt-2">--}}
{{--                                                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>--}}
{{--                                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>--}}
{{--                                                <input type="file" name="image" class="form-control" onchange="previewImage(event)">--}}
{{--                                            </div>--}}
                                            <div class="pt-2">
                                                <!-- File input (hidden) -->
                                                <input type="file" id="imageInput" name="image" class="form-control d-none" onchange="previewImage(event)">

                                                <!-- Upload button -->
                                                <a href="javascript:void(0)" class="btn btn-primary btn-sm" title="Upload new profile image" onclick="triggerFileInput()">
                                                    <i class="bi bi-upload"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Ism</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="firstname" type="text" class="form-control" id="firstname" value="{{ $user->firstname }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Familiya</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lastname" type="text" class="form-control" id="lastname" value="{{ $user->lastname }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Telefon raqam</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                                    </div>
                                </form>
                                <script>
                                    // Trigger the file input when the Upload button is clicked
                                    function triggerFileInput() {
                                        document.getElementById('imageInput').click();
                                    }

                                    function previewImage(event) {
                                        var reader = new FileReader();
                                        reader.onload = function(){
                                            var output = document.getElementById('imagePreview');
                                            output.src = reader.result; // Set the preview image source to the selected file
                                        };
                                        reader.readAsDataURL(event.target.files[0]); // Read the file
                                    }
                                </script>



                                <!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection
