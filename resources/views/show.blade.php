@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="card card-body">
                    <div class="d-flex justify-content-around">
                        <div class="">
                            <span>عنوان الوظيفة : {{$job->name}}</span>
                        </div>

                        <div class="">
                            <span>المدينة : {{$job->city}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="bg-gray-400 leading-6 info">
                    {!! $job->info !!}
                </div>
            </div>
        </div>
    </div>
    <livewire:present-component :job="$job"/>

@endsection
