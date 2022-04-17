<?php
require_once('./functions.php');


const STORAGE_PATH = '../storage/';

// $_FILESはinputである以上必ず渡ってくるので、nameプロパティに文字列が入っているかどうかで判別
try {
  if (!empty($_FILES['file']['name'])) {
    // アップロードされたファイル名の取得
    $filename = $_FILES['file']['name'];

    // move_uploaded_file()の引数ように格納先のパスを変数へ代入。
    $upload_path = STORAGE_PATH . $filename;

    // 同名ファイルの処理
    if (file_exists($upload_path)) {
      $upload_path = change_same_filename($filename, $upload_path, STORAGE_PATH);
    }

    // ファイル移動を実行。move_uploaded_fileの結果(フラグ)を受け取る
    $result_flag = move_uploaded_file($_FILES['file']['tmp_name'], $upload_path);

    if ($result_flag) {
      header("HTTP/1.1 200 OK");
      header("Content-Type: application/json; charset=utf-8");
      // $result = array(
      //   'code' => 200,
      //   'message' => 'success',
      //   'image_url' => realpath($upload_path)  //絶対パスに変換して返す
      // );
      // echo $upload_path;
      // echo json_encode($result, JSON_UNESCAPED_UNICODE);
      echo realpath($upload_path); //絶対パスに変換して返す
    } else {
      throw new Exception('アップロードに失敗しました');
    }
  } else {
    throw new Exception('POSTされた内容に問題があります');
  }
} catch (Exception $e) {
  $result = array('code' => 400, 'message' => 'error', 'description' => $e->getMessage());
  echo json_encode($result, JSON_UNESCAPED_UNICODE);
  exit;
}
