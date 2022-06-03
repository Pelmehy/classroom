@extends('layouts.app')

@section('title-block')
    Дошка оголошень
@endsection

@section('content')
    <div class="row">
        @if($access > 2)
            @include('inc.add_post')
        @else
            @include('inc.calendar')
        @endif

        <div class="col-md-7 col-lg-8">
            <div class="board">
                @foreach($posts as $post)
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="post col-auto d-none d-lg-block rounded">
                            <img src="{{asset('storage').$post->img}}" alt="">
{{--                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}

                        </div>
                        <div class="col p-4 d-flex flex-column position-static rounded">
                            <h3 class="mb-0">{{$post->name}}</h3>
                            <div class="mb-1 text-muted">{{$post->created_at}}</div>
                            <p class="card-text mb-auto">{{$post->description}}</p>

                            @if($access == 3)
                                <form action="{{route('deletePost', $post->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Видалити</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if($access == 1)
            <script>
                $(document).ready(function (){
                    let date = new Date();

                    date = renderCalendar(date); //згенерувати календарь
                    getDates(date);

                    let span = $('.span').parent();

                    $('#calendar__month').change(function (span){
                        date.setMonth($(this).val())
                        console.log(date)
                        renderCalendar(date)
                        getDates(date)
                    })

                    function getDates(date){
                        let start_date = Date.parse(date.toString()) / 1000

                        let end_date = new Date(
                            date.getFullYear(),
                            date.getMonth() + 1,
                            2
                        )
                        end_date = Date.parse(end_date.toString()) / 1000;

                        // запит поточних завдань
                        $.ajax({
                            url: "{{route('allDates')}}",
                            type: "GET",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                start_date: start_date,
                                end_date: end_date,
                            },
                            success: (data) => {
                                //генерація кінцевих сроків завдань
                                $.each(data, function(index, end_date) {
                                    let el = $('#' + end_date.end_date)
                                    el.addClass('calendar__date--selected calendar__date--first-date calendar__date--last-date')
                                })
                            },
                        })

                        let span = $('.span').parent()

                        // завантажити елемент календаря, на який натиснув користувач
                        span.click(
                            function (){
                                console.log($(this).attr("class"))

                                // перевірити наявність завдань з дедлайном у цю дату
                                if($(this).attr("class") !== 'calendar__date')
                                {
                                    let end_date = $(this).attr('id')
                                    console.log(end_date)
                                    $.ajax({
                                        url: "{{route('getAllTasks')}}",
                                        type: "GET",
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data: {
                                            end_date: end_date,
                                        },
                                        success: (data) => {
                                            $('#end_tasks').html(data)
                                        },
                                    })
                                }
                                else{
                                    let out = `
                            <div class="schedule w-100 text-center">
                                <h4 class="">Немає завдань</h4>
                                <hr>
                            </div>`
                                    $('#end_tasks').html(out)
                                }
                            }
                        )
                    }
                })
            </script>
            @else
            <script>
                $(document).ready(function () {
                    let date = new Date();

                    date = renderCalendar(date); //згенерувати календарь

                    $('#calendar__month').change(function (span){
                        date.setMonth($(this).val())
                        console.log(date)
                        renderCalendar(date)
                    })
                })
            </script>
        @endif
@endsection
