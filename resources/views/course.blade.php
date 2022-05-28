@extends('layouts.app')

@section('title-block')
    Курс
@endsection

@section('content')

    <div class="row g-5">
        @if($access >= 2)
                @include('inc.add_task')
        @else
            @include('inc.calendar')
        @endif
        <div class="col-md-7 col-lg-8">
            @foreach($tasks as $task)
                <a href="{{route('task', [$course_id, $task->id])}}">
                    <div class="tasks d-flex text-muted pt-3">
                        <div class="ico flex-shrink-0 me-2">
                            @if($task->type == 0)
                                <img src="{{asset('storage')}}./default/text.ico" alt="">
                            @else
                                <img src="{{asset('storage')}}./default/file.ico" alt="">
                            @endif
                        </div>
                        <p class="pb-3 mb-0 small">
                            {{$task->name}}
                        </p>
                    </div>
                </a>
            @endforeach

            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>
            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>

        </div>
    </div>

    @if($access == 1)
        <script>
            $(document).ready(function (){
                var date = renderCalendar();
                getDates(date);

                function getDates(date){
                    let start_date = Date.parse(date.toString()) / 1000

                    let end_date = new Date(
                        date.getFullYear(),
                        date.getMonth() + 1,
                        2
                    )
                    end_date = Date.parse(end_date.toString()) / 1000;

                    $.ajax({
                        url: "{{route('dates')}}",
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            start_date: start_date,
                            end_date: end_date,
                            course_id: {{$course_id}}
                        },
                        success: (data) => {
                            $.each(data, function(index, end_date) {
                                let el = $('#' + end_date.end_date)
                                el.addClass('calendar__date--selected calendar__date--first-date calendar__date--last-date')
                            });
                        },
                    })
                }

                $('.span').parent().click(
                    function (){
                        console.log($(this).attr("class"))

                        if($(this).attr("class") ===
                            'calendar__date calendar__date--selected calendar__date--first-date calendar__date--last-date')
                        {
                            let end_date = $(this).attr('id')
                            console.log(end_date)
                            $.ajax({
                                url: "{{route('getTasksForCourse')}}",
                                type: "GET",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    end_date: end_date,
                                    course_id: {{$course_id}}
                                },
                                success: (data) => {
                                    $('#end_tasks').html(data)
                                },
                            })
                        }
                    }
                )
            })
        </script>
    @endif
@endsection
