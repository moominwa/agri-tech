<div class="container mt-5">
    <h1 class="text-center mb-4">ผลการแข่งขันฟุตบอล</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>คู่ที่</th>
                    <th>ทีมเหย้า</th>
                    <th>ประตูทีมเหย้า</th>
                    <th>ทีมเยือน</th>
                    <th>ประตูทีมเยือน</th>
                    <th>ผลการแข่งขัน</th>
                    <th>วันที่</th>
                    <th>เวลา</th>
                    <th>รอบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $index => $result)
              
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->fixture->homeTeam->team_name }}</td>
                        <td>{{ $result->home_team_goals }}</td>
                        <td>{{ $result->fixture->awayTeam->team_name }}</td>
                        <td>{{ $result->away_team_goals }}</td>
                        <td>
                            <span class="badge 
                                {{ $result->result == 'ชนะ' ? 'bg-success' : ($result->result == 'แพ้' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ $result->result }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($result->fixture->date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($result->fixture->time)->format('H:i') }}</td>
                        <td>{{ $result->fixture->round }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
