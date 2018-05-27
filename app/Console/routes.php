<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午10:58
 *
 * @var Mco\Console\App $app
 */

$app->registerCommands('App\\Console\\Command', alias('@app/Console/Command'));
$app->registerGroups('App\\Console\\Controller', alias('@app/Console/Controller'));

$app->addCommand(\Inhere\Console\BuiltIn\DevServerCommand::class);
$app->addController(\Inhere\Console\BuiltIn\PharController::class);

// make commands
$app->addCommand('make', function (\Inhere\Console\IO\Input $input, \Inhere\Console\IO\Output $output) {
    $commands = [
        'route' => [
            'des' => 'make application routes file.',
            'cmd' => 'php bin/console route:build',
            'cwd' => null,
        ]
    ];

    if (!$name = $input->getArg(0)) {
        $output->liteError('Please input a command for make run');
        return -1;
    }

    if (!$info = $commands[$name] ?? null) {
        $output->liteError("Invalid command entered! '$name'");
        return -1;
    }

    $info = array_merge([
        'des' => '',
        'cmd' => '',
        'cwd' => null,
    ], $info);

    if (!$cmd = $info['cmd']) {
        $output->liteError("Not config any command script to execute! command: $name");
        return -1;
    }

    $output->write("RUN > <comment>$cmd</comment>");
    list($code, $out, $err) = \Toolkit\Sys\Sys::run($cmd, $info['cwd']);

    if ($code) {
        $output->liteWarning('Running failure!' . ($err ? "Error: $err" : ''));
    } else {
        $output->liteWarning('Running successful!');
    }

    $output->write("Output:\n$out");

    return 0;
}, [
    'description' => 'There are some command samples for application make',
]);
