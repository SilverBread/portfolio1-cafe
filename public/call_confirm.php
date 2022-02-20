<?php
//お問い合わせ項目
$category = $_POST['category'];

//名前
$name = is_null($_POST['name']) || empty($_POST['name']) || !is_string($_POST['name']) ? false : $_POST['name'];

//フリガナ
$furigana = is_null($_POST['furigana']) || empty($_POST['furigana']) || !is_string($_POST['furigana']) ? false : $_POST['furigana'];

//電話番号
$tel = is_null($_POST['tel']) || empty($_POST['tel']) || !is_string($_POST['tel']) ? false : $_POST['tel'];

//メールアドレス
$mail = is_null($_POST['mail']) || empty($_POST['mail']) || !is_string($_POST['mail']) ? false : $_POST['mail'];
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
  $mail = false;
}

//お問い合わせ内容
$contents = is_null($_POST['contents']) || empty($_POST['contents']) || !is_string($_POST['contents']) ? false : $_POST['contents'];
?>


<html>
  <head>
  <meta charset="UTF-8">
  <title>確認画面 | White BookCafe</title>
  <link href="css/call_confirm.css" rel="stylesheet">
  </head>

  <body>
    <main>
      <h1>確認画面</h1>
      <div class="Form">
        <div class="Form-Item">
          <p class="Form-Item-Label">
            <span class="Form-Item-Label-Required">必須</span>お問い合わせ項目</p>
            <div class="Form-Item-Input"><?php echo $category; ?></div>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">
            <span class="Form-Item-Label-Required">必須</span>お名前</p>
            <div class="Form-Item-Input"><?php echo $name; ?></div>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">
            <span class="Form-Item-Label-Required">必須</span>フリガナ</p>          
            <div class="Form-Item-Input"><?php echo $furigana; ?></div>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">
            <span class="Form-Item-Label-Required">必須</span>電話番号</p>        
            <div class="Form-Item-Input"><?php echo $tel; ?></div>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">
            <span class="Form-Item-Label-Required">必須</span>メールアドレス</p>          
            <div class="Form-Item-Input"><?php echo $mail; ?></div>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">
            <span class="Form-Item-Label-Required">必須</span>お問い合わせ内容</p>
            <div class="Form-Item-Textarea"><?php echo nl2br($contents); ?></div>
        </div>
      </div>

    <form action='call_complete.php' method='post'>
      <input type='hidden' name='name' value='$name'>
      <input type='hidden' name='furigana' value='$furigana'>
      <input type='hidden' name='tel' value='$tel'>
      <input type='hidden' name='mail' value='mail'>
      <input type='hidden' name='contents' value='contents'>
      <div class="Form-Btn">
        <input type='button' class="cancel-btn" onclick='history.back()' value='戻る'>
        <input type='submit' class="submit-btn" value='確認'>
      </div>
    </form>

    </main>
  </body>
</html>
