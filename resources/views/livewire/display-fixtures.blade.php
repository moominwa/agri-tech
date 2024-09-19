<div class="container mt-5">
    <h1 class="text-center header-title">ตารางการแข่งขันฟุตบอล</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ลำดับ</th>
                    <th>ทีมเจ้าบ้าน</th>
                    <th>ทีมเยือน</th>
                    <th>วันที่</th>
                    <th>เวลา</th>
                    <th>สนาม</th>
                    <th>ประเภทการแข่งขัน</th>
                    <th>รอบ</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fixtures as $index => $fixture)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $fixture->homeTeam->team_name }}</td>
                        <td>{{ $fixture->awayTeam->team_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($fixture->date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($fixture->time)->format('H:i') }}</td>
                        <td>{{ $fixture->venue }}</td>
                        <td>{{ $fixture->competition_type }}</td>
                        <td>{{ $fixture->round }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">ไม่พบข้อมูลการแข่งขัน</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
