@extends('user.layouts.master')

@section('body')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li><i class="fa fa-bars"></i>Tower Link</li>
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
                            <!-- Form starts -->
                            <form action="/user/towerReport" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                

                                <div class="form-group row">
                                    <label class="col-sm-2" for="site_id">Site ID</label>
                                    <div class="input-div col-sm-6">
                                        <input type="text" name="site_id" class="form-control" value="{{ $site_id }}" required readonly>      
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2" for="tower_link">Tower Link</label>
                                    <div class="input-div col-sm-6">
                                        <input type="text" name="tower_link" id="tower_link" class="form-control"  value="{{ $towerlink->tower_link }}" required readonly>
                                        <input type="hidden" name="tower_link_id" value="{{ $towerlink->id }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="dor">Date of Rectification : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="date" name="dor" id="dor" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="entry_time">NOC Entry Time : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="time" name="entry_time" id="entry_time" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="exit_time">NOC Exit Time : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="time" name="exit_time" id="exit_time" class="form-control" required>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">S.N.</th>
                                                <th class="col-sm-4">Title</th>
                                                <th class="col-sm-1">Status</th>
                                                <th class="col-sm-3">Remarks</th>
                                                <th class="col-sm-3">Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $res= ['rsl','llvd','rod_installation','odu_grounding','poe_grounding','secure_cable','duct_pipe','cable_routing','cable_tied','cable_taped','hose_clamp','levelling','marking','check_atn','mw_attena'];
                                                $title=['RSL required','Power taken from which LLVD','Supporting rod installation.','ODU grounding(specify if Bus bas not available.','POE grounding specify if Bus bas not available.','Secure POE,ATN,ODU cable, Power cable, LAN cable with glands.','Duct pipe for LAN cable only.','LAN, POE, Power cable routing.','All the cables properly tied.','All cables secured by Mastic Tape and PVC Tape.','SS Hose Clamp installation.','Leveling of all equipment, MCB and cables.','Marking of Polarization, Azimuth, Tilt, link ID on Antenna.','Check whether ATN port is up or not. And as per the plan shared earlier. For links not under NMS, please strictly follow the port-details plan shared earlier.','MW antenna is installed on MW boom and not on GSM boom.'];
                                                $length = count($res);
                                            ?>

                                            @for( $i=0; $i<$length; $i++)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{ $title[$i] }}</td>
                                                <td>
                                                    <select name="{{ $res[$i].'_status' }}" id="{{ $res[$i].'_status' }}" class="form-control" onchange=" actionChange('{{ $res[$i] }}');">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="{{ $res[$i].'_remarks' }}" id="{{ $res[$i].'_remarks' }}" disabled="disabled"></textarea>
                                                </td>
                                                <td>
                                                    <input type="file" id="file" name="{{ $res[$i].'_image' }}" accept="image/*" class="form-control">
                                                </td>
                                            </tr>
                                            @endfor

                                            


                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="site_engineer">Site Engineer : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="text" name="site_engineer" id="site_engineer" class="form-control" value="{{ Sentinel::getUser()->full_name }}" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="submit_date">Date : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="date" name="submit_date" id="submit_date" class="form-control" value="{{ Carbon\Carbon::now()->toDateString() }}" required readonly>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>

                            </form>
                            <!-- Form ends -->
                            
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <script type="text/javascript">
        function actionChange(txt){
            var value = document.getElementById(txt+"_status").value;
            if (value == 0) {
                document.getElementById(txt+"_remarks").disabled =false;
            }else{
                document.getElementById(txt+"_remarks").disabled =true;
            }
        }

    </script>
    <script type="text/javascript">
        var uploadField = document.getElementById("file");

        uploadField.onchange = function() {
            if(this.files[0].size > 1024000){
               alert("File is too big. File should be less than 1 MB!");
               this.value = "";
            };
        };
    </script>
@endsection



                            