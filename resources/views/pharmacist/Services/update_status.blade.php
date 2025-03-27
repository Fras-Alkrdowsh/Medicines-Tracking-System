<!-- Modal -->
<div class="modal fade" id="update_status{{ $service->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    تعديل حالة الخدمة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pharmacist.update_status') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status">حالة الخدمة</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--اختر الحالة--</option>
                            <option value="enable">مفعل</option>
                            <option value="disable">غير مفعل</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="{{ $service->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>