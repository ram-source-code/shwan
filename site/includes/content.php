<?php
// Site content, taken from the previous www.entersoftgroup.com homepage (Nov 2026).
// Edit text here; the pages only lay it out.
return [
    'name'      => 'Entersoftgroup',
    'phone'     => '+9647701558796',            // E.164
    'email'     => 'info@entersoftgroup.com',
    'facebook'  => 'https://www.facebook.com/entersoftgroup',
    'address'   => [
        'building' => 'Max Plaza, 4th Floor, Department 9',
        'street'   => 'Shakraka, behind the Court House',
        'city'     => 'Sulaymaniyah',
        'region'   => 'Kurdistan Region',
        'country'  => 'Iraq',
    ],
    'maps_url'  => 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode('Max Plaza Shakraka Sulaymaniyah'),

    'hero' => [
        'title' => 'We create perfect brand goods value',
        'lead'  => 'Entersoftgroup helps businesses elevate their value.',
        'intro' => 'Entersoftgroup is a software and IT company in Sulaymaniyah that helps businesses elevate their value.',
    ],
    'about' => 'Over the years, a wide range of developments and innovations in the global IT arena have led to many new IT-enabled devices and services being produced. Moreover, there is need for IT today, not just in urban areas but rural regions as well.',
    'facts' => [
        ['value' => '15', 'suffix' => '+', 'label' => 'Years of experience'],
        ['value' => '99', 'suffix' => '+', 'label' => 'Projects done together'],
    ],
    'reasons' => [
        ['icon' => 'tag',      'title' => 'Pricing',
         'text' => 'Our prices are competitive and fair. There are no surprise bills. Any unexpected or additional expenses must be pre-approved by you. That’s how we would like to be treated, and that is how our clients are treated.'],
        ['icon' => 'sliders',  'title' => 'Easy to customize',
         'text' => 'Our software can easily be customized to fit your corporate design. Every element in the user interface can be customized to suit your needs.'],
        ['icon' => 'headset',  'title' => '24/7 online support',
         'text' => 'You can communicate easily with us. Our average hold time for technical support is exceptionally fast.'],
        ['icon' => 'pen',      'title' => 'Creativity',
         'text' => 'We bring our diverse background of advertising, design, branding, public relations, research and strategic planning to work for your company. Not only will your materials look great – they will get results.'],
        ['icon' => 'globe',    'title' => 'Different languages',
         'text' => 'All our software is available in different languages, such as Kurdish, Arabic and English.'],
        ['icon' => 'shield',   'title' => 'High quality security',
         'text' => 'We have IT security experts who update the security of our software regularly.'],
    ],
    'tour' => [
        'title' => 'Let’s make an office tour from here.',
        'text'  => 'Over the years, a wide range of developments and innovations in the global IT arena have led to many new IT-enabled devices and services being produced.',
    ],
    'skills' => [
        ['label' => 'Consulting & marketing',         'value' => 72],
        ['label' => 'IT solutions & troubleshooting', 'value' => 81],
        ['label' => 'UI/UX solutions',                'value' => 72],
    ],
    'team' => [
        ['name' => 'Shwan Baglama',       'role' => 'Founder & CEO',       'img' => 'team-shwan-baglama'],
        ['name' => 'Frman H. Ahmed',      'role' => 'Head of Developers',  'img' => 'team-frman-h-ahmed'],
        ['name' => 'Dyarko M. Muhammad',  'role' => 'Developer',           'img' => 'team-dyarko-m-muhammad'],
        ['name' => 'Arya A. Qadir',       'role' => 'Developer',           'img' => 'team-arya-a-qadir'],
    ],
    'quote' => [
        'title' => 'Get a quote',
        'text'  => 'We are here for your estimate price.',
    ],
];
