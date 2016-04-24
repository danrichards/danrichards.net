        @if (isset($notices) and $notices->has())
            @foreach ($notices->all() as $notice)
                <div class="alert alert-success" role="alert">{{ $notice }}</div>
            @endforeach
        @endif

        @if (isset($errors) and $errors->has())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning" role="alert">{{ $error }}</div>
            @endforeach
        @endif