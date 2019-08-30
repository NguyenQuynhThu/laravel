<!doctype html>
<html lang="en">

@include("head")

<body>
@include("aside")

<div id="right-panel" class="right-panel">
    @include("header")

    {{--    MAIN CONTENT--}}
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            @yield("main-content")
        </div>
        <!-- End Animated -->
    </div>
    {{--    END MAIN CONTTENT--}}

    <div class="clearfix"></div>
    @include("footer")
</div>

@include("scripts")

</body>

</html>
