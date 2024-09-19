<div class="container mt-5">
    <h1 class="text-center mb-4">จัดการแบ่งกลุ่มฟุตบอล</h1>

    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อทีม</th>
                        <th scope="col">กลุ่ม</th>
                        {{--  <th scope="col">การดำเนินการ</th>  --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $index => $team)
                    <tr id="row{{ $team->id }}">
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>ทีม {{ $team->team_name }}</td>
                        <td class="group-cell text-center">
                            <!-- แสดงชื่อกลุ่มหรือรอดำเนินการ -->
                            {{--  <span class="text-content">{{ $group[$team->id] == 'รอดำเนินการ' ? 'รอดำเนินการ' : $group[$team->id] }}</span>  --}}
                            <select class="form-select" wire:model="group.{{ $team->id }}" name="group">
                                <option value="A" {{ $group[$team->id] == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $group[$team->id] == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $group[$team->id] == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $group[$team->id] == 'D' ? 'selected' : '' }}>D</option>
                                <option value="E" {{ $group[$team->id] == 'E' ? 'selected' : '' }}>E</option>
                                <option value="F" {{ $group[$team->id] == 'F' ? 'selected' : '' }}>F</option>
                                <option value="G" {{ $group[$team->id] == 'G' ? 'selected' : '' }}>G</option>
                                <option value="H" {{ $group[$team->id] == 'H' ? 'selected' : '' }}>H</option>
                                <option value="รอดำเนินการ" {{ $group[$team->id] == 'รอดำเนินการ' ? 'selected' : '' }}>รอดำเนินการ</option>
                            </select>
                        </td>
                        {{--  <td class="text-center">
                            <button type="button" class="btn btn-warning" onclick="toggleEditMode('row{{ $team->id }}')">แก้ไข</button>
                            <button type="button" class="btn btn-success" onclick="saveGroup('row{{ $team->id }}')">บันทึก</button>
                        </td>  --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">บันทึกการแบ่งกลุ่ม</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
