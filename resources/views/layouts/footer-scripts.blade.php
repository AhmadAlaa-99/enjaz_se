



<script src="{{ URL::asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>

@yield('js')
<script src="{{ URL::asset('assets/js/feather.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/script.js') }}"></script>

<script type="text/javascript">
    var clockElement = document.getElementById('clock');

    function clock() {
        var date = new Date();

        // Replace '400px' below with where you want the format to change.
        if (window.matchMedia('(max-width: 400px)').matches) {
            // Use this format for windows with a width up to the value above.
            clockElement.textContent = date.toLocaleString();
        } else {
            // While this format will be used for larger windows.
            clockElement.textContent = date.toString();
        }
    }

    setInterval(clock, 1000);
</script>









