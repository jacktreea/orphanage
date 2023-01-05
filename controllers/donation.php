<?php
    if ($action == "index"){


        $data['content'] = loadTemplate('donor_list.tpl.php');
    }
    if ($action == "add"){


        $data['content'] = loadTemplate('donor_add.tpl.php');
    }