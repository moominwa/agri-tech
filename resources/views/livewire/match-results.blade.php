
    <div class="container mt-5">
        <h1 class="text-center">จัดการผลการแข่งขันฟุตบอล</h1>

        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="saveResults">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>คู่ที่</th>
                            <th>ทีมเหย้า</th>
                            <th>ประตูทีมเหย้า</th>
                            <th>ผลการแข่งขัน</th>
                            <th>ประตูทีมเยือน</th>
                            <th>ทีมเยือน</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>รอบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fixtures as $fixture)
                        <tr>
   
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $fixture->hometeam->team_name }} </td>
                            <td>
                                <input type="number" class="form-control" wire:model="results.{{ $fixture->id }}.home_team_goals">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="{{ $results[$fixture->id]['result'] ?? '' }}" disabled>
                            </td>
                            <td>
                                <input type="number" class="form-control" wire:model="results.{{ $fixture->id }}.away_team_goals">
                            </td>
                            <td>{{ $fixture->awayTeam->team_name }}</td>
                            <td>{{ $fixture->date }}</td>
                            <td>{{ $fixture->time }}</td>
                            <td>{{ $fixture->round }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">บันทึกผลการแข่งขัน</button>
            </div>
        </form>
    </div>