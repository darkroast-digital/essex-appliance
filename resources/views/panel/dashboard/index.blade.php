@extends('panel.layouts.master')

@section('content')

    <div class="container">
        
        <div class="overview column-12">
            <div class="overview__container container container-full">
        
                <div class="column-4 block newUsersChart --has-margin-bottom" data-values="{{ $newUsersArray }}" data-labels="{{ $weekdayLabels }}">
                    <h6>New Users</h6>
                    
                    <canvas id="newUsersChart"></canvas>
                </div>
        
                <div class="column-4 block center --has-margin-bottom">
                    <h3 class="count">{{ $currentUsers }}</h3>
                    <h4>Today's Users</h4>
                </div>
        
                <div class="column-4 block center --has-margin-bottom">
                    <h3 class="count">{{ $users }}</h3>
                    <h4>Total Users</h4>
                </div>
        
                <div class="column-4 block sessionsChart --has-margin-bottom" data-values="{{ $sessionsChartArray }}" data-labels="{{ $weekdayLabels }}">
                    <h6>Sessions</h6>
        
                    <canvas id="sessionsChart"></canvas>
                </div>
        
                <div class="column-4 block center --has-margin-bottom">
                    <h3 class="count">{{ $pageviews }}</h3>
                    <h4>Page Views</h4>
                </div>
        
                <div class="column-4 block center --has-margin-bottom">
                    <h3 class="count">{{ number_format($bounceRate, 1) }}%</h3>
                    <h4>Bounce Rate</h4>
                </div>
        
            </div>
        </div>
    </div>

@endsection
