@extends('layouts.app')

@section('title-block')
    студенти
@endsection

@section('content')
    <div class="mt-5">
        <div action="" class="row mt-6 mb-5">
            <div class="col-4">
                <label class="col-sm-2 col-form-label">Студент:</label>
            </div>
            <div class="col-4">
                <select class="students form-select" id="students" name="students" aria-label="Default select example">
                    <option value="0" selected>Студенти</option>
                    @foreach($students as $student)
                        <option class="student" value="{{$student->user_id}}" data-faculty="{{$student->user_id}}">{{$student->fullName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="table" id="table">

        </div>
    </div>

    <script>
        $(document).ready(function (){
            $('.student').click(function (){
                console.log('click!')
                let student_id = $('#students').val()

                $.ajax({
                    url: "{{route('showTaskTable')}}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        student_id: student_id,
                        course_id: {{$course_id}},
                    },
                    success: (data) => {
                        console.log(data)
                        $('#table').html(data)
                    },
                })
            })
        })
    </script>
@endsection
