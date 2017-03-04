@extends('admin.layouts.master')

@section('body')

    <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><i class="icon-home"></i><a href="#"> Home</a></li>
                            <li><i class="icon-bars"></i>Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box blue-bg">
                            <i class="icon-download"></i>
                            <div class="count">6.674</div>
                            <div class="title">Download</div>                       
                        </div><!--/.info-box-->         
                    </div><!--/.col-->
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="icon-shopping-cart"></i>
                            <div class="count">7.538</div>
                            <div class="title">Purchased</div>                      
                        </div><!--/.info-box-->         
                    </div><!--/.col-->  
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <i class="icon-thumbs-up"></i>
                            <div class="count">4.362</div>
                            <div class="title">Order</div>                      
                        </div><!--/.info-box-->         
                    </div><!--/.col-->
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <i class="icon-user"></i>
                            <div class="count">1.426</div>
                            <div class="title">Stock</div>                      
                        </div><!--/.info-box-->         
                    </div><!--/.col-->
                    
                </div><!--/.row-->
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
@endsection