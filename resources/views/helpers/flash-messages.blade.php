@if (session('status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               
                {{ session('status') }}
                 <button class="close" data-bs-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
            </div>
        </div>
    </div>
@endif