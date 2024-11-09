<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Points</title>
    <style>
        body{
            background-color: #19d9d1;
        }
        .container{
            width: 500px;
            height: 400px;
            overflow: hidden;
            position: relative;
            margin:50px auto;
        }

        .barcontainer{


            border-radius: 20px;
            background-image:
                linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
            transition: 0.4s linear;
            transition-property: width, background-color;
            /*background-color: #181818;*/
            position: relative;
            transform: translateY(-50%);
            top: 50%;
            margin-left: 50px;
            width: 50px;
            height: 320px;
            float: left;
        }

        .bar{
            background-color: #EF476F;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 80%;
        //border-top: 6px solid #FFF;
            box-sizing: border-box;
            animation: grow 6s ease-out forwards;
            transform-origin: bottom;
        }
        @keyframes grow{
            from{
                transform: scaleY(0);
            }
            0%   { background-color: #F9BCCA;}
            100% { background-color: #EF476F; }
        }



        /*.container {*/
        /*    margin: 100px 20px;*/
        /*    width: 300px;*/
        /*    text-align: center;*/
        /*    display: inline-block;*/
        /*}*/

        /*.progress {*/
        /*    height: 200px; !* Задаємо фіксовану висоту для прогресу *!*/
        /*    padding: 6px;*/
        /*    border-radius: 30px;*/
        /*    background: rgba(0, 0, 0, 0.25);*/
        /*    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);*/
        /*}*/

        /*.progress-bar {*/
        /*    width: 100%;*/
        /*    border-radius: 30px;*/
        /*    background-image:*/
        /*        linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));*/
        /*    transition: 0.4s linear;*/
        /*    transition-property: width, background-color;*/
        /*}*/

        .progress-moved .progress-bar {
            /*width: 85%;*/
            height: 0; /* Задаємо початкову висоту 0 */
            background-color: #EF476F;
            animation: progressAnimation 6s;
        }

        @keyframes progressAnimation {
            0%   { height: 5%; background-color: #F9BCCA;}
            100% { height: 85%; background-color: #EF476F; }
        }

    </style>
</head>
<body>


<div class="container">


<?php
// Масив з балами
$points = array(50, 70, 30, 90);

// Виводимо значення балів
foreach ($points as $point) {
    echo "<div class='barcontainer'>
        <div class='bar' style='height:". $point."%'>
        $point
        </div>
    </div>";
}
?>
</div>

</body>
<script>
    // Приймаємо значення балів з PHP
    var points = <?php echo json_encode($points); ?>;

</script>

</html>
