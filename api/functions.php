<?php
// 同名ファイルに連番をつけて返す処理
function change_same_filename($filename, $upload_path, $storage_path)
{
  $filename_no_extension = explode('.', $filename);
  $filename_no_extension = $filename_no_extension[0];
  $extension = pathinfo($upload_path, PATHINFO_EXTENSION);
  $i = 1;
  while (file_exists($upload_path)) {
    $upload_path = $storage_path . $filename_no_extension . $i . '.' . $extension;
    $i++;
  }
  return $upload_path;
}

// フルパスからファイル名だけに切り出す処理
function get_filename_from_fullpath($fullpath)
{
  $temp = explode('/', $fullpath);
  $result = $temp[array_key_last($temp)];
  return $result;
}
