<!DOCTYPE html>
<html lang="en">

<head>

    @include ('...templates.clean-blog.partials.meta')
    @include ('...templates.clean-blog.partials.assets')

</head>

<body>

    @include ('...templates.clean-blog.partials.nav')

    @include ('...templates.clean-blog.partials.header')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @yield ('content')
            </div>
        </div>
    </div>

    <hr>
    @include ('...templates.clean-blog.partials.footer')

    @include ('...templates.clean-blog.partials.assets-footer')

</body>

</html>