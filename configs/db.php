<?php

const SUPABASE_URL = 'https://rytjeruayveyncmiwhkf.supabase.co';
const SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InJ5dGplcnVheXZleW5jbWl3aGtmIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0ODkxNDM5NywiZXhwIjoyMDY0NDkwMzk3fQ.WtzNB1fdHGKKgXK2yNZLP5e1ENRTbKNzdnPQh4W6EPk';
const SUPABASE_BUCKET = 'jurnal-images';
$supabaseStorageUrl = SUPABASE_URL . "/storage/v1/object/public/" . SUPABASE_BUCKET . "/";

function supabase_fetch($table)
{
  $url = SUPABASE_URL . "/rest/v1/{$table}?select=*";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . SUPABASE_KEY,
    'Authorization: Bearer ' . SUPABASE_KEY,
    'Content-Type: application/json',
  ]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);
  if (curl_errno($ch)) {
    return null;
  }

  curl_close($ch);
  return json_decode($response, true);
}

function supabase_insert($table, $data)
{
  $url = SUPABASE_URL . "/rest/v1/{$table}";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'apikey: ' . SUPABASE_KEY,
    'Authorization: Bearer ' . SUPABASE_KEY,
    'Prefer: return=representation'
  ]);

  $response = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  return [$httpcode, json_decode($response, true)];
}

function upload_to_supabase_storage($tmpPath, $fileName, $bucket = SUPABASE_BUCKET)
{
  $upload_url = SUPABASE_URL . "/storage/v1/object/$bucket/$fileName";

  $fileData = file_get_contents($tmpPath);
  $headers = [
    "Authorization: Bearer " . SUPABASE_KEY,
    "Content-Type: application/octet-stream",
    "x-upsert: true"
  ];

  $ch = curl_init($upload_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fileData);

  $response = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($httpcode === 200 || $httpcode === 201) {
    return SUPABASE_URL . "/storage/v1/object/public/$bucket/$fileName";
  } else {
    return false;
  }
}
?>