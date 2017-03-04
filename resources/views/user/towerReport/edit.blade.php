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
                            <form action="/user/towerReport/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                
                                <input type="hidden" name="tower_link_id" value="{{ $towerlink->id }}">

                                <div class="form-group row">
                                    <label class="col-sm-2" for="site_id">Site ID</label>
                                    <div class="input-div col-sm-6">
                                        <!-- <input type="text" name="site_id" id="site_id" class="form-control" required> -->
                                        <input type="text" name="site_id" class="form-control" value="{{ $site_id }}" required readonly>
                                        
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2" for="tower_link">Tower Link</label>
                                    <div class="input-div col-sm-6">
                                        <input type="text" name="tower_link" id="tower_link" class="form-control"  value="{{ $towerlink->tower_link }}" required readonly>                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="dor">Date of Rectification : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="date" name="dor" id="dor" class="form-control" value="{{ $data->dor }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="entry_time">NOC Entry Time : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="time" name="entry_time" id="entry_time" class="form-control" value="{{ $data->entry_time }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2" for="exit_time">NOC Exit Time : </label>
                                    <div class="input-div col-sm-6">
                                        <input type="time" name="exit_time" id="exit_time" class="form-control" value="{{ $data->exit_time }}" required>
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
                                            <tr>
                                                <td>1</td>
                                                <td>RSL required</td>
                                                <td>
                                                    <select name="rsl_status" id="rsl_status" class="form-control" onchange=" actionChange('rsl');">
                                                        @if( $data->rsl_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="rsl_remarks" id="rsl_remarks" @if( $data->rsl_status == 1) disabled="disabled" @endif>{{ $data->rsl_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->rsl_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->rsl_image) }}" height="100" width="100">
                                                        <input type="hidden" name="rsl_image_old" value="{{ $data->rsl_image }}" accept="image/*" >
                                                        <input type="file" name="rsl_image" accept="image/*" class="form-control" value="{{ $data->rsl_image }}">
                                                    @else
                                                        <input type="file" name="rsl_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Power taken from which LLVD.</td>
                                                <td>
                                                    <select name="llvd_status" id="llvd_status" class="form-control" onchange=" actionChange('llvd');">
                                                        @if( $data->llvd_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="llvd_remarks" id="llvd_remarks" @if( $data->llvd_status == 1) disabled="disabled" @endif>{{ $data->llvd_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->llvd_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->llvd_image) }}" height="100" width="100">
                                                        <input type="hidden" name="llvd_image_old" value="{{ $data->llvd_image }}" accept="image/*" >
                                                        <input type="file" name="llvd_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="llvd_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Supporting rod installation.</td>
                                                <td>
                                                    <select name="rod_installation_status" id="rod_installation_status" class="form-control" onchange="actionChange('rod_installation');">
                                                        @if( $data->rod_installation_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="rod_installation_remarks" id="rod_installation_remarks" @if( $data->rod_installation_status == 1) disabled="disabled" @endif>{{ $data->rod_installation_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->rod_installation_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->rod_installation_image) }}" height="100" width="100">
                                                        <input type="hidden" name="rod_installation_image_old" value="{{ $data->rod_installation_image }}" accept="image/*" >
                                                        <input type="file" name="rod_installation_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="rod_installation_image" accept="image/*" class="form-control"> 
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td> ODU grounding(specify if Bus bas not available.)</td>
                                                <td>
                                                    <select name="odu_grounding_status" id="odu_grounding_status" class="form-control" onchange=" actionChange('odu_grounding');">
                                                        @if( $data->odu_grounding_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="odu_grounding_remarks" id="odu_grounding_remarks" @if( $data->odu_grounding_status == 1) disabled="disabled" @endif>{{ $data->odu_grounding_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->odu_grounding_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->odu_grounding_image) }}" height="100" width="100">
                                                        <input type="hidden" name="odu_grounding_image_old" value="{{ $data->odu_grounding_image }}" accept="image/*" >
                                                        <input type="file" name="odu_grounding_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="odu_grounding_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>  POE grounding specify if Bus bas not available.</td>
                                                <td>
                                                    <select name="poe_grounding_status" id="poe_grounding_status" class="form-control" onchange=" actionChange('poe_grounding');">
                                                        @if( $data->poe_grounding_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="poe_grounding_remarks" id="poe_grounding_remarks" @if( $data->poe_grounding_status == 1) disabled="disabled" @endif>{{ $data->poe_grounding_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->poe_grounding_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->poe_grounding_image) }}" height="100" width="100">
                                                        <input type="hidden" name="poe_grounding_image_old" value="{{ $data->poe_grounding_image }}" accept="image/*" >
                                                        <input type="file" name="poe_grounding_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="poe_grounding_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>6</td>
                                                <td>Secure POE,ATN,ODU cable, Power cable, LAN cable with glands.</td>
                                                <td>
                                                    <select name="secure_cable_status" id="secure_cable_status" class="form-control" onchange=" actionChange('secure_cable');">
                                                        @if( $data->secure_cable_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="secure_cable_remarks" id="secure_cable_remarks" @if( $data->secure_cable_status == 1) disabled="disabled" @endif>{{ $data->secure_cable_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->secure_cable_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->secure_cable_image) }}" height="100" width="100">
                                                        <input type="hidden" name="secure_cable_image_old" value="{{ $data->secure_cable_image }}" accept="image/*" >
                                                        <input type="file" name="secure_cable_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="secure_cable_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>7</td>
                                                <td> Duct pipe for LAN cable only.</td>
                                                <td>
                                                    <select name="duct_pipe_status" id="duct_pipe_status" class="form-control" onchange=" actionChange('duct_pipe');">
                                                        @if( $data->duct_pipe_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="duct_pipe_remarks" id="duct_pipe_remarks" @if( $data->duct_pipe_status == 1) disabled="disabled" @endif>{{ $data->duct_pipe_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->duct_pipe_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->duct_pipe_image) }}" height="100" width="100">
                                                        <input type="hidden" name="duct_pipe_image_old" value="{{ $data->duct_pipe_image }}" accept="image/*" >
                                                        <input type="file" name="duct_pipe_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="duct_pipe_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>8</td>
                                                <td>LAN, POE, Power cable routing.</td>
                                                <td>
                                                    <select name="cable_routing_status" id="cable_routing_status" class="form-control" onchange=" actionChange('cable_routing');">
                                                        @if( $data->cable_routing_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="cable_routing_remarks" id="cable_routing_remarks" @if( $data->cable_routing_status == 1) disabled="disabled" @endif>{{ $data->cable_routing_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->cable_routing_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->cable_routing_image) }}" height="100" width="100">
                                                        <input type="hidden" name="cable_routing_image_old" value="{{ $data->cable_routing_image }}" accept="image/*" >
                                                        <input type="file" name="cable_routing_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="cable_routing_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>9</td>
                                                <td> All the cables properly tied.</td>
                                                <td>
                                                    <select name="cable_tied_status" id="cable_tied_status" class="form-control" onchange=" actionChange('cable_tied');">
                                                        @if( $data->cable_tied_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="cable_tied_remarks" id="cable_tied_remarks" @if( $data->cable_tied_status == 1) disabled="disabled" @endif>{{ $data->cable_tied_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->cable_tied_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->cable_tied_image) }}" height="100" width="100">
                                                        <input type="hidden" name="cable_tied_image_old" value="{{ $data->cable_tied_image }}" accept="image/*" >
                                                        <input type="file" name="cable_tied_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="cable_tied_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>10</td>
                                                <td>All cables secured by Mastic Tape and PVC Tape.</td>
                                                <td>
                                                    <select name="cable_taped_status" id="cable_taped_status" class="form-control" onchange=" actionChange('cable_taped');">
                                                        @if( $data->cable_taped_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="cable_taped_remarks" id="cable_taped_remarks" @if( $data->cable_taped_status == 1) disabled="disabled" @endif>{{ $data->cable_taped_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->cable_taped_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->cable_taped_image) }}" height="100" width="100">
                                                        <input type="hidden" name="cable_taped_image_old" value="{{ $data->cable_taped_image }}" accept="image/*" >
                                                        <input type="file" name="cable_taped_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="cable_taped_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>11</td>
                                                <td> SS Hose Clamp installation.</td>
                                                <td>
                                                    <select name="hose_clamp_status" id="hose_clamp_status" class="form-control" onchange=" actionChange('hose_clamp');">
                                                        @if( $data->hose_clamp_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="hose_clamp_remarks" id="hose_clamp_remarks" @if( $data->hose_clamp_status == 1) disabled="disabled" @endif>{{ $data->hose_clamp_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->hose_clamp_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->hose_clamp_image) }}" height="100" width="100">
                                                        <input type="hidden" name="hose_clamp_image_old" value="{{ $data->hose_clamp_image }}" accept="image/*" >
                                                        <input type="file" name="hose_clamp_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="hose_clamp_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>12</td>
                                                <td>Leveling of all equipment, MCB and cables.</td>
                                                <td>
                                                    <select name="levelling_status" id="levelling_status" class="form-control" onchange=" actionChange('levelling');">
                                                        @if( $data->levelling_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="levelling_remarks" id="levelling_remarks" @if( $data->levelling_status == 1) disabled="disabled" @endif>{{ $data->levelling_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->levelling_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->levelling_image) }}" height="100" width="100">
                                                        <input type="hidden" name="levelling_image_old" value="{{ $data->levelling_image }}" accept="image/*" >
                                                        <input type="file" name="levelling_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="levelling_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>13</td>
                                                <td>Marking of Polarization, Azimuth, Tilt, link ID on Antenna.</td>
                                                <td>
                                                    <select name="marking_status" id="marking_status" class="form-control" onchange=" actionChange('marking');">
                                                        @if( $data->marking_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="marking_remarks" id="marking_remarks" @if( $data->marking_status == 1) disabled="disabled" @endif>{{ $data->marking_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->marking_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->marking_image) }}" height="100" width="100"marking                                                       <input type="hidden" name="marking_image_old" value="{{ $data->marking_image }}" accept="image/*" >
                                                        <input type="file" name="marking_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="marking_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>14</td>
                                                <td> Check whether ATN port is up or not. And as per the plan shared earlier. For links not under NMS, please strictly follow the port-details plan shared earlier.</td>
                                                <td>
                                                    <select name="check_atn_status" id="check_atn_status" class="form-control" onchange="actionChange('check_atn');">
                                                        @if( $data->check_atn_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="check_atn_remarks" id="check_atn_remarks" @if( $data->check_atn_status == 1) disabled="disabled" @endif>{{ $data->check_atn_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->check_atn_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->check_atn_image) }}" height="100" width="100">
                                                        <input type="hidden" name="check_atn_image_old" value="{{ $data->check_atn_image }}" accept="image/*" >
                                                        <input type="file" name="check_atn_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" name="check_atn_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>15</td>
                                                <td>MW antenna is installed on MW boom and not on GSM boom.</td>
                                                <td>
                                                    <select name="mw_attena_status" id="mw_attena_status" class="form-control" onchange="actionChange('mw_attena');">
                                                        @if( $data->mw_attena_status == 1)
                                                            <option value="1" selected="selected">Yes</option>
                                                            <option value="0">No</option>
                                                        @else
                                                            <option value="0" selected="selected">No</option>
                                                            <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" name="mw_attena_remarks" id="mw_attena_remarks" @if( $data->mw_attena_status == 1) disabled="disabled" @endif>{{ $data->mw_attena_remarks }}</textarea>
                                                </td>
                                                <td>
                                                    @if( $data->mw_attena_image )
                                                        <img src="{{ url('uploads/reportImage/'.$data->tower_link.'/'.$data->site_id.'/'.$data->mw_attena_image) }}" height="100" width="100">
                                                        <input type="hidden" name="mw_attena_image_old" value="{{ $data->mw_attena_image }}" accept="image/*" >
                                                        <input type="file" id="file" name="mw_attena_image" accept="image/*" class="form-control">
                                                    @else
                                                        <input type="file" id="file" name="mw_attena_image" accept="image/*" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>


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



                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="put">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
            if(this.files[0].size > 102400){
               alert("File is too big. File should be less than 1 MB!");
               this.value = "";
            };
        };
    </script>
@endsection


                            
      
