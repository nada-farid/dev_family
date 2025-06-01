@extends('layouts.volunteer')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($total) }}</div>
                                    <div>أجمالي المهام</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($done) }}</div>
                                    <div>المهام المنتهية</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($hours) }}</div>
                                    <div>عدد الساعات </div>
                                    <br />
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 