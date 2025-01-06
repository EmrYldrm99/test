<h1>Personal</h1>
<?= $this->Form->create($request) ?>
<fieldset>
    <legend>Data</legend>
    <?php
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('mail_address');
        echo $this->Form->control('phone_number');
        echo $this->Form->control('gdpr_agreed');
    ?>
</fieldset>