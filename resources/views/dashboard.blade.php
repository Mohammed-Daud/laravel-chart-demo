@extends('layout\app')

@section('content')


<div class="row">
    <div class="col-lg-6">

        <div class="row">
            <div class="col-lg-12">
                <h4>Daily Calorie Intake</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('dashboard') }}" role="form">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" class="form-control datepicker" name="date" placeholder="yyyy-mm-dd" value="{{ request()->date }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Get Data</button>
                    <a href="{{ url('csv') }}" class="btn btn-primary">Download CSV</a>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                {!! $chart->container() !!}
            </div>
        </div>

        
        
    </div>
</div>


@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    {!! $chart->script() !!}
    @endpush

