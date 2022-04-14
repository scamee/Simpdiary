@error('username')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror

@error('birthday')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror

@error('hobby')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror

@error('dream')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror

@error('wanted')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror


@error('current_password')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror

@error('new_password')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
@enderror
