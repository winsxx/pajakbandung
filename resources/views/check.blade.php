<div id ="check"></div>
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript">

    $.ajax({
        type: 'get',
        url: 'http://e-gov-bandung.tk/dukcapil/api/public/check/authenticated',
        success: function(data) {
            console.log(data)
            if (data != 'false') { //redirect ke alamat login kalian
                var url = "{{url()}}/land?id="+data;
                window.location.href = url;
            } else {
                var url = "{{url()}}/login" //redirect ke home page kalian, tp kalian juga harus login sendiri juga
                window.location.href = url
            }
        },
        error: function(data) {
            alert(data);
        }
    });
</script>