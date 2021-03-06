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

/**
 * Class AuctionGridFilters
 */
class AuctionGridFilters extends CWidget
{
    public $gridId;

    // Search filter
    public $showSearchFilter = false;
    public $searchFieldName;

    // Buyer filter
    public $showBuyerFilter = false;
    public $buyersArray = [];

    // Seller filter
    public $showSellerFilter = false;
    public $sellersArray = [];
    
    public $showSortCategory = false;
    public $auction = [];
    public $userCategoriesList = [];

    // Period filter
    public $showPeriodFilter = false;
    public $datePeriodOptions = [
        'today'          => 'Сегодня',
        'from_yesterday' => 'Вчера',
        'last_week'      => 'За неделю',
        'last_month'     => 'За месяц',
        'last_half_year' => 'За 6 месяцев',
        'last_year'      => 'За год',
        'all'            => 'Все',
    ];

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $activePeriodOption = GridLotFilter::getPeriod();
        $searchFieldValue = GridLotFilter::getSearchQuery();

        $this->render('auctionGridFilters', [
            'gridId'                => $this->gridId,
            'showPeriodFilter'      => $this->showPeriodFilter,
            'datePeriodOptions'     => $this->datePeriodOptions,
            'activePeriodOption'    => $activePeriodOption,
            'showSearchFilter'      => $this->showSearchFilter,
            'searchFieldName'       => $this->searchFieldName,
            'searchFieldValue'      => $searchFieldValue,
            'showBuyersFilter'      => $this->showBuyerFilter && $this->buyersArray,
            'buyersArray'           => $this->buyersArray,
            'showSellerFilter'      => $this->showSellerFilter,
            'sellersArray'          => $this->sellersArray,
            'showSortCategory'      => $this->showSortCategory,
            'userCategoriesList'    => $this->userCategoriesList,
            'auction'               => $this->auction,
        ]);
    }
}