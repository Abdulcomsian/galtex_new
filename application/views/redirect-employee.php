<!DOCTYPE html>
<html>
<head>
    <title>Redirect to New Tab</title>
</head>
<body>
    <script type="text/javascript">
        var url = "<?php echo $redirect_uri; ?>";
        // Open the URL in a new tab
        window.open(url, '_blank');
    </script>
</body>
</html>
