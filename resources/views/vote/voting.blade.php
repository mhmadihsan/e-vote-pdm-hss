@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('bs/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bs/icons/fa.min.css')}}">
    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:60px;
            right:70px;
            background-color:#0a58ca;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:15px;
        }
        *,
        *:before,
        *:after {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        :focus {
            outline: 0px;
        }
        .quiz_title{
            font-size: 30px;
            font-weight: 700;
            color: #292d3f;
            text-align: center;
            margin-bottom: 50px;
        }

        .quiz_card_area{position: relative;margin-bottom: 30px;}
        .single_quiz_card{
            border:1px solid #efefef;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        .quiz_card_title{
            padding: 10px;
            text-align: center;
            background-color: #d6d6d6;
        }
        .quiz_card_title h3{
            font-size: 16px;
            font-weight: 400;
            color: #292d3f;
            margin-bottom: 0;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        .quiz_card_title h3 i{opacity: 0;}
        .quiz_card_icon{
            max-width: 100%;
            min-height: 135px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quiz_icon {
            width: 150px;
            height: 155px;
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: auto;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        .quiz_icon1{
            background-image: url('https://img.icons8.com/ios-filled/32/000000/maxcdn.png');
        }
        .quiz_icon2{
            background-image: url('https://img.icons8.com/ios-filled/48/000000/download-2.png');
        }
        .quiz_icon3{
            background-image: url('https://img.icons8.com/ios/50/000000/cloudflare.png');
        }
        .quiz_icon4{
            background-image: url('https://img.icons8.com/dotty/80/000000/download-2.png');
        }
        .quiz_checkbox {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            cursor: pointer;
        }
        .quiz_checkbox:checked ~ .single_quiz_card{border: 1px solid #2575fc;}
        .quiz_checkbox:checked:hover ~ .single_quiz_card{border: 1px solid #2575fc;}

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_title{background-color:#2575fc; color: #ffffff;}
        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_title h3{color: #ffffff;}
        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_title h3 i{opacity: 1;}
        .quiz_checkbox:checked:hover ~ .quiz_card_title{border: 1px solid #2575fc;}

        /*Icon Selector*/

        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon {color: #2575fc;}
        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon1{
            background-image: url('https://img.icons8.com/nolan/32/000000/maxcdn.png');
        }
        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon2{
            background-image: url('https://img.icons8.com/color/48/000000/download-2.png');
        }
        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon3{
            background-image: url('https://img.icons8.com/color/48/000000/cloudflare.png');
        }
        .quiz_checkbox:checked ~ .single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon4{
            background-image: url('https://img.icons8.com/material-outlined/80/000000/download-2.png');
        }

        .quiz_card_icon{
            font-size: 50px;
            color: #000000;
        }

        .quiz_backBtn_progressBar{
            position: relative;
            margin-bottom: 60px;
        }
        .quiz_backBtn{
            background-color: transparent;
            border: 1px solid #d2d2d3;
            color: #8e8e8e;
            border-radius: 50%;
            position: absolute;
            top: -17px;
            left: 0px;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none!important;
        }
        .quiz_backBtn:hover{color: #a9559b;border: 1px solid #2575fc;}
        .quiz_backBtn_progressBar .progress{margin-left: 50px;margin-top: 50px;height: 6px;}
        .quiz_backBtn_progressBar .progress-bar{
            background-color: #2575fc;
        }
        .quiz_next{
            text-align: center;
            margin-top: 50px;
        }
        .quiz_continueBtn{
            max-width: 315px;
            background-color: #2575fc;
            color: #ffffff;
            font-size: 18px;
            border-radius: 20px;
            padding: 10px 125px;
            border: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$ticket->name_tickets ?? null}} </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="quiz_content_area">
                                    <div class="row">
                                        @foreach($candidate->sortBy('name') as $c)
                                        <div class="col-sm-4">
                                            <div class="quiz_card_area">
                                                <input class="quiz_checkbox" onclick="checking(this)" type="checkbox"  value="{{$c->id}}"  />
                                                <div class="single_quiz_card">
                                                    <div class="quiz_card_content">
                                                        <div class="quiz_card_icon">
                                                            @if($c->image_path)
                                                                <img class="quiz_icon" src="{{asset($c->image_path)}}" alt="">
                                                            @else
                                                                <img class="quiz_icon" src="{{asset('user.png')}}" alt="">
                                                            @endif

                                                        </div>
                                                        <!-- end of quiz_card_media -->

                                                        <div class="quiz_card_title">
                                                            <h3>
                                                                <b>({{$no++}})</b>
                                                                {{$c->name}}
                                                            </h3>
                                                        </div><!-- end of quiz_card_title -->
                                                    </div><!-- end of quiz_card_content -->
                                                </div><!-- end of single_quiz_card -->
                                            </div><!-- end of quiz_card_area -->
                                        </div><!-- end of col3  -->
                                        @endforeach

                                    </div><!-- end of quiz_card_area -->
                                </div><!-- end of quiz_content_area -->

                            </div><!-- end of col12 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="btn_sumbit" onclick="submit_vote(this)" disabled class="float">
            <p id="count_show_choice" class="my-float">0</p>
        </button>
    </div>
@endsection


@section('custom_js')
    <script src="{{asset('bs/js/jquery.min.js')}}"></script>
    <script src="{{asset('bs/js/axios.min.js')}}"></script>
    <script src="{{asset('bs/js/bootstrap.js')}}"></script>
    <script src="{{asset('bs/js/sw.js')}}"></script>
    <script src="{{asset('main/voting.js')}}"></script>
@endsection
