
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    @if (session()->has('add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة البيانات بنجاح",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تحديث البيانات بنجاح",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف البيانات بنجاح",
                    type: "success"
                });
            }

        </script>
    @endif
    @if (session()->has('register'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تسجيل طلبك بنجاح راجع صندوق بريدك",
                type: "success"
            });
        }

    </script>
@endif
@if (session()->has('welcome'))
<script>
    window.onload = function() {
        notif({
            msg: "اهلا بعودتك",
            type: "success"
        });
    }

</script>
@endif