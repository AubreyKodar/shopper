<?php

namespace Mckenziearts\Shopper\Plugins\Orders\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property boolean            is_user_show
 */
class Status extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_CONFORMED = 'order_payment_confirmed';
    const STATUS_IN_PROGRESS = 'order_being_processed';
    const STATUS_SHIPPED = 'order_shipped';
    const STATUS_COMPETE = 'order_complete';
    const STATUS_CANCELED = 'order_canceled';

    /**
     * {@inheritDoc}
     */
    protected $table = 'shopper_orders_statuses';

    /**
     * {@inheritDoc}
     */
    protected $fillable = ['name', 'code', 'is_user_show', 'description', 'sort_order'];

    /**
     * {@inheritDoc}
     */
    protected $hidden = ['sort_order', 'created_at', 'updated_at'];

    /**
     * Define if user can see status
     *
     * @return string
     */
    public function isUserView()
    {
        return ($this->is_user_show === 1) ? __('Yes') : __('No');
    }
}
