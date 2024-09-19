<div class="container">
    <h3 class="text-center py-2">จัดการอนุมัติทีม</h3>

    <div class="table-wrapper">
        <table class="table table-striped table-hover score-table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อทีม</th>
                    <th>สาขา</th>
                    <th>ประเภท</th>
                    <th>วันที่สมัคร</th>
                    <th>เวลาที่สมัคร</th>
                    <th>ตรวจสอบ</th>
                    <th>สถานะ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->department }}</td>
                        <td>{{ $team->type }}</td>
                        <td>{{ $team->created_at->format('d-m-Y') }}</td>
                        <td>{{ $team->created_at->format('H:i:s') }}</td>
                        <td>
                            <button class="btn btn-info" wire:click="checkPlayer({{ $team->id }})">ตรวจสอบ</button>
                        </td>
                        <td>
                            @php
                            $status_th = [
                                'pending' => 'รออนุมัติ',
                                'approved' => 'อนุมัติแล้ว',
                                'rejected' => 'ถูกปฏิเสธ'
                            ];
                            @endphp
                            {{ $status_th[$team->status] }}
                        </td>
                        <td>
                            @if ($editingTeamId === $team->id)
                                <!-- แสดงปุ่มอนุมัติและไม่อนุมัติเมื่ออยู่ในโหมดแก้ไข -->
                                <button class="btn btn-success" wire:click="approve({{ $team->id }})">อนุมัติ</button>
                                <button class="btn btn-danger" wire:click="reject({{ $team->id }})">ไม่อนุมัติ</button>
                                <button class="btn btn-secondary" wire:click="stopEdit">ยกเลิก</button>
                            @elseif ($team->status === 'pending')
                                <!-- แสดงปุ่มอนุมัติและไม่อนุมัติเมื่อสถานะเป็น pending -->
                                <button class="btn btn-success" wire:click="approve({{ $team->id }})">อนุมัติ</button>
                                <button class="btn btn-danger" wire:click="reject({{ $team->id }})">ไม่อนุมัติ</button>
                            @else
                                <!-- แสดงปุ่มแก้ไขเมื่อสถานะเป็น approved หรือ rejected -->
                                <button class="btn btn-warning" wire:click="startEdit({{ $team->id }})">แก้ไข</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
