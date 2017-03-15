<?php

function rename_file($filename, $mime)
{
    $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
    $filename = str_slug($filename, '-');
    $filename = '/' . $filename . '_' . str_random(32) . '.' . $mime;

    return $filename;
}

function uploadImage($request, $field)
{
  $data = array_except($request, $field);
  if (array_has($request, $field)){
    $file = $request[$field];
    $request[$field];
    $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());
    $path = '/uploads/images/';
    $public_path = public_path() . $path;
    $public_path = public_path() . $path;
    $file->move($public_path, $fileName);
    $data[$field] = $path . $fileName;
  }

  return $data;
}
