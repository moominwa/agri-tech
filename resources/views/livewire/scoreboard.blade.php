<div class="container mt-5">
    <h1 class="text-center mb-4">ตารางคะแนนการแข่งขัน</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th>อันดับ</th>
                    <th>ทีม</th>
                    <th>แข่ง</th>
                    <th>ชนะ</th>
                    <th>เสมอ</th>
                    <th>แพ้</th>
                    <th>ประตูได้</th>
                    <th>ประตูเสีย</th>
                    <th>ผลต่าง</th>
                    <th>คะแนน</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $index => $team)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->played }}</td>
                        <td>{{ $team->won }}</td>
                        <td>{{ $team->draw }}</td>
                        <td>{{ $team->lost }}</td>
                        <td>{{ $team->goals_for }}</td>
                        <td>{{ $team->goals_against }}</td>
                        <td>{{ $team->goal_difference }}</td>
                        <td>{{ $team->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
