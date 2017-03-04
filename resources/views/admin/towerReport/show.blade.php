@extends('admin.layouts.master')

@section('stylesheets')
    @parent
    <link href="{{ URL::asset('css/lightbox.css') }}" rel="stylesheet">
@endsection

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="fa fa-bars"></i>Tower Report</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Tower Report</label>
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            @if (Session::has('flash_msg'))
                                <div class="alert alert-success">
                                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ Session::get('flash_msg') }}
                                </div>
                            @endif
                        <!-- Data table to display the records of trekking sites -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">ID</th>
                                        <th rowspan="2">Site id</th>
                                        <th rowspan="2">Tower link</th>
                                        <th rowspan="2">Date of Rectification</th>
                                        <th rowspan="2">NOC Entry time</th>
                                        <th rowspan="2">NOC Exit time</th>
                                        <th colspan="3" class="text-center">RSl required</th>
                                        <th colspan="3" class="text-center">Power taken from which LLVD.</th>
                                        <th colspan="3" class="text-center">Supporting rod installation.</th>
                                        <th colspan="3" class="text-center">ODU grounding(specify if Bus bas not available.)</th>
                                        <th colspan="3" class="text-center">POE grounding specify if Bus bas not available.</th>
                                        <th colspan="3" class="text-center">Secure POE,ATN,ODU cable, Power cable, LAN cable with glands.</th>
                                        <th colspan="3" class="text-center">Duct pipe for LAN cable only.</th>
                                        <th colspan="3" class="text-center">LAN, POE, Power cable routing.</th>
                                        <th colspan="3" class="text-center">All the cables properly tied.</th>
                                        <th colspan="3" class="text-center">All cables secured by Mastic Tape and PVC Tape.</th>
                                        <th colspan="3" class="text-center"> SS Hose Clamp installation.</th>
                                        <th colspan="3" class="text-center">Leveling of all equipment, MCB and cables.</th>
                                        <th colspan="3" class="text-center">Marking of Polarization, Azimuth, Tilt, link ID on Antenna.</th>
                                        <th colspan="3" class="text-center">Check whether ATN port is up or not. And as per the plan shared earlier. For links not under NMS, please strictly follow the port-details plan shared earlier.</th>
                                        <th colspan="3" class="text-center">MW antenna is installed on MW boom and not on GSM boom.</th>
                                        <th rowspan="2">Site Manager</th>
                                        <th rowspan="2">Submitted Date</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <!-- RSL required -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!-- Power LLVD -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>


                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>

                                        <!--  -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($towerReport as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->site_id }}</td>
                                                <td>{{ $data->tower_link }}</td>
                                                <td>{{ $data->dor }}</td>
                                                <td>{{ $data->entry_time }}</td>
                                                <td>{{ $data->exit_time }}</td>
                                                <!-- RSL required -->
                                                <td>
                                                    @if($data->rsl_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->rsl_remarks))
                                                        {{ $data->rsl_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif

                                                <td>
                                                    @if(isset($data->rsl_image))
                                                        <a href="{{ url('img/'.$data->rsl_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->rsl_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>
                                                <!-- Power LLVD -->
                                                <td>
                                                    @if($data->llvd_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->llvd_remarks))
                                                        {{ $data->llvd_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->llvd_image))
                                                    <a href="{{ url('img/'.$data->llvd_image) }}" data-lightbox="photo">
                                                        <img src="{{ url('img/'.$data->llvd_image) }}" height="100" width="100">
                                                    </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Rod Installation-->
                                                <td>
                                                    @if($data->rod_installation_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->rod_installation_remarks))
                                                        {{ $data->rod_installation_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->rod_installation_image))
                                                        <a href="{{ url('img/'.$data->rod_installation_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->rod_installation_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- ODU Grounding-->
                                                <td>
                                                    @if($data->odu_grounding_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->odu_grounding_remarks))
                                                        {{ $data->odu_grounding_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->odu_grounding_image))
                                                        <a href="{{ url('img/'.$data->odu_grounding_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->odu_grounding_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- POE Grounding-->
                                                <td>
                                                    @if($data->poe_grounding_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->poe_grounding_remarks))
                                                        {{ $data->poe_grounding_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->poe_grounding_image))
                                                        <a href="{{ url('img/'.$data->poe_grounding_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->poe_grounding_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Secure Cable-->
                                                <td>
                                                    @if($data->secure_cable_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->secure_cable_remarks))
                                                        {{ $data->secure_cable_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->secure_cable_image))
                                                        <a href="{{ url('img/'.$data->secure_cable_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->secure_cable_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Duct Pipe-->
                                                <td>
                                                    @if($data->duct_pipe_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->duct_pipe_remarks))
                                                        {{ $data->duct_pipe_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->duct_pipe_image))
                                                        <a href="{{ url('img/'.$data->duct_pipe_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->duct_pipe_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Cable routing-->
                                                <td>
                                                    @if($data->cable_routing_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->cable_routing_remarks))
                                                        {{ $data->cable_routing_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->cable_routing_image))
                                                        <a href="{{ url('img/'.$data->cable_routing_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->cable_routing_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Cable tied-->
                                                <td>
                                                    @if($data->cable_tied_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->cable_tied_remarks))
                                                        {{ $data->cable_tied_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->cable_tied_image))
                                                        <a href="{{ url('img/'.$data->cable_tied_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->cable_tied_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Cable taped-->
                                                <td>
                                                    @if($data->cable_taped_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->cable_taped_remarks))
                                                        {{ $data->cable_taped_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->cable_taped_image))
                                                        <a href="{{ url('img/'.$data->cable_taped_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->cable_taped_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- House clamp-->
                                                <td>
                                                    @if($data->hose_clamp_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->hose_clamp_remarks))
                                                        {{ $data->hose_clamp_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->hose_clamp_image))
                                                        <a href="{{ url('img/'.$data->hose_clamp_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->hose_clamp_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Levelling-->
                                                <td>
                                                    @if($data->levelling_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->levelling_remarks))
                                                        {{ $data->levelling_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->levelling_image))
                                                        <a href="{{ url('img/'.$data->levelling_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->levelling_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Marking-->
                                                <td>
                                                    @if($data->marking_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->marking_remarks))
                                                        {{ $data->marking_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->marking_image))
                                                        <a href="{{ url('img/'.$data->marking_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->marking_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Check atn-->
                                                <td>
                                                    @if($data->check_atn_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->check_atn_remarks))
                                                        {{ $data->check_atn_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->check_atn_image))
                                                        <a href="{{ url('img/'.$data->check_atn_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->check_atn_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <!-- Check mw-->
                                                <td>
                                                    @if($data->mw_attena_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data->mw_attena_remarks))
                                                        {{ $data->mw_attena_remarks }}</td>
                                                    @else
                                                        No remarks
                                                    @endif
                                                <td>
                                                    @if(isset($data->mw_attena_image))
                                                        <a href="{{ url('img/'.$data->mw_attena_image) }}" data-lightbox="photo">
                                                            <img src="{{ url('img/'.$data->mw_attena_image) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                                <td>{{ $data->site_engineer }}</td>
                                                <td>{{ $data->submit_date }}</td>
                                                <td></td>
                                            



                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lightbox.min.js') }}"></script>
    
    <script src="{{ URL::asset('js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap JavaScripts -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script>
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        })
    </script>
@endsection