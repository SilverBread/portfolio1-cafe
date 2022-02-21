<?php
session_start();
require('dbcnnect.php');

//★値が入っていたら*
if (!empty($_POST) ){
  //★フォームの要素が空っぽだったら★
  if ($_POST['sample_number'] == "" ) {
    $error_number = 'カード番号を入力してください';
    $error['sample_number'] = 'blank';
  }
  if ($_POST['sample_password'] == "" ) {
    $error_password = 'パスワードを入力してください';
    $error['sample_password'] = 'blank';
  }
  if ($_POST['sample_code'] == "" ) {
    $error_code = 'セキュリティコードを入力してください';
    $error['sample_code'] = 'blank';
  }
  //*エラーがなければ* 
  if(empty($error)) {
    $_SESSION['join2'] = $_POST;
    header('Location: member1.2_confirm.php');
    exit();
  }
}
//*登録フォームに戻るための設定*
if(isset($_SESSION['join2']) && isset($_REQUEST['action']) && ($_REQUEST['action'] == 'rewrite') ){
  $_POST =$_SESSION['join2'];
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>会員登録 | White BookCafe</title>
    <link href="css/member1,2.css" rel="stylesheet">
  </head>

  <body>
    <!-- ヘッダー -->
    <header class="siteHeader">
      <div class="normal">
        <nav>
          <ul class="global-nav">
            <li><a href="/portfolio1-cafe/index.html">トップ</a></li>
            <li><a href="/portfolio1-cafe/index.html#about">White BookCafeについて</a></li>
            <li><a href="/portfolio1-cafe/index.html#news">お知らせ</a></li>
            <li><a href="menu.html">メニュー</a></li>             
            <li><a href="member1.php">会員登録</a></li>
            <li><a href="/portfolio1-cafe/index.html#access1">アクセス</a></li>
          </ul>
        </nav>
      </div>
      <div class="drawer">
        <input type="checkbox" name="navToggle" id="navToggle" class="nav-toggle">
          <label for="navToggle" class="btn-burger">
            <span class="icon"></span>
          </label>
        <nav class="nav">
          <ul class="nav-list">
            <li><a href="/portfolio1-cafe/index.html">トップ</a></li>
            <li><a href="/portfolio1-cafe/index.html#about">White BookCafeについて</a></li>
            <li><a href="/portfolio1-cafe/index.html#news">お知らせ</a></li>
            <li><a href="menu.html">メニュー</a></li>
            <li><a href="member1.php">会員登録</a></li>
            <li><a href="/portfolio1-cafe/index.html#access2">アクセス</a></li>
            <li><a href="#">退会</a></li>
          </ul>
        </nav>
      </div>
    </header>
    
    <!-- メイン -->
    <main>
      <h1>
        <ruby>
          MEMBER
          <rt>会員登録</rt>
        </ruby>
      </h1>
      <div class="All">
        <h2>カード登録</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="registrationform">

          <div class="Member">
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">カード番号</sapn>
                </p>
                <input type="text" class="Member-Item-Input" name="card_number" placeholder="234 1234 1234 1234" value="<?php echo htmlspecialchars($_POST['card_number']??"", ENT_QUOTES); ?>">
              </div>
              <p class="error"> <?php echo $error_number; ?></p>
            </div>
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">パスワード</span>
                </p>
                <input type="text" class="Member-Item-Input" name="card_pass" placeholder="月/年" value="<?php echo htmlspecialchars($_POST['card_pass']??"", ENT_QUOTES); ?>">
              </div>
              <p class="error"> <?php echo $error_password; ?></p>
            </div>
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">セキュリティコード</span>
                </p>
                <input type="text" class="Member-Item-Input" name="card_code" placeholder="CVC" value="<?php echo htmlspecialchars($_POST['card_code']??"", ENT_QUOTES); ?>">
              </div>
                <p class="error"> <?php echo $error_code; ?></p>
            </div>
            
              <p class="Member-Item-Tell">※ 利用規約 、 プライバシーポリシー をご確認の上、登録ボタンを押してください</p>
              <div class="Form-Btn">
                <input type="button" onclick="location.href='member1.php?action=rewrite'" value="戻る" name="rewrite" class="button02">
                <input type="submit" class="button01" name="signup" value="確認">
              </div>
          </div>    
        </form>
      </div>
    </main>

    <!-- フッター -->
    <footer>
      <div class="footer-menu">
        <div class="left">
          <div class="inner">
            <a href="/portfolio1-cafe/index.html"><img class="top" src="image/icon.png"></a>
            <div class="Company">
              <p class="Company-name">White Book Cafe（ホワイト ブック カフェ）</p>
            </div>
          </div>
        </div>
        <nav>
          <div class="right">
            <!-- 1130以上 -->
            <div class="wide">
              <div class="menu">
                <ul class="menu-left">
                  <li><a href="/portfolio1-cafe/index.html#news">お知らせ</a></li>
                  <li><a href="menu.html">メニュー</a></li>
                  <li><a href="member1.php">会員登録</a></li>
                </ul>
                <ul class="menu-right">
                  <li><a href="call.html">お問い合わせ</a></li>
                  <li><a href="/portfolio1-cafe/index.html#access1">アクセス</a></li>
                  <li><a href="#">退会</a></li>
                </ul>
              </div>
            </div>
            <!-- 1130未満 -->
            <div class="narrow">
              <div class="menu">
                <ul class="menu-left">
                  <li><a href="/portfolio1-cafe/index.html#news">お知らせ</a></li>
                  <li><a href="menu.html">メニュー</a></li>
                  <li><a href="member1.php">会員登録</a></li>
                </ul>
                <ul class="menu-right">
                  <li><a href="call.html">お問い合わせ</a></li>
                  <li><a href="/portfolio1-cafe/index.html#access2">アクセス</a></li>
                  <li><a href="#">退会</a></li>
                </ul>
              </div>
            </div>

          </div>
        </nav>
      </div>
            <small>©2021 White Book Cafe All rights reserved.</small>
    </footer>

  </body>
</html>
