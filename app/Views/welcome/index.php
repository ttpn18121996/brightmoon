<?php View::extends('layouts.app') ?>

<?php View::section('title', 'Welcome to BrightMoon') ?>

<?php View::section('content') ?>
    <div class="flex justify-center items-center flex-column">
        <h1 class="text-5xl text-gray-500">BrightMoon</h1>
        <ul class="flex justify-between gap-2">
            <li>
                <a href="https://github.com/ttpn18121996/brightmoon" target="_blank">Framework v5.1</a>
            </li>
            <li>|</li>
            <li>
                <a href="https://github.com/ttpn18121996/framework" target="_blank">Core Framework v<?= app()->version() ?></a>
            </li>
            <li>|</li>
            <li><span>PHP v<?= phpversion() ?></span></li>
        </ul>
    </div>
<?php View::endSection() ?>
