<?php
    // data variables
    $blinds = $fan = $outdoorLight = "";

    // reading data
    $readTextArray = file('data.txt', FILE_IGNORE_NEW_LINES);

    $blinds = $readTextArray[0];
    $fan = $readTextArray[1];
    $outdoorLight = $readTextArray[2];

    // writing data
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (isset($_POST['blinds'])) {
            $blinds = $_POST['blinds'];
        }

        if (isset($_POST['fan'])) {
            $fan = $readTextArray[1];

            $answers = array('on', 'off');
            $chosen = $_POST['fan'];

            if (in_array($chosen, $answers)) {
                if(strcasecmp($chosen, 'on') == 0) {
                    $fan = "1";
                } else {
                    $fan = "0";
                }
            }
        } 

        if (isset($_POST['outdoorLight'])) {
            $fan = $readTextArray[2];

            $answers = array('on', 'off');
            $chosen = $_POST['outdoorLight'];

            if (in_array($chosen, $answers)) {
                if(strcasecmp($chosen, 'on') == 0) {
                    $outdoorLight = "1";
                } else {
                    $outdoorLight = "0";
                }
            }
        } 

        $writeText = $blinds . "\n" . $fan . "\n" . $outdoorLight;

        $writeData = fopen("data.txt", "w") or die("Unable to open file!");
        fwrite($writeData, $writeText);

        fclose($writeData);
    }

    $readTextArray = "";
?>

<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/house.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="node_modules/normalize.css/normalize.css">
    <link rel="stylesheet" type="text/css" media='screen and (max-width: 600px)' href="css/mobile.css">
    <link rel="stylesheet" type="text/css" media='screen and (min-width: 601px)' href="css/style.css">
    <script type="text/javascript" src="js/main.js"></script>
    
    <title>SmartHome Ovládacie centrum</title>
</head>
<body onload="setIndicatorColors()">
    <header>
        <h1>KGBSmartHome Ovládacie centrum</h1>

        <div class="languages">
            <a href=""><img src="images/sk_flag.png" id="sk" class="lang"></a>
            <a href="lang/indexEN.php"><img src="images/en_flag.png" id="en" class="lang"></a>
        </div>
    </header>

    <main>
        <center>
            <section class="controlPanelContainer">
                <h2 class="heading">Ovládací panel</h2>
                <form class="controlPanel" action="" method="POST">
                    <label for="blinds">Žalúzie</label>
                    <p id="blindsIndicator" class="indicator blindsIndicator">&#9679;</p>
                    <div class="slider">
                        <input id="slider" name="blinds" type="range" min="0" max="99" value="0" oninput="changeRangeIndicatorColor()"/>
                    </div>
    
                    <br>
                    <label for="fan">Ventilátor</label>
                    <p class="indicator fanIndicator">&#9679;</p>
                    
                    <div class="radioAnswers">
                        <input type="radio" name="fan" class="toggleFan" onclick="changeIndicatorColor('fanIndicator', 'green')" value="on"/>
                        <p class="radioLabel">Zap</p>
                        <input type="radio" name="fan" class="toggleFan" onclick="changeIndicatorColor('fanIndicator', 'red')" value="off"/>
                        <p class="radioLabel">Vyp</p>
                    </div>

                    <br><br>
                    <label for="outdoorLight">Vonkajšie svetlo</label>
                    <p class="indicator outdoorLightIndicator">&#9679;</p>
                    
                    <div class="radioAnswers">
                        <input type="radio" name="outdoorLight" class="toggleOutdoorLight" onclick="changeIndicatorColor('outdoorLightIndicator', 'green')" value="on"/>
                        <p class="radioLabel">Zap</p>
                        <input type="radio" name="outdoorLight" class="toggleOutdoorLight" onclick="changeIndicatorColor('outdoorLightIndicator', 'red')" value="off"/>
                        <p class="radioLabel">Vyp</p>
                    </div>

                    <br><br>
                
                    <center>
                    <input type="submit" value="Uložiť zmeny"/>
                    </center>
                </form>
            </section>
        </center>
    </main>

    <footer>
        <center>
            <p>S ❤️ vytvorila spoločnosť KGB.</p>
            <p>&#169;2022</p>
        </center>
    </footer>
</body>
</html>