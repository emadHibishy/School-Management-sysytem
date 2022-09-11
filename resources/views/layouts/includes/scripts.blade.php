<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- plugins-jquery -->
<script src="{{ asset('assets/js/plugins-jquery.js') }}"></script>

<!-- plugin_path -->
<script>var plugin_path = "{{ asset('assets/js') }}/";</script>

<!-- chart -->
<script src="{{ asset('assets/js/chart-init.js') }}"></script>

<!-- calendar -->
<script src="{{ asset('assets/js/calendar.init.js') }}"></script>

<!-- charts sparkline -->
<script src="{{ asset('assets/js/sparkline.init.js') }}"></script>

<!-- charts morris -->
<script src="{{ asset('assets/js/morris.init.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('assets/js/datepicker.js') }}"></script>

<!-- sweetalert2 -->
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<!-- toastr -->
<script src="{{ asset('assets/js/toastr.js') }}"></script>

<!-- validation -->
<script src="{{ asset('assets/js/validation.js') }}"></script>

<!-- lobilist -->
<script src="{{ asset('assets/js/lobilist.js') }}"></script>

<!-- custom -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    function CheckAll(className, elm){
        let elements = document.getElementsByClassName(className);

        if(elm.checked) {
            for(let element of elements){
                element.checked = true;
            }
        } else{
            for(let element of elements){
                element.checked = false;
            }
        }
    }
</script>
@yield('scripts')
