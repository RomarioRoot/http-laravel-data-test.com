<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Filter Data Test</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">

    <style>
        body {
            padding: 50px;
            background: #fff;
        }

        .panel-heading {
            padding: 0;
            border: 0;
        }

        .panel-heading .custom-switch {
            padding-left: 48px;
        }

        .panel-heading .custom-switch label {
            font-size: 16px;
        }

        .panel-title > a, .panel-title > a:active {
            display: block;
            font-size: 16px;

            text-decoration: none;
        }

        .panel-heading a:before {
            font-family: 'FontAwesome';
            content: "\f107";
            float: right;
            transition: all 0.5s;
        }

        .panel-heading.active a:before {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .card-body.card-body-light-padding {
            padding: 0.25rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="/users">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading active" role="tab" id="active-heading">
                            <h4 class="panel-title card-header">
                                <a class="text-secondary" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#active-collapse"
                                   aria-expanded="true" aria-controls="active-collapse">Active</a>
                            </h4>
                        </div>
                        <div id="active-collapse" class="panel-collapse collapse in show" role="tabpanel"
                             aria-labelledby="active-heading">
                            <div class="panel-body">
                                <article class="card-group-item">
                                    <div class="filter-content">
                                        <div class="card-body card-body-light-padding">
                                            <div class="panel panel-default">
                                                <div class="btn-group nav nav-pills nav-justified"
                                                     data-toggle="buttons">
                                                    <label class="btn btn-success">
                                                        <input type="radio" name="active" id="On" value="on"
                                                               class="invisible"/>ON</label>
                                                    <label class="btn btn-secondary">
                                                        <input type="radio" name="active" id="NA" value=""
                                                               class="invisible"/>N/A</label>
                                                    <label class="btn btn-danger">
                                                        <input type="radio" name="active" id="Off" value="off"
                                                               class="invisible"/>OFF</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading active" role="tab" id="gender-heading">
                            <h4 class="panel-title card-header">
                                <a class="text-secondary" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#gender-collapse"
                                   aria-expanded="true" aria-controls="gender-collapse">Gender</a>
                            </h4>
                        </div>
                        <div id="gender-collapse" class="panel-collapse collapse in show" role="tabpanel"
                             aria-labelledby="gender-heading">
                            <div class="panel-body">
                                <article class="card-group-item">
                                    <div class="filter-content">
                                        <div class="card-body">
                                            @foreach($genders as $gender)
                                                <div class="custom-control custom-radio">
                                                <span
                                                    class="float-right badge badge-secondary round">{{ $gender->users_count }}</span>
                                                    <input class="custom-control-input" type="radio" name="gender"
                                                           value="{{$gender->id}}" id="gender-{{$gender->id}}">
                                                    <label class="custom-control-label"
                                                           for="gender-{{$gender->id}}">{{ $gender->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading active" role="tab" id="age-heading">
                            <h4 class="panel-title card-header">
                                <a class="text-secondary" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#age-collapse"
                                   aria-expanded="true" aria-controls="age-collapse">Age</a>
                            </h4>
                        </div>
                        <div id="age-collapse" class="panel-collapse collapse in show" role="tabpanel"
                             aria-labelledby="age-heading">
                            <div class="panel-body">
                                <article class="card-group-item">
                                    <div class="filter-content">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <input id="slider-age" class="slider" type="text"
                                                       data-slider-min="{{ $ages['min'] }}"
                                                       data-slider-max="{{ $ages['max'] }}" data-slider-step="1"
                                                       data-slider-value="[{{ $ages['min'] }}, {{ $ages['max'] }}]"/>
                                                <div class="col-md-6 min">
                                                    <label>{{ $ages['min'] }}</label>
                                                </div>
                                                <div class=" col-md-6 text-right max">
                                                    <label>{{ $ages['max'] }}</label>
                                                </div>
                                                <input type="hidden" name="age" value="">
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="height-heading">
                            <h4 class="panel-title card-header">
                                <a class="text-secondary" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#height-collapse"
                                   aria-expanded="true" aria-controls="height-collapse">Height</a>
                            </h4>
                        </div>
                        <div id="height-collapse" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="height-heading">
                            <div class="panel-body">
                                <article class="card-group-item">
                                    <div class="filter-content">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <input id="slider-height" class="slider" type="text"
                                                       data-slider-min="{{ $heights['min'] }}"
                                                       data-slider-max="{{ $heights['max'] }}" data-slider-step="1"
                                                       data-slider-value="[{{ $heights['min'] }}, {{ $heights['max'] }}]"/>
                                                <div class="col-md-6 min">
                                                    <label>{{ $heights['min'] }}</label>
                                                </div>
                                                <div class=" col-md-6 text-right max">
                                                    <label>{{ $heights['max'] }}</label>
                                                </div>
                                                <input type="hidden" name="height" value="">
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="country-heading">
                            <h4 class="panel-title card-header">
                                <a class="text-secondary" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#country-collapse"
                                   aria-expanded="true" aria-controls="country-collapse">Country</a>
                            </h4>
                        </div>
                        <div id="country-collapse" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="country-heading">
                            <div class="panel-body">
                                <article class="card-group-item">
                                    <div class="filter-content">
                                        <div class="card-body">
                                            @foreach($countries as $country)
                                                <div class="custom-control custom-checkbox">
                                                    <span
                                                        class="float-right badge badge-secondary round">{{ $country->users_count }}</span>
                                                    <input name="country[]" type="checkbox" value="{{$country->id}}"
                                                           class="custom-control-input" id="country-{{$country->id}}">
                                                    <label class="custom-control-label"
                                                           for="country-{{$country->id}}">{{ $country->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading active" role="tab" id="color-heading">
                            <h4 class="panel-title card-header">
                                <a class="text-secondary" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#color-collapse"
                                   aria-expanded="true" aria-controls="color-collapse">Hair Color</a>
                            </h4>
                        </div>
                        <div id="color-collapse" class="panel-collapse collapse  in show" role="tabpanel"
                             aria-labelledby="color-heading">
                            <div class="panel-body">
                                <article class="card-group-item">
                                    <div class="filter-content">
                                        <div class="card-body">
                                            @foreach($colors as $color)
                                                <div class="custom-control custom-checkbox">
                                                    <span
                                                        class="float-right badge badge-{{$color->css_class}} round">{{ $color->users_count }}</span>
                                                    <input name="color[]" value="{{$color->id}}" type="checkbox"
                                                           class="custom-control-input" id="color-{{$color->id}}">
                                                    <label class="custom-control-label text-{{ $color->css_class }}"
                                                           for="color-{{$color->id}}">{{ $color->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-danger btn-block" href="/users" role="button">Clear</a>
            </form>

        </div>
        <div class="col-md-9 user-list">
        @include('users.users')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>

<script>
    var filter_timer;

    function getUsers(){
        $form = $('form');
        var formData = $form.serializeArray();
        $.ajax({
            type: 'GET',
            url: $form.attr("action"),
            data: formData,
            encode: true,
            cache: false
        }).done(function(data) {
            $('.user-list').html(data);
        });
    }

    $(document).ready(function () {

        $('form input').change(function () {
            clearTimeout(filter_timer);
            filter_timer = setTimeout(function(){ getUsers(); }, 300);
        });

        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            $.ajax({
                type: 'GET',
                url: $(this).attr('href'),
                encode: true,
                cache: false
            }).done(function(data) {
                $('.user-list').html(data);
            });
        });

    });

    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
        $(this).siblings('.panel-heading').removeClass('active');
    });

    var slideOn = function ($slider, value) {
        $slider.parent().find('.min').find('label').text(value[0]);
        $slider.parent().find('.max').find('label').text(value[1]);
        $slider.parent().find('input').val(value);
    };

    $(".slider").slider();
    $(".slider").on("slide", function (slideEvt) {
        slideOn($(this), slideEvt.value);
    });

</script>
</body>
</html>
