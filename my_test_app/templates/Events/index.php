<!DOCTYPE html>
<html>
    <head>
        <?= $this->
        Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            CakePHP: the rapid development PHP framework: <?=
            $this->fetch('title') ?>
        </title>
        <?= $this->
        Html->meta('icon') ?>
        
        <?= $this->
        Html->script(['main.min']) ?>

        <?= $this->
        fetch('meta') ?>
        <?= $this->
        fetch('css') ?>
        <?= $this->
        fetch('script') ?>
    </head>
    <body>
        <header></header>
        <main class="main">
            <p>Hello World!</p>
        </main>
        <footer></footer>
    </body>
</html>
