<?php

use CubicMushroom\Tools\ProjectToolbelt\Codeception\FunctionalWizard;

/** @var \Codeception\Scenario $scenario */
$I = new FunctionalWizard($scenario);
$I->wantTo('bootstrap a new, empty project');

$testRoot = $I->getTheProjectTestRoot();

$I->haveInitialisedComposer();

$I->runTheCommand('bootstrap', ['path' => $testRoot]);
$I->seeOutput('Bootstrapping project in '.$testRoot);
$I->seeOutput('Creating package.json file');
$I->openPackageJsonFile();
$I->assertPackageJsonValue('name', 'cubicmushroom-test-project');
$I->assertPackageJsonValue('description', 'A test project to test this package against');
$I->assertPackageJsonValue('version', '0.0.0');
$I->assertPackageJsonValue('license', 'ISC');
$I->assertPackageJsonValue('authors', [['name' => 'Toby Griffiths', 'email' => 'toby@cubicmushroom.co.uk']]);
$I->assertPackageJsonPathExists('devDependencies.gulp');
$I->assertPackageJsonPathExists('devDependencies.gulp-cm-phpspec-tasks');
$I->assertPackageJsonPathExists('devDependencies.gulp-codeception');
$I->assertPackageJsonPathExists('devDependencies.gulp-notify');
$I->seeFileFound('index.js', $testRoot.'/node_modules/gulp');
$I->seeFileFound('index.js', $testRoot.'/node_modules/gulp-cm-phpspec-tasks');
$I->seeFileFound('index.js', $testRoot.'/node_modules/gulp-codeception');
$I->seeFileFound('index.js', $testRoot.'/node_modules/gulp-notify');
$I->seeFileFound('index.js', $testRoot.'/node_modules/gulp-notify');