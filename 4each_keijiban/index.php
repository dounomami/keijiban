<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <?php
            mb_internal_encoding("utf8");
            require "DB.php";
            $dbcoonect = new DB();
            $pdo = $dbcoonect->connect();
            $stmt = $pdo->prepare($dbcoonect->select());
            $stmt->execute();
                
        ?>
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="header_list">
                <lu>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>4eachについて</li>
                    <li>登録フォーム</li>
                    <li>問い合わせ</li>
                    <li>その他</li>
                </lu>
            </div>
        </header>
        <main>
            <div class="main_container">
                <div class="left">
                    <h1>プログラミングに役立つ掲示板</h1>
                    <form method="post" action="insert.php">
                        <div class="form_title">
                            <h2>入力フォーム</h2>
                        </div>
                        <div>
                            <label>ハンドルネーム</label>
                            <br>
                            <input type="text" size="35" name="handlename" class="text">
                        </div>
                        <div>
                            <label>タイトル</label>
                            <br>
                            <input type="text" size="35" name="title" class="text">
                        </div>
                        <div>
                            <label>コメント</label>
                            <br>
                            <textarea cols="35" rows="7" name="comments"></textarea>
                        </div>
                        <div>
                            <input type="submit" class="submit" value="投稿する">
                        </div>
                    </form>
                    <?php
                        while($row=$stmt->fetch()) {
                            echo "<div class='title1'>";
                            echo "<h2>".$row['title']."</h2>";
                            echo "<div class='contents1'>";
                            echo $row['comments'];
                            echo "<div class='handlename1'>posted by".$row['handlename']."</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    <?php
                        while($row=$stmt->fetch()) {
                            echo "<div class='title2'>";
                            echo "<h2>".$row['title']."</h2>";
                            echo "<div class='contents2'>";
                            echo $row['comments'];
                            echo "<div class='handlename2'>posted by".$row['handlename']."</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
            <div class="right">
                <div class="main_list1">
                    <h2>人気の記事</h2>
                    <lu>
                        <li>PHPオススメ本</li>
                        <li>PHP MyAdminの使い方</li>
                        <li>今人気のエディタ Top5</li>
                        <li>HTMLの基礎</li>
                    </lu>
                </div>
                <div class="main_list2">
                    <h2>オススメリンク</h2>
                    <lu>
                        <li>インターノウス株式会社</li>
                        <li>XAMPPのダウンロード</li>
                        <li>Eclipseのダウンロード</li>
                        <li>Bracketsのダウンロード</li>
                    </lu>
                </div>
                <div class="main_list3">
                    <h2>カテゴリ</h2>
                    <lu>
                        <li>HTML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                    </lu>
                </div>
            </div>
        </main>
        <footer>
            copyright ©︎ internous | 4each blog the provides A to Z about programming.
        </footer>
        
    </body>
</html>