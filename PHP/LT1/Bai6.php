<!DOCTYPE html>
<html>
<head>
    <title>Bài 6</title>
    <style>
        .multtable{
            display: inline-block;
            border-radius: 10px;;
            border: 2px solid;
            min-width: 115px;
            padding-bottom: 1em;
            padding-top: 1em;
            margin-left: 10px;
        }
        .multtable p{
            margin-left: 20%;
            margin-top: 0.25em;
            margin-bottom: 0.25px;
        }
    </style>
</head>
<body>
    <h1>Bảng cửu chương</h1>

    <?php
        $x = 2;
        for($x=2; $x<11; $x++)
        {
            echo "<div class='multtable'>";
            for($i=1; $i<11; $i+=1)
                echo "<p>".$x."x".$i."=".$x*$i;
            echo "</div>";
        }
    ?>
</body>
</html> 