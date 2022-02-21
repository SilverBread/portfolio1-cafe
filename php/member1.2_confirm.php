<?php
session_start();
require('dbconnect.php');

//★セッション情報を設定★
if (!isset($_SESSION['join'])) {
    header ('Location: member1.php');
    exit();
}
//*パスワードを【$hash】変数に格納*
$hash = password_hash($_SESSION['join']['sample_pass'], PASSWORD_BCRYPT);


//★入力されたデータをMySQLに登録★
if(!empty($_POST)){
    $statement = $db->prepare('INSERT INTO ` ` SET sample_name=?, sample_furigana=?, sample_mail=?, sample_pass=?, sample_number=?, sample_password=?, sample_code=?');
    $statement->execute(array(
        $_SESSION['join']['sample_name'],
        $_SESSION['join']['sample_furigana'],
        $_SESSION['join']['sample_mail'],
        $hash,
        $_SESSION['join2']['sample_number'],
        $_SESSION['join2']['sample_password'],
        $_SESSION['join2']['sample_code']
    ));
    unset($_SESSION['join']);
    unset($_SESSION['join2']);
    header('Location: member_thank.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>会員登録 確認画面 | White BookCafe</title>
    <link href="css/member_confirm.css" rel="stylesheet">
  </head>

  <body>
    <main>
      <h1>
        <ruby>
          MEMBER
          <rt>会員登録</rt>
        </ruby>
      </h1>
      <div class="All">
        <h2>確認画面</h2>
        <form action="" method="POST">

        <input type="hidden" name="action" value="submit">
          <div class="Member">
            <div class="Member-Item">
              <p class="Member-Item-Label">名前</p>
              <span class="check">
                <?php echo (htmlspecialchars($_SESSION['join']['sample_name'], ENT_QUOTES)); ?>
              </span>
            </div>
            <div class="Member-Item">
              <p class="Member-Item-Label">フリガナ</p>
              <span class="check">
                <?php echo (htmlspecialchars($_SESSION['join']['sample_furigana'], ENT_QUOTES)); ?>
              </span>
            </div>
            <div class="Member-Item">
              <p class="Member-Item-Label">メールアドレス</p>
              <span class="check">
                <?php echo (htmlspecialchars($_SESSION['join']['sample_mail'], ENT_QUOTES)); ?>
              </span>
            </div>
            <div class="Member-Item">
              <p class="Member-Item-Label">パスワード</p>
              <span class="check">
              [セキュリティのため非表示]
              </span>
            </div>
            <div class="Member-Item">
              <p class="Member-Item-Label">カード番号</p>
              <span class="check">
              [セキュリティのため非表示]
              </span>
            </div>
            <div class="Member-Item">
              <p class="Member-Item-Label">カードパスワード</p>
              <span class="check">
              [セキュリティのため非表示]
              </span>
            </div>
            <div class="Member-Item">
              <p class="Member-Item-Label">セキュリティコード</p>
              <span class="check">
              [セキュリティのため非表示]
              </span>
            </div>
            <div class="Form-Btn">
              <input type="button" onclick="location.href='member2.php?action=rewrite'" value="戻る" name="rewrite" class="button02">
              <input type="submit" onclick="location.href='member_thank.php'" value="登録" name="registration" class="button">
            </div>
          </div>    
        </form>
      </div>
    </main>
  </body>
</html>
