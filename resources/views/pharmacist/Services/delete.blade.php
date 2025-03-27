<!-- Modal -->
<div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    حذف بيانات الخدمة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pharmacist.Service.destroy', $service->id) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h5>هل انت متأكد من حذف بيانات  {{$service->name}}</h5>
                    <input type="hidden" value="1" name="page_id">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-danger">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>