<!DOCTYPE html>
<html>

<head>
    <title>View Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .pdf {
            width: 100vw;
            height: 100vh;
            border: none;
        }
    </style>
</head>

<body>
    <?php
        $pdf = isset($_GET['pdf']) ? $_GET['pdf'] : '';
    ?>
    <iframe class="pdf" src="../documents/<?php echo htmlspecialchars($pdf); ?>" ></iframe>
</body>

</html>
