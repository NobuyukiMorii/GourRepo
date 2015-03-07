<?php
pr($pref_search_info);
?>
<?php
echo $this->Form->input(
    'code_prefcode',
    array('options' => $pref_search_info['pref'], 'default' => '0')
);
?>