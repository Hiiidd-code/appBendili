<?php
require 'bootstrap/app.php';

$users = App\Models\User::all();
echo "Total Users: " . $users->count() . "\n";

foreach($users as $u) {
    echo "ID: " . $u->id . " | Name: " . $u->name . " | Admin: " . ($u->is_admin ? 'YES' : 'NO') . "\n";
}
?>
