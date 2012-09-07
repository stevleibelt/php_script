<?php

$wheres = array('online' => array('online'),
                'plusOnline' => array('online', 'plus'),
                'basicOnline' => array('online', 'basic'),
                'basicManOnline' => array('online', 'man', 'basic'),
                'basicWomanOnline' => array('online', 'woman', 'basic'),
                'plusManOnline' => array('online', 'man', 'plus'),
                'plusWomanOnline' => array('online', 'woman', 'plus') );

function countFoo($wheres)
{
    $return = false;
    $supportedWheres = array('online', 'plus', 'basic', 'man', 'woman');

    if( ( Singles_Validate::IsArray($wheres, true) === true ) )
    {
        $select = $this->select();
        $select->from($this, 'COUNT(*) as count');

        foreach($wheres as $k => $v)
        {
            switch($v)
            {
                case 'online':
                    $select->where('time -  ');
                    break;
                case 'woman':
                    $select->where('sex = 6');
                    break;
                case 'man':
                    $select->where('sex = 5');
                    break;
                case 'plus':
                    $select->setIntegryCheck(false);
                    $select->joinInner();
                    $select->where('p.plus_status = \'Y\'');
                    break;
                case 'basic':
                    $select->setIntegryCheck(false);
                    $select->joinInner();
                    $select->where('p.plus_status = \'N\'');
                    break;
            }
        }

        $retrun = $this->getAdapter->fetchRow($select);
    }

    return $return;
}
?>