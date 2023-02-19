<?php
$handTypeNames = ['グー', 'チョキ', 'パー'];
$handImgFile = ['gu', 'choki', 'pa'];
$resultsText = ['あいこです', 'あなたの負けです…', 'あなたの勝ちです!'];
if(isset($_POST['selectedNum'])){
    $userHandNum = (int)$_POST['selectedNum'];
    $pcHandNum = rand(0, count($handTypeNames)-1);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <title>じゃんけん</title>
</head>

<body>
    <form method='post'>
        <?php for($num=0; $num<count($handTypeNames); $num++): ?>
        <?php $checked = isset($userHandNum) && $userHandNum===$num ? 'checked':''; //イコール三つは型まで完全に一致?>
        <input type='radio' name="selectedNum" value="<?=$num ?>" <?=$checked?> >
        <?=$handTypeNames[$num]?> <br>
        <?php endfor ?>
        <button type="submit">勝負する</button>
    </form>


    <?php if(isset($_POST['selectedNum'])):?>
    <ul>
    <li>
        <img src="img/janken_<?=$handImgFile[$userHandNum]?>.png">
        <p class="small">あなた</p>
    </li>
    <li>
        <img src="img/janken_<?=$handImgFile[$pcHandNum]?>.png">
        <p class="small">相手</p>
    </li>
    </ul>
    <p>
        <?=$resultsText[($userHandNum + 3 -$pcHandNum) % 3]?>
    </p>
    <?php endif?>


</body>

</html>