<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langauge Translator | Joshua Alana</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/PBL6-Dictionary/public/css/style_translatePage.css">
</head>
<body>

    <!-- <h1> Translate with Joshua Alana</h1> -->
 <div class="container">
    <div class="wrapper">
        <div class="text-input">
            <textarea spellcheck="false" class="from-text" placeholder="Enter text"></textarea>
            <textarea spellcheck="false" readonly disabled class="to-text"
            placeholder="Translation"></textarea>
        </div>
        <ul class="controls">
            <li class="row from">
                <div class="icons">
                    <i id="from" class="fas fa-volume-up"></i>
                    <i id="from" class="fas fa-copy"></i>
                </div>
                <select></select>
            </li>

            <li class="exchange">
                <i class="fas fa-exchange-alt"></i>
            </li>
            <li class="row to">
                <select></select>
                <div class="icons">
                    <i id="to" class="fas fa-volume-up"></i>
                    <i id="to" class="fas fa-copy"></i>
                </div>
            </li>
        </ul>
    </div>

    <button>Translate Text</button>
 </div>   


 <script src="/PBL6-Dictionary/public/js/countries.js"></script>

 <script src="/PBL6-Dictionary/public/js/script.js"></script>

</body>
</html>