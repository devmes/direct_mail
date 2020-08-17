<?php
defined('TYPO3_MODE') or die();

// tt_address modified
$ttAddressCols = [
    'module_sys_dmail_category' => [
        'label' => 'LLL:EXT:direct_mail/Resources/Private/Language/locallang_tca.xlf:module_sys_dmail_group.category',
        'exclude' => '1',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectCheckBox',
            'renderMode' => 'checkbox',
            'foreign_table' => 'sys_dmail_category',
            'foreign_table_where' => 'AND sys_dmail_category.l18n_parent=0 AND sys_dmail_category.pid IN (###PAGE_TSCONFIG_IDLIST###) ORDER BY sys_dmail_category.sorting',
            'itemsProcFunc' => 'DirectMailTeam\\DirectMail\\SelectCategories->get_localized_categories',
            'itemsProcFunc_config' => [
                'table' => 'sys_dmail_category',
                'indexField' => 'uid',
            ],
            'size' => 5,
            'minitems' => 0,
            'maxitems' => 60,
            'MM' => 'sys_dmail_ttaddress_category_mm',
        ]
    ],
    'module_sys_dmail_html' => [
        'label' => 'LLL:EXT:direct_mail/Resources/Private/Language/locallang_tca.xlf:module_sys_dmail_group.htmlemail',
        'exclude' => '1',
        'config' => [
            'type' => 'check'
        ]
    ]
];

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $ttAddressCols);
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCATypes('tt_address', '--div--;Direct mail,module_sys_dmail_category,module_sys_dmail_html');
$GLOBALS['TCA']['tt_address']['feInterface']['fe_admin_fieldList'] .= ',module_sys_dmail_category,module_sys_dmail_html';
