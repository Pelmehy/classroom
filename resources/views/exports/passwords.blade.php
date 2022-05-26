<table>
    <thead>
        <tr>
            <th>ФІО</th>
            <th>email</th>
            <th>password</th>
        </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
