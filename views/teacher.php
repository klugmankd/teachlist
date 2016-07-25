<?php include_once("../controllers/watchOnceController.php") ?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$result['full_teacher_name']?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/styleProfile.css">
    <link href="../img/icons/teachericon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/script.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <div id="logo">
            <a href="../index.php">
                <span class="titleSite">t</span>
                <span class="titleSite2">l</span>
                <span class="titleSite">e</span>
                <span class="titleSite2">i</span>
                <span class="titleSite">a</span>
                <span class="titleSite2">s</span>
                <span class="titleSite">c</span>
                <span class="titleSite2">t</span>
                <span class="titleSite">h</span>
            </a>
        </div>
    </header>
    <div id="wrapper">
        <div id="teacherProfileBlock">
            <div id="titleBlock">
                <div id="imgBlock" style="background: url('../img/profiles/<?=$result['img']?>') center; background-size: cover;"></div>
                <div id="nameBlock">
                    <p><?=$result['full_teacher_name']?></p>
                    <hr>
                </div>
            </div>
            <div id="details">
                <div id="positionBlock">
                    <div class="label">Посада</div>
                    <p class="detail"><?=$result['position_name']?></p>
                </div>
                <div id="institutionBlock">
                    <div class="label">Навчальний заклад</div>
                    <p class="detail"><?=$result['educatioal_institution']?></p>
                </div>
                <div id="categoryBlock">
                    <div class="label">Категорія</div>
                    <p class="detail"><?=$result['category']?></p>
                </div>
                <div id="rankBlock">
                    <div class="label"><span>Педагогічне звання</span></div>
                    <p class="detail"><?=$result['teaching_rank']?></p>
                </div>
                <div id="rankBlock">
                    <div class="label"><span>Предмети</span></div>
                    <p class="detail">
                        <?=$subjects?>
                    </p>
                </div>
            </div> 
            <div id="pdd">
                <div class="label"><span>ПДД</span></div>
                <p class="detail"><?=$result['PDD']?></p>
            </div>
        </div>
    </div>
</body>
</html>