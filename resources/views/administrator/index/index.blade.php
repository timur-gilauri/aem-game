@extends('administrator.layouts.main', ['title' => 'Панель администратора])

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        @widget('IndexWidgetProducts', ['flag'=>'all'])
                    </div>
                    @if(env('APP', false) == 'domotekhnika')
                        <div class="col-md-4">
                            @widget('IndexWidgetBadPricesCount', ['flag'=>'all'])
                        </div>
                    @endif
                </div>

                <div class="row mr_top" style="display: none;">
                    <div class="col-md-12">
                        <div class="box">123</div>
                    </div>
                </div>

            </div>

            <div class="col-md-3" style="display: none;">

            </div>
        </div>
    </div>


@endsection