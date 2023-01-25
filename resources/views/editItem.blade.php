<div class="col-md-8">
    <div class="card">np
        <div class="card-header">{{ __('Edit Item') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ sesfosion('status') }}
                    </div>
                @endif

                <form action="">
                    <input type="text" name="nama" id="nama">
                    <input type="button" class="btn btn-sm btn-success" name="simpan" value="simpan">
                    <input type="button" class="btn btn-sm btn-danger" value="batal">
                </form>
            </div>
        </div>
</div>