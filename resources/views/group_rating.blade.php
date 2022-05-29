@extends('layouts.app')

@section('title-block')
    студенти
@endsection

@section('content')
<div class="mt-5">
    <div action="" class="row mt-6 mb-5">
        <div class="col-4">
            <select class="faculties form-select" id="faculties" name="faculty" aria-label="Default select example">
                <option value="0" selected>Факультет</option>
                    @foreach($faculties as $faculty)
                        <option class="faculty" value="{{$faculty->id}}" data-faculty="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="col-4">
            <select class="groups form-select" id="groups" name="group" aria-label="Default select example">
                <option value="0" selected>Група</option>
{{--                    @foreach($groups as $group)--}}
{{--                        <option class="group" data-group="{{$group->id}}">{{$group->tag}}</option>--}}
{{--                    @endforeach--}}
            </select>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-success">відобразити</button>
        </div>
    </div>
    <div class="table" id="table">

    </div>
</div>

    <script>
        $(document).ready(function (){
            $('.faculty').click(function (){
                console.log('click!')
                let faculty_id = $(this).data('faculty')

                $.ajax({
                    url: "{{route('showGroups')}}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        faculty_id: faculty_id
                    },
                    success: (data) => {
                        let select = '<opt' +
                            'ion value="0" selected>Група</option>'
                        $.each(data, function(index, group) {
                            select += '<option class="group" value="'+ group.id + '" data-group="' + group.id + '">' + group.tag + '</option>'
                        });

                        $('.groups.form-select').html(select)
                    },
                })
            })

            $('.btn.btn-success').click(function (){
                let faculty_id = $('#faculties').val()
                let group_id = $('#groups').val()

                $.ajax({
                    url: "{{route('showGroupTable')}}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        faculty_id: faculty_id,
                        group_id: group_id,
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
