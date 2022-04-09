<?php



// $_FILESはinputである以上必ず渡ってくるので、nameプロパティに文字列が入っているかどうかで判別
try {
  if (!empty($_FILES['file']['name'])) {
    // アップロードされたファイル名の取得
    $filename = $_FILES['file']['name'];

    // move_uploaded_file()の引数ように格納先のパスを変数へ代入。
    $upload_path = '../storage/' . $filename;

    // ファイル移動を実行。move_uploaded_fileの結果(フラグ)を受け取る
    $result_flag = move_uploaded_file($_FILES['file']['tmp_name'], $upload_path);

    if ($result_flag) {
      header("HTTP/1.1 200 OK");
      header("Content-Type: application/json; charset=utf-8");
      $result = array('code' => 200, 'message' => 'success');
      echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
      throw new Exception('アップロードに失敗しました');
    }
  } else {
    throw new Exception('POSTされた内容に問題があります');
  }
} catch (Exception $e) {
  $result = array('code' => 400, 'message' => 'erroe', 'description' => $e->getMessage());
  echo json_encode($result, JSON_UNESCAPED_UNICODE);
  exit;
}
