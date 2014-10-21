<?php require("./curl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="drabuzz,ドラマ,話題,ランキング" />
<meta name="description" content="ドラマ新番組の話題ランキング" />
<meta http-equiv="content-Style-type" content="text/css" />
<meta http-equiv="content-Script-type" content="text/javascript" />
<title>drabuzz - ドラマ新番組話題ランキング</title>
<link rel="stylesheet" type="text/css" href="./style.css" />
<link rel="stylesheet" type="text/css" href="./shadow.css" />
<link rel="shortcut icon" href="./image/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="./image/favicon.ico" type="image/vnd.microsoft.icon" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20423739-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div align="right"><span class="sm">
<a href="?cour=<?php echo $cour; ?>&help=1">ヘルプ</a>&nbsp;-&nbsp;<a href="http://tiger4th.com/">リンク</a>&nbsp;&nbsp;
</span></div>

<div id="wrapper">
<div id="header">
<div id="boxlogo" align="center">
<a href="http://tiger4th.com/drabuzz/"><img src='./image/drabuzz.png' alt='drabuzz' height=70></a>
</div>

<div id="ad">
<!-- admax -->
<script type="text/javascript" src="http://adm.shinobi.jp/s/633021fe0ed80ba9459ec3a55f3ea8dc"></script>
<!-- admax -->
</div>

</div>


<div id="line">
<div id="left">
<h1><?php
if(isset($_GET["help"]) && $_GET["help"]==1){
	echo "ヘルプページ - ";
}else{
	echo substr($cour, 0, 4)."年";
	switch(substr($cour, 4)){
		case 01:
			echo "冬";
			break;
		case 04:
			echo "春";
			break;
		case 07:
			echo "夏";
			break;
		case 10:
			echo "秋";
			break;
	}
}
?> ドラマ新番組話題ランキング</h1>
</div>
<?php if(!isset($_GET["help"]) || $_GET["help"]!=1){ ?>
<div id="right">
最終更新日時：<?php echo date("Y/m/d H:i", $time); ?>
</div>
<?php } ?>
</div>


<div id="container">
<div id="contents">
<div class="drop-shadow curved curved-all">

<?php if(isset($_GET["help"]) && $_GET["help"]==1){ ?>
<table class="list">
<tr>
<th>項目</th>
<th>説明</th>
</tr>
<tr>
<td>順位</td>
<td>スコアによる順位<br />左端に色が付いているものはオリジナル作品<br />色がついていないものは原作・原案等あり</td>
</tr>
<tr>
<td>タイトル</td>
<td>作品名<br />
リンク先は番組公式サイト</td>
</tr>
<tr>
<td>twitter</td>
<td>twitterで公式サイトURLがツイートされた回数<br />
リンク先はtopsy検索結果</td>
</tr>
<tr>
<td>Facebook</td>
<td>Facebookで公式サイトがいいね！・シェア・コメントされた回数の合計<br />
リンク先はGoogle検索facebook.com内の検索結果</td>
</tr>
<tr>
<td>はてな</td>
<td>公式サイトがはてなブックマークされた回数<br />
リンク先ははてなブックマークのエントリーページ</td>
</tr>
<tr>
<td>ブログ</td>
<td>ブログで公式サイトURLが書かれた記事数<br />
リンク先はYahoo!ブログ検索結果</td>
</tr>
<tr>
<td>2ch</td>
<td>2ちゃんねる内を公式サイトURLで検索したヒット数<br />
リンク先はGoogle検索2ch.net内の検索結果</td>
</tr>
<tr>
<td>スコア</td>
<td>twitter,Facebook,はてな,ブログ,2chの件数の合計</td>
</tr>
</table>
<div id="right"><a href="http://tiger4th.com/drabuzz/?cour=<?php echo $cour; ?>">元のページに戻る</a></div>
<?php }else{ ?>
<table class="list">
<tr>
<th>順位</th>
<th>タイトル</th>
<th><a href="https://twitter.com/" target="_brank"><span class="mdw">twitter</span></a></th>
<th><a href="http://www.facebook.com/" target="_brank"><span class="mdw">Facebook</span></a></th>
<th><a href="http://b.hatena.ne.jp/" target="_brank"><span class="mdw">はてな</span></a></th>
<th><a href="http://blog-search.yahoo.co.jp/" target="_brank"><span class="mdw">ブログ</span></a></th>
<th><a href="http://www.2ch.net/" target="_brank"><span class="mdw">2ch</span></a></th>
<th>スコア</th>
</tr>
<?php
$i=1;
foreach($anime as $key => $value){
$anime[$key][0] = str_replace("，", ",", $anime[$key][0]);
$anime[$key][0] = str_replace("￥", "\\", $anime[$key][0]);
if($i >= 1 && $i <= 3){$search[$i] = $key;}
$url_t = rawurlencode(str_replace("http://", "", $anime[$key][1]));
?>
<tr onmouseover="style.background='#ffeeee'" onmouseout="style.background='#ffffff'">
<td align="right" <?php if($anime[$key]["o"] == 1){ ?>style="border-left: #a52a2a 2px solid"<?php } ?>><?php echo $i; ?></td>
<td><?php if($anime[$key][1]!=""){ ?><a href="<?php echo $anime[$key][1]; ?>" target="_brank"><?php } ?><?php echo $anime[$key][0]; ?><?php if($anime[$key][1]!=""){ ?></a><?php } ?></td>
<td align="right"><a href="http://topsy.com/<?php echo $url_t; ?>" target="_brank"><?php echo $data[$key]["t"]; ?></a></td>
<td align="right"><a href="http://www.google.co.jp/search?q=site%3Afacebook.com+%22<?php echo $url_t; ?>%22" target="_brank"><?php echo $data[$key]["f"]; ?></a></td>
<td align="right"><a href="http://b.hatena.ne.jp/entry/<?php echo $anime[$key][1]; ?>" target="_brank"><?php echo $data[$key]["h"]; ?></a></td>
<td align="right"><a href="http://blog.search.yahoo.co.jp/search?p=<?php echo str_replace("http://", "", rtrim($anime[$key][1], "/")); ?>" target="_brank"><?php echo $data[$key]["b"]; ?></a></td>
<td align="right"><a href="http://www.google.co.jp/search?q=site%3A%222ch.net%22+%22<?php echo str_replace("http://", "", rtrim($anime[$key][1], "/")); ?>%22" target="_brank"><?php echo $data[$key]["2"]; ?></a></td>
<td align="right"><span class="score"><?php echo $data[$key]["t"] + $data[$key]["f"] + $data[$key]["h"] + $data[$key]["b"] + $data[$key]["2"]; ?></span></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php } ?>

</div>

<br />
<table>
<tr>
<td><a href="#" onclick="Evernote.doClip({contentId:'contents',providerName:'anibuzz'}); return false;"><img src="http://static.evernote.com/article-clipper-jp.png" alt="Clip to Evernote" border=0 /></a><script type="text/javascript" src="http://static.evernote.com/noteit.js"></script></td>
<td>&nbsp;</td>
<td><a href="http://mixi.jp/share.pl" class="mixi-check-button">mixiチェック</a><script type="text/javascript" src="http://static.mixi.jp/js/share.js"></script></td>
<td>&nbsp;</td>
<td><a href="http://b.hatena.ne.jp/entry/http://tiger4th.com/drabuzz/" class="hatena-bookmark-button" data-hatena-bookmark-title="drabuzz" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></td>
<td>&nbsp;</td>
<td><iframe src="http://www.facebook.com/plugins/like.php?href=http://tiger4th.com/drabuzz/&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></td>
<td><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-lang="ja">ツイート</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></td>
<td><g:plusone size="medium"></g:plusone></td>
</tr>
</table>
<br />

</div>
</div>
<div id="sidebar" align="center">

<div class="drop-shadow curved curved-all">
<div class="boxhead" align="center">
<h2><span class="mdw">放映時期</span></h2>
</div>
<div class="box" align="center">
<?php if($cour != "201210"){echo '<a href="?cour=201210">';} ?>2012秋<?php if($cour != "201210"){echo '</a>';} ?>
　<?php if($cour != "201207"){echo '<a href="?cour=201207">';} ?>2012夏<?php if($cour != "201207"){echo '</a>';} ?>
<br />
<?php if($cour != "201204"){echo '<a href="?cour=201204">';} ?>2012春<?php if($cour != "201204"){echo '</a>';} ?>
　<?php if($cour != "201201"){echo '<a href="?cour=201201">';} ?>2012冬<?php if($cour != "201201"){echo '</a>';} ?>
<br />
<p class="hr"></p>
<?php if($cour != "201110"){echo '<a href="?cour=201110">';} ?>2011秋<?php if($cour != "201110"){echo '</a>';} ?>
　<?php if($cour != "201107"){echo '<a href="?cour=201107">';} ?>2011夏<?php if($cour != "201107"){echo '</a>';} ?>
<br />
<?php if($cour != "201104"){echo '<a href="?cour=201104">';} ?>2011春<?php if($cour != "201104"){echo '</a>';} ?>
　<?php if($cour != "201101"){echo '<a href="?cour=201101">';} ?>2011冬<?php if($cour != "201101"){echo '</a>';} ?>
<br />
</div>
</div>

<div class="drop-shadow curved curved-all">
<div class="boxhead" align="center">
<h2><span class="mdw">リンク</span></h2>
</div>
<div class="box" align="center">
<a href="http://tiger4th.com/anibuzz/"><img src="./image/anibuzz.png" width="170" alt="drabuzz" /></a>
</div>
<div class="box" align="center">
<a href="http://tiger4th.com/sc/"><img src="./image/sc.png" width="170" alt="social checker" /></a>
</div>
</div>
<br />

<?php require("./ad.php"); ?>

<!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4e3ab77310f2fc55"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e3ab77310f2fc55"></script>
<!-- AddThis Button END -->
<?php require("./js/addthis.js"); ?>
<br /><br />
</div>

</div>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja'}
</script>
</body>
</html>