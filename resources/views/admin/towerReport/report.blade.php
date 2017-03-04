<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .text-center{
            text-align: center;
        }
        .top{
            height: 30px;
        }
        .down{
            height: 20px;
        }
        
    </style>
</head>
<body>
<table border="1" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Site id</th>
            <th rowspan="2" class="fixed-width">Tower link</th>
            <th rowspan="2" class="fixed-width">Date of Rectification</th>
            <th rowspan="2" class="fixed-width">NOC Entry time</th>
            <th rowspan="2" class="fixed-width">NOC Exit time</th>
            <th colspan="3" class="text-center top">RSl required</th>
            <th colspan="3" class="text-center top">Power taken from which LLVD.</th>
            <th colspan="3" class="text-center top">Supporting rod installation.</th>
            <th colspan="3" class="text-center top">ODU grounding(specify if Bus bas not available.)</th>
            <th colspan="3" class="text-center top">POE grounding specify if Bus bas not available.</th>
            <th colspan="3" class="text-center top">Secure POE,ATN,ODU cable, Power cable, LAN cable with glands.</th>
            <th colspan="3" class="text-center top">Duct pipe for LAN cable only.</th>
            <th colspan="3" class="text-center top">LAN, POE, Power cable routing.</th>
            <th colspan="3" class="text-center top">All the cables properly tied.</th>
            <th colspan="3" class="text-center top">All cables secured by Mastic Tape and PVC Tape.</th>
            <th colspan="3" class="text-center top"> SS Hose Clamp installation.</th>
            <th colspan="3" class="text-center top">Leveling of all equipment, MCB and cables.</th>
            <th colspan="3" class="text-center top">Marking of Polarization, Azimuth, Tilt, link ID on Antenna.</th>
            <th colspan="3" class="text-center top">Check whether ATN port is up or not. And as per the plan shared earlier. For links not under NMS, please strictly follow the port-details plan shared earlier.</th>
            <th colspan="3" class="text-center top">MW antenna is installed on MW boom and not on GSM boom.</th>
            <th rowspan="2" class="fixed-width">Site Manager</th>
            <th rowspan="2" class="fixed-width">Submitted Date</th>
        </tr>
        <tr>
            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>

            <!-- -->
            <th class="text-center down">Status</th>
            <th class="text-center down">Remarks</th>
            <th class="text-center down">Image</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach($towerReport as $data)
            <tr>
                <td class="down">{{ $data->id }}</td>
                <td class="down">{{ $data->site_id }}</td>
                <td class="down">{{ $data->tower_link }}</td>
                <td class="down">{{ $data->dor }}</td>
                <td class="down">{{ $data->entry_time }}</td>
                <td class="down">{{ $data->exit_time }}</td>
                <!-- RSL required -->
                <td class="down">
                    @if($data->rsl_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->rsl_remarks))
                        {{ $data->rsl_remarks }}</td>
                    @else
                        No remarks
                    @endif

                <td class="down">
                    @if(isset($data->rsl_image))
                        {{ $data->rsl_image }}
                    @else
                        No image
                    @endif
                </td>
                <!-- Power LLVD -->
                <td class="down">
                    @if($data->llvd_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->llvd_remarks))
                        {{ $data->llvd_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->llvd_image))
                        {{ $data->llvd_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Rod Installation-->
                <td class="down">
                    @if($data->rod_installation_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->rod_installation_remarks))
                        {{ $data->rod_installation_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->rod_installation_image))
                        {{ $data->rod_installation_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- ODU Grounding-->
                <td class="down">
                    @if($data->odu_grounding_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->odu_grounding_remarks))
                        {{ $data->odu_grounding_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->odu_grounding_image))
                        {{ $data->odu_grounding_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- POE Grounding-->
                <td class="down">
                    @if($data->poe_grounding_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->poe_grounding_remarks))
                        {{ $data->poe_grounding_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->poe_grounding_image))
                        {{ $data->poe_grounding_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Secure Cable-->
                <td class="down">
                    @if($data->secure_cable_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->secure_cable_remarks))
                        {{ $data->secure_cable_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->secure_cable_image))
                        {{ $data->secure_cable_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Duct Pipe-->
                <td class="down">
                    @if($data->duct_pipe_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->duct_pipe_remarks))
                        {{ $data->duct_pipe_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->duct_pipe_image))
                        {{ $data->duct_pipe_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Cable routing-->
                <td class="down">
                    @if($data->cable_routing_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->cable_routing_remarks))
                        {{ $data->cable_routing_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->cable_routing_image))
                        {{ $data->cable_routing_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Cable tied-->
                <td class="down">
                    @if($data->cable_tied_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->cable_tied_remarks))
                        {{ $data->cable_tied_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->cable_tied_image))
                        {{ $data->cable_tied_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Cable taped-->
                <td class="down">
                    @if($data->cable_taped_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->cable_taped_remarks))
                        {{ $data->cable_taped_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->cable_taped_image))
                        {{ $data->cable_taped_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- House clamp-->
                <td class="down">
                    @if($data->hose_clamp_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->hose_clamp_remarks))
                        {{ $data->hose_clamp_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->hose_clamp_image))
                        {{ $data->hose_clamp_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Levelling-->
                <td class="down">
                    @if($data->levelling_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->levelling_remarks))
                        {{ $data->levelling_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->levelling_image))
                        {{ $data->levelling_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Marking-->
                <td class="down">
                    @if($data->marking_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->marking_remarks))
                        {{ $data->marking_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->marking_image))
                        {{ $data->marking_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Check atn-->
                <td class="down">
                    @if($data->check_atn_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->check_atn_remarks))
                        {{ $data->check_atn_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->check_atn_image))
                        {{ $data->check_atn_image }}
                    @else
                        No image
                    @endif
                </td>

                <!-- Check mw-->
                <td class="down">
                    @if($data->mw_attena_status == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="down">
                    @if(isset($data->mw_attena_remarks))
                        {{ $data->mw_attena_remarks }}</td>
                    @else
                        No remarks
                    @endif
                <td class="down">
                    @if(isset($data->mw_attena_image))
                        {{ $data->mw_attena_image }}
                    @else
                        No image
                    @endif
                </td>

                <td class="down">{{ $data->site_engineer }}</td>
                <td class="down">{{ $data->submit_date }}</td>



            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
    
                            