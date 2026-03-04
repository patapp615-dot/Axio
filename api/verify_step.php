<?php
header('Content-Type: application/json');

$step = $_POST['step'] ?? '';

$leanFile = "../lean_project/Axio.lean";

$code = "import Mathlib\n\n";
$code .= "theorem test : 2 + 2 = 4 := by\n";
$code .= "  " . $step . "\n";

file_put_contents($leanFile, $code);

$output = shell_exec("bash -c 'source $HOME/.elan/env && cd ../lean_project && lake build 2>&1'");

if (strpos($output, "error") !== false) {
    echo json_encode([
        "success" => false,
        "message" => "<span style='color:red;'>Error:<br>$output</span>"
    ]);
} else {
    echo json_encode([
        "success" => true,
        "message" => "<span style='color:green;'>Step Verified!</span>"
    ]);
}