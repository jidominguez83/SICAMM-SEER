@if (session('success'))
    <div class="alert alert-success" role="alert">
        <i class="bi bi-check2"></i>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-x"></i>
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        <i class="bi bi-exclamation"></i>
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info" role="alert">
        <i class="bi bi-info"></i>
        {{ session('info') }}
    </div>
@endif