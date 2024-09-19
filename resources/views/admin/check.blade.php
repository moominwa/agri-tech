<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Approval</title>
</head>
<body>
    <h1>Team Approval</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Team Name</th>
                <th>Department</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $team->team_name }}</td>
                    <td>{{ $team->department }}</td>
                    <td>{{ $team->type }}</td>
                    <td>
                        <form action="{{ route('admin.approve', $team->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Approve</button>
                        </form>
                        <form action="{{ route('admin.reject', $team->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
