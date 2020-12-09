@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content" style="margin-bottom: 150px;">
                <div class="row">
                    <div class="col" style="margin-top: 200px; margin-right: 75px;">
                        <h1>
                            Inventory Management<br>
                        </h1>
                        <medium class="text-muted" style="margin-right: 100px;">Manage your stocks and profit digitally</medium>
                        <br>
                        <a button class="btn btn-primary" href="{{ route('login') }}" style="margin-top: 10px; margin-right: 275px; border-radius: 35px; transition-duration: 0.4s; width: 45%;"> Get Started </button> </a>
                    </div>
                    <div class="col"> 
                        <img src="/css/man.png" width="auto" height="500px" alt="" style="margin-top: 0px; margin-left: 130px;"> 
                    </div>
                </div>
             </div>
        </div>
@endsection
