<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="C:\xampp\htdocs\volont-oktobar\volont\front\css\pocetna.css">
        <!-- <link rel="stylesheet" type="text/css" href="front\css\pocetna.css"> -->
        <title>Document</title>
    </head>







<!-- <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'> -->







    <body>
    <div id="slovoV"><p>v</p></div>
    <div id="slovoO"><p>o</p></div>
    <div id="slovol"><p>l</p></div>
    <div id="slovoDrugoO"><p>o</p></div>
    <div id="slovoN">
        <p>n</p>
    </div>
    <div id="slovoT">
        <p>t</p>
    </div>
    <div id="slika1" onclick="ani()">
        <img src="indexImg1.jpg" alt="slika1" id="img1">
        <p id="txtImg1">Pogledaj</p>
    </div>
    <div id="slika2" onclick="ani()">
        <img src="indexImg2.jpg" alt="slika2" id="img2">
        <p id="txtImg2">ponudu</p>
    </div>

    <div id="logovanje"><p id="txtLog">Uloguj se</p></div>
    <div id="registrovanje"><p id="txtReg">Registruj se</p></div>

    <div id="lopta"></div>

    </body>
    <script>
    let timeout;
        function ani() {
    document.getElementById('lopta').className = 'classname';
    /*setTimeout('window.open('ponude.php','_self')', 100);*/
    timeout = setTimeout(alertFunc, 1000);
    }

    function alertFunc() {
        window.open('ponude.php','_self');
    }
    </script>
    </html>