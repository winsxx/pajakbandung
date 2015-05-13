<div id ="check"></div>
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript">

    $.ajax({
        type: 'get',
        url: 'http://e-gov-bandung.tk/dukcapil/api/public/check/authenticated',
        success: function(data) {
            console.log(data)
            if (data != 'false') {
                var url = "{{url()}}/land?id="+data;
                window.location.href = url;
            } else {
                var url = "{{url()}}/land";
                window.location.href = url
            }
        },
        error: function(data) {
            var url = "{{url()}}/land";
            window.location.href = url
        }
    });
</script>