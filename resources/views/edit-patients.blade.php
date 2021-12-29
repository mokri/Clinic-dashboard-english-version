@extends('layouts.admin')

@section('content')

    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Edit patient info</h4>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            @foreach($patients as $patient)
            <form method="post" action="{{ route('patient.update',["id"=>$patient->id]) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First-name <span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $patient->firstName }}" type="text" name="fname">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last-name</label>
                            <input class="form-control" value="{{ $patient->lastName }}" type="text" name="lname">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ID number<span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $patient->cardNumber }}" type="tel" name="cardNumber">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{ $patient->email }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone number<span class="text-danger">*</span></label>
                            <input class="form-control" type="tel" name="tel" value="{{ $patient->phoneNumber }}">
                        </div>
                    </div>





                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of birth</label>
                            <div class="cal-icon">
                                <input type="text" name="bd" value="{{ $patient->birthdate }}" class="form-control datetimepicker">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Weight</label>
                            <input class="form-control @error('lname') is-invalid @enderror" min="1" max="300" step="any"  type="number" name="poid" >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Height</label>

                            <input class="form-control @error('lname') is-invalid @enderror" min="1" max="300"  step="any" type="number" name="taille" >
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label class="gen-label">Patient is a:</label>
                            <select name="type" class="select">

                                <option>Student</option>
                                    <option>Professor</option>
                                    <option>Stuff member</option>

{{--                                @elseif($patient->type == 'professeur')--}}
{{--                                    <option>Professor</option>--}}

{{--                                    <option>Student</option>--}}

{{--                                @else--}}
{{--                                    <option></option>--}}
{{--                                    <option>Professor</option>--}}
{{--                                    <option>Student</option>--}}
{{--                                @endif--}}
                            </select>
                        </div>


                        <div class="form-group gender-select">
                            <label class="gen-label">Gender:</label>
                            @if($patient->gender == 'Male')
                            <div class="form-check-inline">

                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Male" class="form-check-input" checked>Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Female" class="form-check-input">Female
                                </label>
                            </div>
                                @elseif($patient->gender == 'Female')
                                <div class="form-check-inline">

                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Male" class="form-check-input" >Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Female" class="form-check-input" checked>Female
                                    </label>
                                </div>

                                @else

                                <div class="form-check-inline">

                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Male" class="form-check-input" >Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Female" class="form-check-input">Female
                                    </label>
                                </div>

                             @endif
                        </div>






                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control " value="{{ $patient->address }}">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">

                                    @if($patient->pictureUrl == NULL)
                                      <img alt="" src="{{ asset('img/user.jpg') }}">
                                    @else
                                        <img alt="" src="{{ asset('storage/'.$patient->pictureUrl) }}">
                                    @endif


                                </div>
                                <div class="upload-input">
                                    <input type="file" name="avatar" class="form-control" accept="image/*" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Modifier Patient</button>
                </div>


            </form>
            @endforeach
        </div>
    </div>

@endsection
