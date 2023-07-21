
    @if (session()->has('success'))
        <div x-data="{show:true}" x-init="setTimeout(()=> show = false,3000)" x-show="show"  class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-light px-48 py-3">
            {!! Session::get('success') !!}        </div>
    @endif
    @if (session()->has('danger'))
    <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-light px-48 py-3">
        {!! Session::get('danger') !!}        </div>
    @endif

