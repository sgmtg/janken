<?php
$handTypeNames = ['グー', 'チョキ', 'パー'];
$handImgFile = ['gu', 'choki', 'pa'];
$resultsText = ['あいこ', 'あなたの負けです…', 'あなたの勝ちです!'];
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
    <title>じゃんけん</title>
</head>
<body>
    <form method='post'>
        <?php for($num=0; $num<count($handTypeNames); $num++): ?>
            <?php $checked = isset($userHandNum) && $userHandNum===$num ? 'checked':''; //イコール三つは型まで完全に一致?>
            <input type='radio' name="selectedNum" value="<?=$num ?>" <?=$checked?> > <?=$handTypeNames[$num]?> <br>
        <?php endfor ?>
        <button type="submit">勝負！</button>
    </form>


<?php if(isset($_POST['selectedNum'])):?>
  <div>
    <img src="img/janken_<?=$handImgFile[$userHandNum]?>.png">
    <img src="img/janken_<?=$handImgFile[$pcHandNum]?>.png">
  </div>
  <p><?=$resultsText[($userHandNum + 3 -$pcHandNum) % 3]?></p>
<?php endif?>

    
</body>
</html>