<table id="datatable" data-id="datatable" class="custom_border table-hover" cellspacing="0" width="100%">
											
											<thead class="table-secondary" id="adm-student">
												<tr>
													<!-- <th class="text-right " width="5%">S.No</th> -->
													<th class="w-25" l>Adm No</th>
													<th class="w-15" l>Adm Date</th>
													<th class="w-15" l>Full Name</th>
													<th class="w-15" l>Father Name</th>
													<th class="w-20 disabled-sorting">City</th>
													<th class="w-10 disabled-sorting">Contact No</th>
													<th class="w-10 disabled-sorting">Status</th>
													<th class="disabled-sorting w-auto text-center hide-coloumn">Actions</th>
												</tr>
											</thead>
											
											<tbody id="bidders"> @php $i= 1; @endphp @foreach($students as $student)
												@php 
												$father_id= $student->studentinfo ? $student->studentinfo->father_id:''; 
													$fathers = $student->studentinfo ? $student->studentinfo->father($father_id):'';
													//dd($fathers);
													 
												@endphp
												
												<tr>
													<!-- <td class="text-center">{{$i++}}</td> -->


									 

												 

													@php 
													$pnt_District= '';
													$pnt_mob_Ph='';
													if($student->studentinfo){
														
														if($student->studentinfo->contact){
															$pnt_mob_Ph = $student->studentinfo->contact?$student->studentinfo->contact->pnt_mob_Ph:'';
															if($student->studentinfo->contact->domicile){
																$pnt_District = $student->studentinfo->contact?$student->studentinfo->contact->domicile->dom_District:'';
															}

														}
													} 
													
													@endphp


													<td class="w-25"> {{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}</td>
													<td> {{$student->studentinfo?$student->studentinfo->admission->adm_Date:''}}</td>
													<td>{{ $student?$student->name:''}}</td>
													<td>{{ (!empty($fathers->name))? $fathers->name :''}}</td>
													<td>{{$pnt_District}}
													</td>
													<td>{{$pnt_mob_Ph}}</td>
													<td>{{$student->status}}</td>
													<td class="text-right hide-coloumn" >
														<div class="form-inline">
															<div class="">
																<button class=" btn-link btn-cus-weight show-view-class-btn viewStudentInfo" type="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-id="{{ $student->id  }}"> View </button>
															</div> @canany(['withdraw-admission', 'edit-student'])
															<div class="nav-item btn-rotate dropdown pull-right ">
																<a class="nav-link dropdown-toggle pull-right" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="{{ $student->id  }}"> </a>
																<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> @can('edit-student') <a class="dropdown-item edit-subject" href="{{url('edit-admission-info/'.$student->id)}}" {{-- data-target="#editclass" --}} aria-haspopup="true" aria-expanded="false" data-id="{{ $student->id  }}">Edit</a> @endcan {{--<a class="dropdown-item" onclick="return confirm('Are you sure you want to Change Student Status?');" href="{{url('change-student/'.$student->id )}}">Change Status</a>--}} @can('withdraw-admission') <a class="dropdown-item" href="{{url('withdrawl-student/'.$student->id )}}">Withdraw
                                                                            Student</a> @endcan </div>
															</div> @endcanany {{--<a href="#" class="btn btn-success btn-link btn-icon btn-sm fa fa-eye" title="View Profile"><i class="fa fa-times"></i></a> <a href="{{url('edit-admission-info/'.$student->std_Id)}}" title="Edit" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a> <a href="../../examples/pages/withdraw-student.html" class="btn btn-danger btn-link btn-icon btn-sm edit" title="withdraw"><i class="fa fa-times"></i></a>--}} 
														</td>
												</tr> 
												@endforeach 
											</tbody>
										</table>