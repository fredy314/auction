<?php

/**
 *
 * @author Ivan Teleshun <teleshun.ivan@gmail.com>
 * @link http://molotoksoftware.com/
 * @copyright 2016 MolotokSoftware
 * @license GNU General Public License, version 3
 */

/**
 * 
 * This file is part of MolotokSoftware.
 *
 * MolotokSoftware is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MolotokSoftware is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with MolotokSoftware.  If not, see <http://www.gnu.org/licenses/>.
 */


Yii::import('frontend.components.counterEvent.CounterEvent');

/**
 * Активные ставки
 * 
 * Если моя ставка была кем то перебита то в скобках отображается цифра 1, 
 * как одно событие. Если перебиты уже две мои ставки по разным лотам то 
 * отображается цифра 2 как два события, и так далее. Цифра в скобках обнуляется
 * после посещения этого подраздела.
 */
class ActiveBetsItem extends CounterEvent
{

    const TYPE = 3;

    public function __construct()
    {
        $this->type = self::TYPE;
    }

    public function inc($owner, $item = 0)
    {
        if ($this->allowCreateEvent(self::TYPE, $owner, $item)) {
            Yii::log('inc user' . $owner);
            parent::inc($owner, $item);
        }
        return true;
    }

    public function dec($owner)
    {
        Yii::log('dec');
        parent::dec($owner);
        return true;
    }

}
