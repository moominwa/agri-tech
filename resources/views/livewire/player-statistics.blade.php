<div class="container mt-5">
    <h1 class="text-center">จัดการสถิติของผู้เล่น</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ทีมเจ้าบ้าน</th>
                <th>ทีมเยือน</th>
                <th>จัดการสถิติ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fixtures as $fixture)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fixture->homeTeam->team_name }}</td>
                    <td>{{ $fixture->awayTeam->team_name }}</td>
                    <td>
                        <button class="btn btn-primary" wire:click="managePlayerStats({{ $fixture->id }})">จัดการสถิติของผู้เล่น</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    @if($showModal)
    <div class="modal fade show d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">สถิติของผู้เล่นใน {{ $selectedFixture->homeTeam->team_name }} พบกับ {{ $selectedFixture->awayTeam->team_name }}</h5>
                    <button type="button" class="close" wire:click="$set('showModal', false)">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>ทีม: {{ $selectedFixture->homeTeam->team_name }}</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>รูปภาพ</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>หมายเลขผู้เล่น</th>
                                <th>ใบเหลือง</th>
                                <th>ใบแดง</th>
                                <th>จำนวนประตู</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players['home'] as $index => $player)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$player['player_image']) }}" alt="รูปภาพผู้เล่น" width="50" height="50" onerror="this.onerror=null; this.src='{{ asset('images/default_player.png') }}';">
                                    </td>
                                    <td>{{ $player['prefix'] }}</td>
                                    <td>{{ $player['name'] }}</td>
                                    <td>{{ $player['lastname'] }}</td>
                                    <td>{{ $player['jersey_number'] }}</td>
                                    <td><input type="number" wire:model.defer="players.home.{{ $index }}.yellow_cards" class="form-control"></td>
                                    <td><input type="number" wire:model.defer="players.home.{{ $index }}.red_cards" class="form-control"></td>
                                    <td><input type="number" wire:model.defer="players.home.{{ $index }}.goals" class="form-control"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <h6>ทีม: {{ $selectedFixture->awayTeam->team_name }}</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>รูปภาพ</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>หมายเลขผู้เล่น</th>
                                <th>ใบเหลือง</th>
                                <th>ใบแดง</th>
                                <th>จำนวนประตู</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players['away'] as $index => $player)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$player['player_image']) }}" alt="รูปภาพผู้เล่น" width="50" height="50" onerror="this.onerror=null; this.src='{{ asset('images/default_player.png') }}';">
                                    </td>
                                    <td>{{ $player['prefix'] }}</td>
                                    <td>{{ $player['name'] }}</td>
                                    <td>{{ $player['lastname'] }}</td>
                                    <td>{{ $player['jersey_number'] }}</td>
                                    <td><input type="number" wire:model.defer="players.away.{{ $index }}.yellow_cards" class="form-control"></td>
                                    <td><input type="number" wire:model.defer="players.away.{{ $index }}.red_cards" class="form-control"></td>
                                    <td><input type="number" wire:model.defer="players.away.{{ $index }}.goals" class="form-control"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('showModal', false)">ปิด</button>
                    <button type="button" class="btn btn-primary" wire:click="savePlayerStats">บันทึกสถิติ</button>
                </div>
            </div>
        </div>
    </div>
    @endif