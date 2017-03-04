<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerReport extends Model
{
    //
    protected $fillable=[
    	'tower_link_id',
    	'site_id',
    	'tower_link',
    	'dor',
    	'entry_time',
    	'exit_time',
    	'rsl_status',
    	'rsl_remarks',
    	'rsl_image',
    	'llvd_status',
    	'llvd_remarks',
    	'llvd_image',
    	'rod_installation_status',
    	'rod_installation_remarks',
    	'rod_installation_image',
    	'odu_grounding_status',
    	'odu_grounding_remarks',
    	'odu_grounding_image',
    	'poe_grounding_status',
    	'poe_grounding_remarks',
    	'poe_grounding_image',
    	'secure_cable_status',
    	'secure_cable_remarks',
    	'secure_cable_image',
    	'duct_pipe_status',
    	'duct_pipe_remarks',
    	'duct_pipe_image',
    	'cable_routing_status',
    	'cable_routing_remarks',
    	'cable_routing_image',
    	'cable_tied_status',
    	'cable_tied_remarks',
    	'cable_tied_image',
    	'cable_taped_status',
    	'cable_taped_remarks',
    	'cable_taped_image',
    	'hose_clamp_status',
    	'hose_clamp_remarks',
    	'hose_clamp_image',
    	'levelling_status',
    	'levelling_remarks',
    	'levelling_image',
    	'marking_status',
    	'marking_remarks',
    	'marking_image',
    	'check_atn_status',
    	'check_atn_remarks',
    	'check_atn_image',
    	'mw_attena_status',
    	'mw_attena_remarks',
    	'mw_attena_image',
    	'site_engineer',
    	'submit_date'
    ];

    protected $table='tower_reports';

    public $timestamps = false;
}
