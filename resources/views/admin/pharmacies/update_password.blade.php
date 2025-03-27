<!-- Modal -->
<div class="modal fade" id="update_password{{ $pharmacy->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    تغيير كلمة مرور   {{$pharmacy->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.update_password') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>

                    <input type="hidden" name="id" value="{{ $pharmacy->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>