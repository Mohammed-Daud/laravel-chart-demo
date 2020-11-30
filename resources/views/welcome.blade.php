@extends('layout.app')

@section('content')



    
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">

            <h1>Today's Calorie intake</h1>

            
            @if (session('message'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('message') }}
            </div>
            @endif
            
            
            <form action="{{ route('calorie.save') }}" method="POST" role="form">

                @csrf

                <div class="form-group {{ ($errors->has('daily_target'))?'has-error':'' }}">
                    <label for="">Daily target</label>
                    <input type="text" class="form-control" readonly name="daily_target" value="2500">
                    @if($errors->has('daily_target'))
                    <span class="text-danger">{{ $errors->first('daily_target') }}</span>
                    @endif
                </div>
                
            
                <div class="form-group {{ ($errors->has('date'))?'has-error':'' }}">
                    <label for="">Date(yyyy-mm-dd)</label>
                    <input type="text" class="form-control datepicker" name="date" value="{{old('date')}}">
                    @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                    @endif
                </div>

                <div class="form-group {{ ($errors->has('breakfast'))?'has-error':'' }}">
                    <label for="">Breakfast</label>
                    <input type="text" class="form-control" name="breakfast" value="{{old('breakfast')}}">
                    @if($errors->has('breakfast'))
                    <span class="text-danger">{{ $errors->first('breakfast') }}</span>
                    @endif
                </div>

                <div class="form-group {{ ($errors->has('lunch'))?'has-error':'' }}">
                    <label for="">Lunch</label>
                    <input type="text" class="form-control" name="lunch" value="{{old('lunch')}}">
                    @if($errors->has('lunch'))
                    <span class="text-danger">{{ $errors->first('lunch') }}</span>
                    @endif
                </div>

                <div class="form-group {{ ($errors->has('dinner'))?'has-error':'' }}">
                    <label for="">Dinner</label>
                    <input type="text" class="form-control" name="dinner" value="{{old('dinner')}}">
                    @if($errors->has('dinner'))
                    <span class="text-danger">{{ $errors->first('dinner') }}</span>
                    @endif
                </div>
            
                
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
    



@endsection