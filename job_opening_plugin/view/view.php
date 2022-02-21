<?php

/**
 * (未使用) メインメニューページ内容の表示・更新処理
 * @deprecated version 0.1
 */
function main_menu_page_contents()
{
  // HTML表示
  echo <<<EOF
<div class="wrap">
	<h2>メインメニュー</h2>
	<p>
    job-openingsのページです。
	</p>
</div>
EOF;
}


//=================================================
// サブメニュー①ページ内容の表示・更新処理
//=================================================
function job_openings_list()
{

  //---------------------------------
  // HTML表示
  //---------------------------------
  echo <<<EOF


<div class="wrap">
	<h2>サブメニュー②</h2>
	<p>
		求人情報一覧 のページです。
	</p>
</div>

EOF;
}

//=================================================
// サブメニュー②ページ内容の表示・更新処理
//=================================================

function job_openings_add()
{

  //---------------------------------
  // ユーザーが必要な権限を持つか確認
  //---------------------------------
  if (!current_user_can('manage_options')) {
    wp_die(__('この設定ページのアクセス権限がありません'));
  }

  //---------------------------------
  // 初期化
  //---------------------------------
  $opt_name = 'hoge'; //オプション名の変数
  $opt_val = get_option($opt_name); // 既に保存してある値があれば取得
  $opt_val_old = $opt_val;
  $message_html = "";

  //---------------------------------
  // 更新されたときの処理
  //---------------------------------
  if (isset($_POST[$opt_name])) {

    // POST されたデータを取得
    $opt_val = $_POST[$opt_name];

    // POST された値を$opt_name=$opt_valでデータベースに保存(wp_options テーブル内に保存)
    update_option($opt_name, $opt_val);

    // 画面にメッセージを表示
    $message_html = <<<EOF

<div class="notice notice-success is-dismissible">
	<p>
		メッセージを保存しました
		({$opt_val_old}→{$opt_val})
	</p>
</div>

EOF;
  }

  //---------------------------------
  // HTML表示
  //---------------------------------
  echo $html = <<<EOF

{$message_html}

<div class="wrap">
	<h2>とりあえずメニューページ</h2>
	<form name="form1" method="post" action="">
		<p>
			<input type="text" name="{$opt_name}" value="{$opt_val}" size="32" placeholder="メッセージを入力してみて下さい">
		</p>
		<hr />
		<p class="submit">
			<input type="submit" name="submit" class="button-primary" value="メッセージを保存" />
		</p>
	</form>
</div>

EOF;
}