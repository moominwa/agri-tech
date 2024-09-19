
    <div class="container mt-5">
        <h1 class="text-center">จัดการตารางแข่งขัน</h1>

        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="saveFixture">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ทีมเจ้าบ้าน</th>
                            <th scope="col">ทีมเยือน</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เวลา</th>
                            <th scope="col">สนาม</th>
                            <th scope="col">ประเภทการแข่งขัน</th>
                            <th scope="col">รอบ</th>
                            <th scope="col">การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fixtures as $index => $fixture)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <select wire:model="fixtures.{{ $index }}.home_team_id" class="form-control">
                                        <option value="">เลือกทีมเจ้าบ้าน</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select wire:model="fixtures.{{ $index }}.away_team_id" class="form-control">
                                        <option value="">เลือกทีมเยือน</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="date" wire:model="fixtures.{{ $index }}.date" class="form-control">
                                </td>
                                <td>
                                    <input type="time" wire:model="fixtures.{{ $index }}.time" class="form-control">
                                </td>
                                <td>
                                    <input type="text" wire:model="fixtures.{{ $index }}.venue" class="form-control">
                                </td>
                                <td>
                                    <select wire:model="fixtures.{{ $index }}.competition_type" class="form-control">
                                        <option value="">เลือกประเภทการแข่งขัน</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </td>
                                <td>
                                    <select wire:model="fixtures.{{ $index }}.round" class="form-control">
                                        <option value="">เลือกรอบการแข่งขัน</option>
                                        <option value="แบ่งกลุ่ม">แบ่งกลุ่ม</option>
                                        <option value="รอบ 16 ทีม">รอบ 16 ทีม</option>
                                        <option value="รอบรองชนะเลิศ">รอบรองชนะเลิศ</option>
                                        <option value="รอบชิงชนะเลิศ">รอบชิงชนะเลิศ</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger" wire:click="deleteFixture({{ $index }})">ลบ</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn btn-success" wire:click="addFixture">เพิ่มแถว</button>
                <button type="submit" class="btn btn-primary">บันทึกตารางแข่งขัน</button>
            </div>
        </form>
    </div>

   