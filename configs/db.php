<?php
// configs/db.php

// Ganti dengan project Supabase kamu
define('SUPABASE_URL', 'https://rytjeruayveyncmiwhkf.supabase.co');
define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InJ5dGplcnVheXZleW5jbWl3aGtmIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0ODkxNDM5NywiZXhwIjoyMDY0NDkwMzk3fQ.WtzNB1fdHGKKgXK2yNZLP5e1ENRTbKNzdnPQh4W6EPk');

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

?>