<?php

namespace Gutenkit\Admin\Onboard;

class Onboard
{
    const ACCOUNT_URL       = 'https://account.wpmet.com';
    const ENVIRONMENT_ID    = 5;
    const CONTACT_LIST_ID   = 5;
    const STATUS            = 'gutenkit_onboard_status';
    const EMAIL             = 'gutenkit_onboard_email';
    const EMAIL_ID          = 'gutenkit_onboard_email_id';

    /**
     * @param $data
     */
    public function submit($data) {
        if (!empty($data)) {
            if (isset($data['dataSharePermission']) && $data['dataSharePermission'] == true) {
                update_option(Onboard::EMAIL_ID, $data['userMail']);
                \Gutenkit\Admin\Onboard\PluginDataSender::instance()->send();
              
               
            }

            if (!empty($data['userMail']) && !empty(is_email($data['userMail']))) {
                $args = [
                    'email'           => $data['userMail'],
                    'environment_id'  => Onboard::ENVIRONMENT_ID,
                    'contact_list_id' => Onboard::CONTACT_LIST_ID
                ];
                \Gutenkit\Admin\Onboard\PluginDataSender::instance()->sendAutomizyData('email-subscribe', $args);
                update_option(Onboard::EMAIL, 'subscribed');
            }

            update_option(Onboard::STATUS, 'onboarded');
        }

        return [
            'status'  => 'success',
            'message' => __('Onboard data saved successfully.', 'gutenkit-blocks-addon')
        ];
    }
}
