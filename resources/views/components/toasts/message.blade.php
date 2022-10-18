<div id="toast" class="toasts-top-right fixed">
    @if($message = session()->get('danger'))
        <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><strong class="mr-auto">Danger</strong>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"
                onclick="document.querySelector('#toast').remove()"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">{{ $message }}</div>
        </div>
    @endif
    @if($message = session()->get('warning'))
        <div class="toast bg-info fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><strong class="mr-auto">Warning</strong>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"
                        onclick="document.querySelector('#toast').remove()"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">{{ $message }}</div>
        </div>
    @endif
    @if($message = session()->get('success'))
        <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><strong class="mr-auto">Success</strong>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"
                        onclick="document.querySelector('#toast').remove()"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">{{ $message }}</div>
        </div>
    @endif
</div>
