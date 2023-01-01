<div>
    @if ($message = Session::get('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium">{{$message}}</span> 
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
            <span class="font-medium">{{$message}}</span> 
        </div>
    @endif
</div>
