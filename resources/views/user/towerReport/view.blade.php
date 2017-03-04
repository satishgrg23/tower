@extends('user.layouts.master')

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
                                    </tr>
                                    <tr>
                                        @for ($i = 0; $i < 10; $i++)
                                        <!-- RSL required -->
                                        <td>Status</td>
                                        <td>Remarks</td>
                                        <td>Image</td>
                                        @endfor
                                        
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

                                            <?php
                                                $res= ['rsl','llvd','rod_installation','odu_grounding','poe_grounding','secure_cable','duct_pipe','cable_routing','cable_tied','cable_taped','hose_clamp','levelling','marking','check_atn','mw_attena'];
                                                $length = count($res);
                                            ?>

                                            @for( $i=0; $i<$length; $i++)

                                                <td>
                                                    @if($data[$res[$i].'_status'] == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($data[$res[$i].'_remarks']))
                                                        {{ $data[$res[$i].'_remarks'] }}</td>
                                                    @else
                                                        No remarks
                                                    @endif

                                                <td>
                                                    @if(isset($data[$res[$i].'_image']))
                                                        <a href="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data[$res[$i].'_image']) }}" data-lightbox="photo">
                                                            <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data[$res[$i].'_image']) }}" height="100" width="100">
                                                        </a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>

                                            @endfor
                                            

                                                

                                                <td>{{ $data->site_engineer }}</td>
                                                <td>{{ $data->submit_date }}</td>



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
    <script type="text/javascript" src="http://127.0.0.1:8000/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="http://127.0.0.1:8000/js/lightbox.min.js"></script>
    
    <script src="http://127.0.0.1:8000/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap JavaScripts -->
    <script type="text/javascript" src="http://127.0.0.1:8000/js/bootstrap.min.js"></script>
    <script>
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        })
    </script>
@endsection