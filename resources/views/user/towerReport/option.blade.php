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
                        <li><i class="fa fa-bars"></i>Tower Link Site Id</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <label class="float-left">Tower Link Site Id</label>
                        </header>
                        <!-- Div to display success or error message -->
                        <div class="panel-body">
                            <h4>Choose the site id of Tower Link <b>{{ $site_id[0] }}_{{ $site_id[1] }}</b> </h4>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ URL::to('user/towerReport/create?id='.$tower_link_id.'&site_id='.$site_id[0]) }}">{{ $site_id[0] }}</a></li>
                                <li class="list-group-item"><a href="{{ URL::to('user/towerReport/create?id='.$tower_link_id.'&site_id='.$site_id[1]) }}">{{ $site_id[1] }}</a></li>
                            </ul>
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
@endsection

