<?php
declare(strict_types=1);

namespace Aonach\DisableTwoFactorAuth\Plugin;

use Magento\Framework\UrlInterface;
use Magento\Framework\App\State;
use Magento\TwoFactorAuth\Model\TfaSession;

class BypassTwoFactorAuth
{

    /** @var UrlInterface */
    private $urlBuilder;

    /** @var State */
    private $appState;

    /**
     * BypassTwoFactorAuth constructor.
     * @param UrlInterface $urlBuilder
     * @param State $appState
     */
    public function __construct(
        UrlInterface $urlBuilder,
        State $appState
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->appState = $appState;
    }

    /**
     * Enables the bypass of 2FA for admin access.
     *
     * This can be useful for within development & integration environments.
     *
     * @param TfaSession $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsGranted(
        TfaSession $subject,
        $result
    ): bool {
        $is2faEnabled = true;
        $isDeveloperMode = $this->appState->getMode() == State::MODE_DEVELOPER;
        $baseUrl = $this->urlBuilder->getBaseUrl();
        $isLocal = strpos($baseUrl, '.local') !== false;

        if ($isDeveloperMode && $isLocal) {
            $is2faEnabled = false;
        }

        return $is2faEnabled
            ? $result
            : true;
    }
}
