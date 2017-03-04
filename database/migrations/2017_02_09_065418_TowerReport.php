<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TowerReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_id');
            $table->integer('tower_link_id');
            $table->string('tower_link');
            $table->string('dor');
            $table->string('entry_time');
            $table->string('exit_time');
            
            // $table->integer('rsl_id');
            $table->string('rsl_status');
            $table->text('rsl_remarks')->nullable();
            $table->string('rsl_image')->nullable();

            // $table->integer('power_llvd_id');
            $table->string('llvd_status');
            $table->text('llvd_remarks')->nullable();
            $table->string('llvd_image')->nullable();

            // $table->integer('rod_installation_id');
            $table->string('rod_installation_status');
            $table->text('rod_installation_remarks')->nullable();
            $table->string('rod_installation_image')->nullable();

            // $table->integer('odu_grounding_id');
            $table->string('odu_grounding_status');
            $table->text('odu_grounding_remarks')->nullable();
            $table->string('odu_grounding_image')->nullable();

            // $table->integer('poe_grounding_id');
            $table->string('poe_grounding_status');
            $table->text('poe_grounding_remarks')->nullable();
            $table->string('poe_grounding_image')->nullable();

            // $table->integer('secure_cable_id');
            $table->string('secure_cable_status');
            $table->text('secure_cable_remarks')->nullable();
            $table->string('secure_cable_image')->nullable();
            
            // $table->integer('duct_pipe_id');
            $table->string('duct_pipe_status');
            $table->text('duct_pipe_remarks')->nullable();
            $table->string('duct_pipe_image')->nullable();

            // $table->integer('cable_routing_id');
            $table->string('cable_routing_status');
            $table->text('cable_routing_remarks')->nullable();
            $table->string('cable_routing_image')->nullable();

            // $table->integer('cable_tied_id');
            $table->string('cable_tied_status');
            $table->text('cable_tied_remarks')->nullable();
            $table->string('cable_tied_image')->nullable();

            // $table->integer('cable_taped_id');
            $table->string('cable_taped_status');
            $table->text('cable_taped_remarks')->nullable();
            $table->string('cable_taped_image')->nullable();

            // $table->integer('hose_clamp_id');
            $table->string('hose_clamp_status');
            $table->text('hose_clamp_remarks')->nullable();
            $table->string('hose_clamp_image')->nullable();

            // $table->integer('levelling_id');
            $table->string('levelling_status');
            $table->text('levelling_remarks')->nullable();
            $table->string('levelling_image')->nullable();

            // $table->integer('marking_id');
            $table->string('marking_status');
            $table->text('marking_remarks')->nullable();
            $table->string('marking_image')->nullable();

            // $table->integer('check_atn_id');
            $table->string('check_atn_status');
            $table->text('check_atn_remarks')->nullable();
            $table->string('check_atn_image')->nullable();

            // $table->integer('mw_attena_id');
            $table->string('mw_attena_status');
            $table->text('mw_attena_remarks')->nullable();
            $table->string('mw_attena_image')->nullable();

            $table->string('site_engineer');
            $table->string('submit_date');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tower_reports');
    }
}
