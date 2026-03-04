<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>AXIO - AI Proof Tutor</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>

<div class="sidebar">
    <div class="logo">AXIO</div>
    <div class="menu-item active">Proof Tutor</div>
</div>

<div class="main">

    <div class="proof-box">
        <h3>Proof Statement</h3>
        <textarea id="statement" placeholder="Enter Proof Statement here..."></textarea>
        <button onclick="translateStatement()">Translate</button>
    </div>

    <div class="proof-box">
        <h3>Latex Preview</h3>
        <div id="preview"></div>
    </div>

    <div class="proof-box">
        <h3>Your Proof</h3>

        <div id="steps"></div>

        <button onclick="addStep()">+ Add Step</button>
    </div>

</div>

<script src="assets/js/main.js"></script>
</body>
</html>