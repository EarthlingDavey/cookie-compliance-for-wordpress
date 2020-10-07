<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/ministryofjustice/cookie-compliance-for-wordpress
 * @since      1.0.0
 *
 * @package    cookie-compliance-for-wordpress
 */

$domainName = $_SERVER['SERVER_NAME'];
filter_var($domainName, FILTER_SANITIZE_URL);
$domainName = str_replace('www.', '', $domainName);

$options = get_option('ccfw_plugin_settings');
$bannerTitle = !empty($options['banner_title']) ? $options['banner_title'] : 'Are you OK with cookies?';
?>

<div class="ccfw-background-grey-overlay"></div>
<div id="ccfw-page-banner">
    <div class="ccfw-banner">
        <div class="ccfw-banner__intro">
            <?php _e('<h2 class="ccfw-banner__heading">' . esc_attr($bannerTitle) . '</h2>', 'cookie-compliance-for-wordpress'); ?>
            <p class="ccfw-banner__info-text">
                <?php _e('We use small files called ‘cookies’ on ' . strtoupper($domainName) . ' to give you the best experience on our site.  Some are essential to make the site work, and some help us understand how people use the site so that we can improve your experience. You can choose to turn off the non-essential cookies.  Which cookies are you happy for us to use?', 'cookie-compliance-for-wordpress'); ?>
            </p>

            <div class="ccfw-banner__buttons">
                <button  class="ccfw-banner__button" id="cookie-accept" type="submit">
                    <?php _e('I am OK with cookies', 'cookie-compliance-for-wordpress'); ?>
                </button>

                <button class="ccfw-banner__button" id="cookie-decline" type="submit">
                    <?php _e('Only use essential cookies', 'cookie-compliance-for-wordpress'); ?>
                </button>

                <button class="ccfw-banner-button ccfw-banner__button--expand-options" id="cookie-more-info">
                    <?php _e('Choose which cookies we use', 'cookie-compliance-for-wordpress'); ?>
                    <svg class="ccfw-banner__button--arrow" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.0516 1.86827C10.4659 1.28249 9.51612 1.28249 8.93033 1.86827C8.34454 2.45406 8.34454 3.40381 8.93033 3.98959L11.0516 1.86827ZM17.0621 10L18.1227 11.0607C18.7085 10.4749 18.7085 9.52513 18.1227 8.93934L17.0621 10ZM8.93033 16.0104C8.34454 16.5962 8.34454 17.5459 8.93033 18.1317C9.51612 18.7175 10.4659 18.7175 11.0516 18.1317L8.93033 16.0104ZM8.93033 3.98959L16.0014 11.0607L18.1227 8.93934L11.0516 1.86827L8.93033 3.98959ZM16.0014 8.93934L8.93033 16.0104L11.0516 18.1317L18.1227 11.0607L16.0014 8.93934Z"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="cookie-popup" class="ccfw-banner__modal-container" role="dialog" aria-labelledby="ccfw-banner-title" aria-modal="true" tabindex="-1">
            <button id="ccfw-modal-close" class="ccfw-banner__button ccfw-banner__button--close">
                Close
            </button>

            <h3 class="ccfw-banner__info-heading" id="ccfw-banner-title">Choose which cookies we use</h3>

            <div class="ccfw-banner__toggle-header-container">
                <h4 class="ccfw-banner__toggle-heading" id="ccfw-analytics-cookies-toggle">Cookies that measure website use (analytics cookies)</h4>
                <button role="switch" aria-checked="false" aria-labelledby="ccfw-analytics-cookies-toggle" class="ccfw-banner__toggle-label">
                    <span>on</span>
                    <span>off</span>
                </button>
            </div>

            <p class="ccfw-banner__summary-text">We use Google Analytics to measure how you use the website so we can improve it based on user needs. We do not allow Google Analytics to use or share the data about how you use this site. </p>

            <details class="ccfw-banner__expanding-section" data-module="govuk-details">
                <summary class="ccfw-banner__expanding-section-summary">
                    <span class="ccfw-banner__expanding-section-summary-text">
                        See our analytics cookies
                    </span>
                </summary>
                <div class="ccfw-banner__expanding-section-text">
                    <table class="ccfw-banner__table">
                        <caption class="ccfw-banner__table-caption">Analytics cookies</caption>
                        <thead>
                            <tr>
                            <th scope="col" class="ccfw-banner__table-header">Name</th>
                            <th scope="col" class="ccfw-banner__table-header">Purpose</th>
                            <th scope="col" class="ccfw-banner__table-header">Expires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row" class="ccfw-banner__table-header">_ga</th>
                            <td class="ccfw-banner__table-cell">These help us count how many people visit www.IMB.org.uk by tracking if you’ve visited before</td>
                            <td class="ccfw-banner__table-cell">2 years</td>
                            </tr>
                            <tr>
                            <th scope="row" class="ccfw-banner__table-header">_gid</th>
                            <td class="ccfw-banner__table-cell">These help us count how many people visit www.IMB.org.uk by tracking if you’ve visited before</td>
                            <td class="ccfw-banner__table-cell">24 hours</td>
                            </tr>
                            <tr>
                            <th scope="row" class="ccfw-banner__table-header">_gat</th>
                            <td class="ccfw-banner__table-cell">These help us to manage how we collect analytics when we have lots of visitors on the site at one time</td>
                            <td class="ccfw-banner__table-cell">10 minutes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </details>

            <div class="ccfw-banner__toggle-header-container">
                <h4 class="ccfw-banner__toggle-heading">Cookies that make our site work (functional cookies)</h4>
                <p class="ccfw-banner__toggle-heading--always-on">Always on</p>
            </div>
            <p class="ccfw-banner__summary-text">These cookies will always need to be on because they make our site work.</p>

            <details class="ccfw-banner__expanding-section" data-module="govuk-details">
                <summary class="ccfw-banner__expanding-section-summary">
                    <span class="ccfw-banner__expanding-section-summary-text">
                        See our functional cookies
                    </span>
                </summary>
                <div class="ccfw-banner__expanding-section-text">
                    <table class="ccfw-banner__table">
                        <caption class="ccfw-banner__table-caption">All users</caption>
                        <thead>
                            <tr>
                            <th scope="col" class="ccfw-banner__table-header">Name</th>
                            <th scope="col" class="ccfw-banner__table-header">Purpose</th>
                            <th scope="col" class="ccfw-banner__table-header">Expires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">wordpress_test_cookie</th>
                                <td class="ccfw-banner__table-cell">This is used to test whether the browser accepts cookies</td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">PHPSESSID</th>
                                <td class="ccfw-banner__table-cell">This is used to link your device to the information sent to the server from your browser. It is typically used to avoid you having to retype information when moving from one page to another. </td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="ccfw-banner__table">
                        <caption class="ccfw-banner__table-caption">Logged in users</caption>
                        <thead>
                            <tr>
                            <th scope="col" class="ccfw-banner__table-header">Name</th>
                            <th scope="col" class="ccfw-banner__table-header">Purpose</th>
                            <th scope="col" class="ccfw-banner__table-header">Expires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">wordpress_[hash]</th>
                                <td class="ccfw-banner__table-cell">This authenticates you when you log in to the admin area</td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">wordpress_logged_in</th>
                                <td class="ccfw-banner__table-cell">This shows the site that you’re logged in and who you are so you can access the functions you need </td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">wordpress_sec</th>
                                <td class="ccfw-banner__table-cell">If you are logged in as a site admin, this stores your authentication details.</td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">wp-settings-{time}-[UID]</th>
                                <td class="ccfw-banner__table-cell">The number on the end [UID] is your individual user ID from the users database.</td>
                                <td class="ccfw-banner__table-cell">1 year</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </details>

            <h4 class="ccfw-banner__summary-heading">Cookies added by other sites (third-party cookies)</h4>
            <p class="ccfw-banner__summary-text">We embed videos from our official YouTube channel using YouTube’s privacy-enhanced mode. This mode may set cookies on your computer once you click on the YouTube video player, but YouTube will not store personally-identifiable cookie information for playbacks of embedded videos using the privacy-enhanced mode.</p>
            <p class="ccfw-banner__summary-text">We have no control over cookies set on other websites - you can turn them off, but not through us.</p>

            <details class="ccfw-banner__expanding-section" data-module="govuk-details">
                <summary class="ccfw-banner__expanding-section-summary">
                    <span class="ccfw-banner__expanding-section-summary-text">
                        See our third party cookies
                    </span>
                </summary>
                <div class="ccfw-banner__expanding-section-text">
                    <table class="ccfw-banner__table">
                    <caption class="ccfw-banner__table-caption">Third party cookies</caption>
                        <thead>
                            <tr>
                            <th scope="col" class="ccfw-banner__table-header">Name</th>
                            <th scope="col" class="ccfw-banner__table-header">Purpose</th>
                            <th scope="col" class="ccfw-banner__table-header">Expires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">PREF*</th>
                                <td class="ccfw-banner__table-cell">Allows you to view embedded YouTube videos and lets Youtube count video views.</td>
                                <td class="ccfw-banner__table-cell">8 months</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">VISITOR_INFO1_LIVE*</th>
                                <td class="ccfw-banner__table-cell">Allows you to view embedded YouTube videos and lets Youtube count video views.</td>
                                <td class="ccfw-banner__table-cell">8 months</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">VSC*</th>
                                <td class="ccfw-banner__table-cell">Allows you to view embedded YouTube videos and lets Youtube count video views.</td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                            <tr>
                                <th scope="row" class="ccfw-banner__table-header">remote_sid*</th>
                                <td class="ccfw-banner__table-cell">Allows you to view embedded YouTube videos and lets Youtube count video views.</td>
                                <td class="ccfw-banner__table-cell">When you close your browser</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </details>

            <button id="cookie-save-preferences" class="ccfw-banner__button">
                <?php _e('Save cookie preferences', 'cookie-compliance-for-wordpress'); ?>
            </button>
        </div>
    </div>
</div>
