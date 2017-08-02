<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Geocoding Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getPosition, positionError, {timeout: 10000});
            } else {
                //Geolocation is not supported by this browser
            }
        }

        // handle the error here
        function positionError(error) {
            var errorCode = error.code;
            var message = error.message;

            alert(message);
        }
        // Success Callback
        function getPosition(position) {
            var url = 'geocoordinates.php';
            var form = $('<form action="' + url + '" method="post">' +
                '<input type="hidden" name="lat" value="'+position.coords.latitude+'" />' +
                '<input type="hidden" name="lng" value="'+position.coords.longitude+'" />' +
                '</form>');
            $('body').append(form);
            form.submit();
        }
    </script>
</head>
<body>

<button onclick="getLocation();">Get My Location</button>

</body>
</html>