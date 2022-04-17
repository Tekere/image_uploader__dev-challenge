<?php
function change_same_filename($filename, $upload_path, $storage_path)
{
  $filename_no_extension = explode('.', $filename);
  $filename_no_extension = $filename_no_extension[0];
  $extension = pathinfo($upload_path, PATHINFO_EXTENSION);
  echo $filename_no_extension;
  $i = 1;
  while (file_exists($upload_path)) {
    $upload_path = $storage_path . $filename_no_extension . $i . '.' . $extension;
    $i++;
  }
  return $upload_path;
}
