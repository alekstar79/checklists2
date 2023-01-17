<?php

/**
 * Interface to Contacts application to set up user access rights.
 */
class checklists2RightConfig extends waRightConfig
{
    public function init()
    {
        $this->addItem('add_list', _w('Can create new lists'), 'checkbox');

        // existing lists
        $lm = new checklists2ListModel();
        $lists = [];
        
        foreach($lm->getAll() as $list) {
            $lists[$list['id']] = $list['name'];
        }
        
        $this->addItem('list', _w('Available lists'), 'selectlist', array('items' => $lists, 'options' => [
            0 => _w('No access'),
            1 => _w('Check items only'),
            2 => _w('Full access'),
        ]));
    }
}
