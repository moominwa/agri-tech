<!-- ส่วนของ Blade ที่แสดงรายละเอียดของทีมที่เลือก -->


@if ($selectedTeam)
    <div class="modal" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายละเอียดทีม: {{ $selectedTeam->team_name }}</h5>
                    <button type="button" class="close" wire:click="$set('selectedTeam', null)">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>สาขา: {{ $selectedTeam->department }}</p>
                    <p>ประเภท: {{ $selectedTeam->type }}</p>
                    <p>สถานะ: {{ $selectedTeam->status }}</p>
                    <!-- เพิ่มรายละเอียดอื่น ๆ ตามต้องการ -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('selectedTeam', null)">ปิด</button>
                </div>
           
