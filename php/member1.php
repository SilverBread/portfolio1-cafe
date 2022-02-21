<?php
session_start();
require('dbconnect.php');

//フォームに入力されたemailがすでに登録されていないかチェック①
$statement = $db->prepare('SELECT * FROM ` ` WHERE sample_mail = sample_mail');
$statement->bindValue(':sample_mail', $_POST['sample_mail']);
$statement->execute();
$result = $statement->fetch();

//★値が入っていたら*
if (!empty($_POST) ){
  //★フォームの要素が空っぽだったら★
  if ($_POST['sample_name'] == "" ) {
    $error_name = '名前を入力してください';
    $error['sample_name'] = 'blank';
  }
  if ($_POST['sample_furigana'] == "" ) {
    $error_furigana = 'フリガナを入力してください';
    $error['sample_furigana'] = 'blank';
  }
  if ($_POST['sample_mail'] == "" ) {
    $error_mail = 'メールアドレスを入力してください';
    $error['sample_mail'] = 'blank';
  }
  if ($_POST['sample_pass'] == "" ) {
    $error_pass = '8文字以上で指定してください';
    $error['sample_pass'] = 'blank';
  }
  //★パスワードは8文字以上で入力してもらう★
  if (strlen($_POST['sample_pass'] )< 8 ) {
    $error_pass = '8文字以上で指定してください';
    $error['sample_pass'] = 'length';
  }
  //フォームに入力されたmailがすでに登録されていないかチェック①
  if ($result > 0){
    $error_mail = '同じメールアドレスが存在します';
    $error['sample_mail'] = 'blank';
  }
  //*エラーがなければ* 
  if(empty($error)) {
    $_SESSION['join'] = $_POST;
    header('Location: member2.php');
    exit();
  }
}
//*登録フォームに戻るための設定*
if(isset($_SESSION['join']) && isset($_REQUEST['action']) && ($_REQUEST['action'] == 'rewrite') ){
  $_POST =$_SESSION['join'];
}
session_write_close();
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
        <h2>アカウント登録</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="registrationform">

          <div class="Member">
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">名前</sapn>
                </p>
                <input type="text" class="Member-Item-Input" name="member_name" placeholder="名前を入力" value="<?php echo htmlspecialchars($_POST['member_name']??"", ENT_QUOTES); ?>">
              </div>
              <p class="error"> <?php echo $error_name; ?></p>
            </div>
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">フリガナ</span>
                </p>
                <input type="text" class="Member-Item-Input" name="member_furigana" placeholder="フリガナを入力" value="<?php echo htmlspecialchars($_POST['member_furigana']??"", ENT_QUOTES); ?>">
              </div>
              <p class="error"> <?php echo $error_furigana; ?></p>
            </div>
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">メールアドレス</span>
                </p>
                <input type="text" class="Member-Item-Input" name="member_email" placeholder="お使いのメールアドレスを入力" value="<?php echo htmlspecialchars($_POST['member_email']??"", ENT_QUOTES); ?>">
              </div>
                <p class="error"> <?php echo $error_mail; ?></p>
            </div>
            <div class="Member-Item">
              <div class="Member-Item-Zoon">
                <p class="Member-Item-Label">
                  <span class="Form-Item-Label-Required">必須</span>
                  <span class="Form-Item-Label-Contents">パスワード</span>
                </p>
                <input type="password" class="Member-Item-Input" name="member_pass" placeholder="半角英数字８文字以上" value="<?php echo htmlspecialchars($_POST['member_pass']??"", ENT_QUOTES); ?>">
              </div>
              <p class="error"> <?php echo $error_pass; ?></p>
            </div>
              <p class="Member-Item-Tell">※ 利用規約 、 プライバシーポリシー をご確認の上、登録ボタンを押してください</p>
              <input type="submit" class="Member-Btn" name="signup" value="次へ">
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
