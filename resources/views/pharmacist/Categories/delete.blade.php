<!-- Modal -->
<div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    حذف بيانات المجموعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pharmacist.Category.destroy', $category->id) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h5>هل انت متأكد من حذف بيانات  {{$category->name}}</h5>
                    <input type="hidden" value="1" name="page_id">
                    @if($category->image)
                        <input type="hidden" name="image" value="{{$category->image->path}}">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-danger">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>