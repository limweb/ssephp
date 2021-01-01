<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script>

if (!!window.EventSource) {
    var source = new EventSource('event.php');
    source.addEventListener('message', function(e) {
        console.log('--------event:message');
        console.log(e.data);
    }, false);

    source.addEventListener('userlogon', function(e) {
        console.log('--------event:userlogon');
        console.log(e.data);
    }, false);

    source.addEventListener('update', function(e) {
        console.log('--------event:update');
        console.log(e.data);
    }, false);
} else {
    console.log('----sse not support----');
}

</script>
</body>
</html>