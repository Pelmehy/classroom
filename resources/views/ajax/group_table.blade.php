<table class="table table-striped">
    <thead>
    <tr>
        <th>Факультет</th>
        <th>Група</th>
        <th>Курс</th>
        <th>Викладач</th>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{{$course->faculty}}</td>
            <td>{{$course->group}}</td>
            <td>
                <a href="{{route('currentCourse', $course->id)}}">{{$course->name}}
                </a>
            </td>
            <td>{{$course->teacher}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
