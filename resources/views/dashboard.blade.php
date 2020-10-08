@extends('layouts.admin') @section('content')
<style type="text/css">
    .pd {
        margin: 15px;
    }
</style>
<?php 
// print_r($data);
//          exit();
        		  ?>
<div id="page-wrapper">
    <div class="main-page">
        <div class="col_3 pd">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-bars icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['categort']}}</strong></h5>
                        <span>Total categort</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-dropbox user1 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['product']}}</strong></h5>
                        <span>Total product</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-picture-o user2 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['slider']}}</strong></h5>
                        <span>Total slider</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar1 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['users']}}</strong></h5>
                        <span>Total users</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-desktop dollar2 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['testimonials']}}</strong></h5>
                        <span>Total testimonials</span>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="main-page">
        <div class="col_3 pd">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-comments icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['review']}}</strong></h5>
                        <span>Total review</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-clipboard icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{$data['news']}}</strong></h5>
                        <span>Online news</span>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div> <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
