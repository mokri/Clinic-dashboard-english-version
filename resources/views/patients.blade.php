@extends('layouts.admin')

@section('content')

        <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('patients.add')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>


                        <div class="col-sm-6 col-3 input-group md-form form-sm form-2 pl-0">

  <input class="form-control my-0 py-1 lime-border" type="text" id="search" onkeyup="myFunction()" placeholder="Search" aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fa fa-search text-grey"
        aria-hidden="true"></i></span>
  </div>
</div>
                    </div>




                </div>
				<div class="row">

						<div class="table-responsive">				<div class="col-md-12">


							<table class="table table-border table-striped custom-table datatable mb-0" >
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>ID number</th>
										<th>Phone number</th>
										<th>diagnosis</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody id="myTable">

								@foreach($patients as $patient)


									<tr>
										@if($patient->pictureUrl)
										<td class="table-active"><img width="28" height="28" src="{{ asset('storage/'.$patient->pictureUrl) }}" class="rounded-circle m-r-5" alt=""> {{$patient->firstName.' '.$patient->lastName}}</td>
										@elseif(!$patient->pictureUrl)
										<td class="table-active"><img width="28" height="28" src="{{ asset('img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{$patient->firstName.' '.$patient->lastName}}</td>

										@endif
										<td class="table-warning">{{$patient->birthdate}}</td>
										<td class="table-primary">{{$patient->cardNumber}}</td>
										<td class="table-success">{{$patient->phoneNumber}}</td>
										<td class="table-danger">{{Str::limit($patient->diag_details,30)}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('patient.show',["id"=>$patient->id]) }}"  ><i class="fa fa-trash-o m-r-5"></i> Details</a>
													<a class="dropdown-item" href="{{ route('patient.edit',["id"=>$patient->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="{{ route('patient.delete',["id"=>$patient->id]) }}"  ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
											</div>
										</td>
									</tr>
                                    @endforeach


								</tbody>
							</table>
						</div>
					</div>
                </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
